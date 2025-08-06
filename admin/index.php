<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT id FROM users WHERE email=? AND password=? AND is_deleted=0 AND status='active' AND role='admin'");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        $_SESSION['admin_id'] = $user['id'];
        header("Location: users_index.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styling -->
    <style>
        body {
            background: #f4f6f9;
        }

        .login-card {
            max-width: 400px;
            margin: 80px auto;
            background: white;
            padding: 40px 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
        }

        .login-card img.logo {
            max-width: 120px;
            margin-bottom: 20px;
        }

        .login-card h3 {
            margin-bottom: 20px;
        }

        .form-control {
            height: 45px;
        }
    </style>
</head>

<body>
    <div class="login-card text-center">
        <!-- Logo -->
        <img src="../assets/images/i4cfinancial_logo.svg" alt="Logo" class="logo">
        <!-- Title -->
        <h3>Admin Login</h3>

        <!-- Error Message -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="POST">
            <div class="mb-3 text-start">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-secondary w-100">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>