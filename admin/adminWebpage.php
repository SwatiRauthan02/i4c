 <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'header.php';
include 'db.php';
include 'auth.php';

// Handle AJAX update request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax'])) {
    $data = json_decode(file_get_contents('php://input'), true);
    $src = $data['search'];
    $status = $conn->real_escape_string($data['status']);
    $expiry_date = $conn->real_escape_string($data['expiry_date']);
    
    $sql = "UPDATE membership_users SET status = '$status', expiry_date = '$expiry_date' WHERE name like %$src%";
    if ($conn->query($sql)) {
        echo json_encode(['status' => 'success', 'message' => 'User updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Update failed: ' . $conn->error]);
    }
    exit;
}

// Fetch users
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$pageSize = 10;
$offset = ($page - 1) * $pageSize;

$searchSql = '';
if (!empty($search)) {
    $safeSearch = $conn->real_escape_string($search);
    $searchSql = " AND (membership_users.name LIKE '%$safeSearch%' OR membership_users.email LIKE '%$safeSearch%')";
}

$totalQuery = "SELECT COUNT(*) AS total FROM membership_users WHERE role != 'admin' $searchSql";
$totalResult = $conn->query($totalQuery);
$totalRows = $totalResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $pageSize);

$query = "SELECT membership_users.*, countries.name AS country_name
          FROM membership_users
          LEFT JOIN countries ON membership_users.country_code = countries.code
          WHERE membership_users.is_deleted = 0 AND role != 'admin' $searchSql
          ORDER BY membership_users.created_at DESC
          LIMIT $offset, $pageSize";

$result = $conn->query($query);
?>

<div class="main-content">
    <div class="container mt-5 pt-4">
        <h3 class="fw-bold mb-4">Users</h3>

        <form class="form-inline mb-4" method="get">
            <input type="text" name="search" class="form-control" placeholder="Search name or email..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Expiry Date</th>
                    <th style="width: 140px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['country_code']) ?></td>
                            <td>
                                <select class="form-select form-select-sm status-select" data-id="<?= $row['id'] ?>">
                                    <option value="pending" <?= $row['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="active" <?= $row['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                    <option value="deactivate" <?= $row['status'] == 'deactivate' ? 'selected' : '' ?>>Deactivate</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm expiry-select" data-id="<?= $row['id'] ?>">
                                    <option value="">Select</option>
                                    <option value="1_week">1 Week</option>
                                    <option value="1_month">1 Month</option>
                                    <option value="custom">Custom</option>
                                </select>
                                <input type="date" class="form-control form-control-sm mt-1 custom-expiry d-none" data-id="<?= $row['id'] ?>">
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success update-btn" data-id="<?= $row['id'] ?>">Update</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center">No users found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
            <nav>
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?search=<?= urlencode($search) ?>&page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Show/hide custom date input
    document.querySelectorAll('.expiry-select').forEach(select => {
        select.addEventListener('change', function() {
            const id = this.dataset.id;
            const customDate = document.querySelector(`.custom-expiry[data-id="${id}"]`);
            customDate.classList.toggle('d-none', this.value !== 'custom');
        });
    });

    // Handle Update button
    document.querySelectorAll('.update-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const status = document.querySelector(`.status-select[data-id="${id}"]`).value;
            const expiryOption = document.querySelector(`.expiry-select[data-id="${id}"]`).value;
            const customInput = document.querySelector(`.custom-expiry[data-id="${id}"]`);
            let expiryDate = '';

            const now = new Date();

            if (expiryOption === '1_week') {
                now.setDate(now.getDate() + 7);
                expiryDate = now.toISOString().split('T')[0];
            } else if (expiryOption === '1_month') {
                now.setMonth(now.getMonth() + 1);
                expiryDate = now.toISOString().split('T')[0];
            } else if (expiryOption === 'custom') {
                expiryDate = customInput.value;
            }

            fetch(window.location.href, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    ajax: true,
                    id: id,
                    status: status,
                    expiry_date: expiryDate
                })
            })
            .then(res => res.json())
            .then(data => {
                Swal.fire(data.status, data.message, data.status);
            })
            .catch(err => {
                Swal.fire('Error', 'Something went wrong.', 'error');
            });
        });
    });
</script>

<?php include 'footer.php'; ?>
