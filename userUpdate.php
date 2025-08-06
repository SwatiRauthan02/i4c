<?php
include 'admin/db.php';

if (session_status() == PHP_SESSION_NONE) session_start();

// $id = $_GET['id'] ?? null;
// if (!$id) die("User ID not provided.");


$id = $_GET['id'] ?? null;
if (!$id) {
    die("User not found");
}
// $id = 2094;
// Fetch user from DB
$stmt = $conn->prepare("SELECT * FROM membership_users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) die("User not found.");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'] ?? 'pending';
    $expiry = $_POST['expiry'] ?? '';

    $expiryDate = null;
    if ($expiry === '1_week') {
        $expiryDate = date('Y-m-d', strtotime('+1 week'));
    } elseif ($expiry === '1_month') {
        $expiryDate = date('Y-m-d', strtotime('+1 month'));
    }

    $stmt = $conn->prepare("UPDATE membership_users SET status = ?, expiry_date = ? WHERE id = ?");
    $stmt->bind_param("ssi", $status, $expiryDate, $id);
    $stmt->execute();
    $stmt->close();

    // echo "<p class='updateMsg' >User updated successfully!</p>";
}
?>

 <div class="page-wrapper">
<?php include('header.php')?>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f7fa;
        margin: 0;
        padding: 0;
    }

    h2 {
        color: #2c3e50;
        text-align: center;
        margin-top: 30px;
    }

    .cont {
        background-color: #ffffff;
        max-width: 600px;
        margin: 30px auto;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        flex: 1;                        /* Push footer to the bottom */
    /* padding: 20px; */
    }

    p {
        font-size: 17px;
        color: #444;
        margin-bottom: 10px;
    }

    label {
        display: block;
        font-weight: 600;
        margin-top: 20px;
        color: #333;
    }

    select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 15px;
        background-color: #fcfcfc;
    }

    button {
        display: block;
        width: 100%;
        padding: 12px;
        margin-top: 30px;
        background-color: #3498db;
        color: white;
        font-weight: bold;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    button:hover {
        background-color: #2980b9;
    }

    .updateMsg {

        background-color: #2ecc71;
        /* a pleasant green */
        color: white;
        padding: 15px 25px;
        margin: 20px auto;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 500px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        font-weight: bold;
        font-size: 16px;
        text-align: center;
    }

    .user-info {
        background-color: #fff;
        padding: 15px 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 25px;
        display: flex;
        text-align: center;
        justify-content: center;
        flex-direction: column;
    }
    

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.page-wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.content-area {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 40px 0;
}

.cont {
    background-color: #ffffff;
    max-width: 600px;
    width: 100%;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

    
</style>
<main class="content-area">
<div class="cont">
    <h2>Update User Status</h2>
    <div class="user-info">
        <p class="name"><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
        <p class="email"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>

    </div>

    <form method="POST">
        <label>Status:</label>
        <select name="status">
            <option value="pending" <?= $user['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="active" <?= $user['status'] == 'active' ? 'selected' : '' ?>>Active</option>
            <option value="deactivated" <?= $user['status'] == 'deactivated' ? 'selected' : '' ?>>Deactivated</option>
        </select><br><br>

        <label>Expiry:</label>
        <select name="expiry">
            <option value="">-- Select --</option>
            <option value="1_week">1 Week</option>
            <option value="1_month">1 Month</option>
        </select><br><br>

        <button type="submit">Update User</button>
    </form>
</div>
</main>
<?php include('footer.php')?>
</div>
