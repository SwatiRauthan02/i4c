<?php include 'header.php';
include 'db.php';
include 'auth.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, linkedin_url, country, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $hashed = md5($_POST['password']);
    $stmt->bind_param("sssssss", $_POST['first_name'], $_POST['last_name'], $_POST['email'], $hashed, $_POST['linkedin_url'], $_POST['country'], $_POST['status']);
    $stmt->execute();
    header("Location: users_index.php");
}
?>

<style>
    .form-wrapper {
        max-width: 800px;
        margin: 50px auto;
        padding: 40px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .form-wrapper h2 {
        margin-bottom: 30px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-start;
        margin-top: 30px;
    }

    .btn-submit {
        background-color: #28a745;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
    }

    .btn-cancel {
        background-color: #6c757d;
        color: white;
        padding: 12px 24px;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 500;
    }

    @media (max-width: 576px) {
        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .form-actions a,
        .form-actions button {
            width: 100%;
        }
    }
</style>

<div class="form-wrapper">
    <h2>Add New User</h2>
    <form method="POST">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="email" required>
            <p class="email-error error" style="display: none;">Please enter a valid email address</p>
        </div>
        <div class="form-group" style="position: relative;">
            <label>Password</label>
            <input type="password" name="password" id="password" required>
            <span onclick="togglePassword()" style="position: absolute; right: 14px; top: 44px; cursor: pointer;">
                <i class="fa fa-eye" id="toggleIcon"></i>
            </span>
        </div>
        <div class="form-group">
            <label>LinkedIn URL</label>
            <input type="text" name="linkedin_url" class="linkedin">
            <p class="valid_url error">Please enter valid url</p>
        </div>
        <!-- <div class="form-group">
            <label>Country</label>
            <input type="text" name="country">
        </div> -->
        <div class="form-group">
            <label>Country</label>
            <select name="country" required>
                <option value="">Select Country</option>
                <?php
                $result = $conn->query("SELECT code, name FROM countries ORDER BY name ASC");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=\"{$row['code']}\">{$row['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Add User</button>
            <a href="users_index.php" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('.valid_url').hide();
        $('.email-error').hide();
        $('.linkedin').on('keyup', function() {
            var linkedin = $(this).val();
            if (linkedin != "") {
                if (/(ftp|http|https):\/\/?(?:www\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/.test(linkedin)) {
                    $('.valid_url').removeClass('error');
                    $('.valid_url').hide();
                } else {
                    $('.valid_url').addClass('error');
                    $('.valid_url').show();
                }
            } else {
                $('.valid_url').removeClass('error');
                $('.valid_url').hide();
            }
        });

        // Email validation
        $('.email').on('keyup', function() {
            var email = $(this).val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
            if (emailRegex.test(email)) {
                $('.email-error').hide();
            } else {
                $('.email-error').show();
            }
        });
    });

    function togglePassword() {
        var input = document.getElementById("password");
        var icon = document.getElementById("toggleIcon");
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>


<?php include 'footer.php'; ?>