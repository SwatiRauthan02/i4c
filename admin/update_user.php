<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'header.php';
include 'db.php';
include 'auth.php';

$user = null;
$success = '';
$error = '';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = (int)$_GET['id'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $expiry_option = isset($_POST['expiry_option']) ? $_POST['expiry_option'] : '';
        $custom_expiry = isset($_POST['custom_expiry']) ? $_POST['custom_expiry'] : '';


        $expiry_date = null;
        $now = new DateTime();

        if ($expiry_option === '1_week') {
            $now->modify('+1 week');
            $expiry_date = $now->format('Y-m-d');
        } elseif ($expiry_option === '1_month') {
            $now->modify('+1 month');
            $expiry_date = $now->format('Y-m-d');
        } elseif ($expiry_option === 'custom' && !empty($custom_expiry)) {
            $expiry_date = $custom_expiry;
        }

        // Update user
        $stmt = $conn->prepare("UPDATE membership_users SET status = ?, expiry_date = ? WHERE id = ?");
        $stmt->bind_param('ssi', $status, $expiry_date, $userId);

        if ($stmt->execute()) {
            $success = "User updated successfully.";
        } else {
            $error = "Failed to update user: " . $conn->error;
        }
    }

    // Fetch user
    $stmt = $conn->prepare("SELECT id, name, email, status, expiry_date FROM membership_users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
} else {
    $error = "Invalid user ID.";
}
?>

<div class="container mt-5 pt-5">
    <h2>Edit User</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php elseif ($success): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <?php if ($user): ?>
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <form method="POST">
                    <tr class="text-center">
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Country</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Expiry Date</th>
                        <th class="text-center" style="width: 140px;">Action</th>
                    </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><?= htmlspecialchars($user['name']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($user['email']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($user['country_code'] ?? 'N/A') ?></td>
                    <td class="text-center">
                        <select name="status" class="form-select text-center" required>
                            <option class="text-center" value="pending" <?= $user['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option class="text-center" value="active" <?= $user['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                            <option class="text-center" value="deactivate" <?= $user['status'] === 'deactivate' ? 'selected' : '' ?>>Deactivate</option>
                        </select>
                    </td>
                    <!-- <td>
                    <select name="expiry_option" class="form-select" id="expiry_option">
                        <option value="">Select</option>
                        <option value="1_week">+1 Week</option>
                        <option value="1_month">+1 Month</option>
                        <option value="custom">Custom</option>
                    </select>
                    <input type="date" name="custom_expiry" id="custom_expiry"
                        class="form-control mt-2 <?= $user['expiry_date'] ? '' : 'd-none' ?>"
                        value="<?= htmlspecialchars($user['expiry_date']) ?>">
                </td> -->
                    <td class="text-center align-middle">
                        <div class="d-flex flex-column align-items-center gap-2">
                            <select name="expiry_option" class="form-select w-auto text-center" id="expiry_option">
                                <option value="">Select</option>
                                <option value="1_week">+1 Week</option>
                                <option value="1_month">+1 Month</option>
                                <option value="custom">Custom</option>
                            </select>
                            <input type="date" name="custom_expiry" id="custom_expiry"
                                class="form-control w-auto <?= $user['expiry_date'] ? '' : 'd-none' ?>"
                                value="<?= htmlspecialchars($user['expiry_date']) ?>">
                        </div>
                    </td>

                    <td class="text-center">
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </td>
                </tr>
                </form>
            </tbody>
        </table>
    <?php endif; ?>

</div>

<script>
    document.getElementById('expiry_option').addEventListener('change', function() {
        const customField = document.getElementById('custom_expiry');
        if (this.value === 'custom') {
            customField.classList.remove('d-none');
        } else {
            customField.classList.add('d-none');
        }
    });
</script>

<?php include 'footer.php'; ?>