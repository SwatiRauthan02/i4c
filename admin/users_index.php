<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
include 'header.php';
include 'db.php';
include 'auth.php';
 


$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$pageSize = 10;
$offset = ($page - 1) * $pageSize;

$searchSql = '';
if (!empty($search)) {
    $safeSearch = $conn->real_escape_string($search);
    $searchSql = " AND (first_name LIKE '%$safeSearch%' OR last_name LIKE '%$safeSearch%' OR email LIKE '%$safeSearch%')";
}

// Count total rows for pagination
// $totalQuery = "SELECT COUNT(*) AS total FROM users WHERE is_deleted = 0 and role!='admin' $searchSql";
$totalQuery = "SELECT COUNT(*) AS total FROM membership_users WHERE role!='admin' $searchSql";
$totalResult = $conn->query($totalQuery);
$totalRows = $totalResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $pageSize);

// Fetch paginated data
// $query = "SELECT * FROM users WHERE is_deleted = 0 $searchSql ORDER BY created_date DESC LIMIT $offset, $pageSize";
$query = "SELECT membership_users.*, countries.name AS country_name
          FROM membership_users
          LEFT JOIN countries ON membership_users.country_code = countries.code
          WHERE membership_users.is_deleted = 0 and role!='admin' $searchSql
          ORDER BY membership_users.created_at DESC
          LIMIT $offset, $pageSize";
$result = $conn->query($query);
// $query = "SELECT users.*, countries.name AS country_name
//           FROM users
//           LEFT JOIN countries ON users.country = countries.code
//           WHERE users.is_deleted = 0 and role!='admin' $searchSql
//           ORDER BY users.created_date DESC
//           LIMIT $offset, $pageSize";
// $result = $conn->query($query);


if ($result === false) {
    echo "<div class='alert alert-danger'>Query error: " . $conn->error . "</div>";
}
?>
<div class="main-content">
    <div class="container mt-5 pt-4">
        <div class="d-flex justify-content-between align-items-center mb-5" style="margin-bottom: 40px;">
            <h3 class="fw-bold">Users</h3>
            <form class="form-inline" method="get" style="margin-bottom: 0;">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search name or email..." value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-left: 8px;">Search</button>
            </form>
        </div>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <!-- <td><?php echo htmlspecialchars($row['country']); ?></td> -->
                            <td><?php echo htmlspecialchars($row['country_name'] ?: $row['country']); ?></td>

                            <td>
                                <span class="badge bg-<?php echo $row['status'] == 'active' ? 'success' : 'secondary'; ?>">
                                    <?php echo ucfirst($row['status']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="users_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <button onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
            <nav>
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                            <a class="page-link" href="?search=<?php echo urlencode($search); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</div>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This user will be soft deleted.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'users_delete.php?id=' + id;
            }
        });
    }
</script>

<?php include 'footer.php'; ?>