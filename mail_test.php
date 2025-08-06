<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'admin/config.php';
require("admin/db.php");




function sendRegistrationEmail($id)
{
    // global $mailHost, $mailUsername, $mailPassword, $mailFrom, $mailFromName, $mailTo, $mailToName;

    $mail = new PHPMailer(true);

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


    $stmt = $conn->prepare("SELECT name, email, country_code, created_at, status FROM membership_users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = mailHost;
        $mail->SMTPAuth   = true;
        $mail->Username   = mailUsername;
        $mail->Password   = mailPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        // $mail->setFrom($mailFrom, $mailFromName);
        // $mail->addAddress($mailTo, $mailToName);
        $mail->setFrom('Charanjeet.Parallelteam@gmail.com', 'Developer');
        $mail->addAddress('keshab.15.2003@gmail.com', 'Keshab');


        $mail->isHTML(true);
        $mail->Subject = 'A New User Registered!';
        


        $mail->Body = '
<html>
    <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">
        <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden;">
            <tr>
                <td style="padding: 20px; text-align: center; background-color: #2c3e50;">
                    <img src="https://via.placeholder.com/150x50?text=Your+Logo" alt="Company Logo" style="max-width: 150px; height: auto;">
                </td>
            </tr>
            <tr>
                <td style="padding: 30px;">
                    <h2 style="color: #333333;">New User Registration Alert!</h2>
                    <p style="font-size: 16px; color: #555555;">
                        A new user has just registered on your platform. Please review and activate the account.
                    </p>
                    <div style="padding: 20px; border: 1px solid #ccc; margin-bottom: 20px;">
                        <h3>User Information</h3>
                        <p><strong>Name:</strong> ' . htmlspecialchars($user["name"]) . '</p>
                        <p><strong>Email:</strong> ' . htmlspecialchars($user["email"]) . '</p>
                        <p><strong>Country Code:</strong> ' . htmlspecialchars($user["country_code"]) . '</p>
                        <p><strong>Created At:</strong> ' . htmlspecialchars($user["created_at"]) . '</p>
                        <p><strong>Status:</strong> ' . htmlspecialchars($user["status"]) . '</p>
                    </div>
                    <p style="text-align: center; margin: 30px 0;">
                        <a href="http://localhost/i4c/admin/update_user.php?id=' . $id . '" 
                           style="background-color: #3498db; color: #ffffff; padding: 12px 25px; 
                           text-decoration: none; border-radius: 5px; font-size: 16px;">
                          Click here to update user
                        </a>
                    </p>
                    <p style="font-size: 14px; color: #aaaaaa; text-align: center;">
                        If you did not expect this email, you can safely ignore it.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ecf0f1; padding: 20px; text-align: center; font-size: 12px; color: #777777;">
                    &copy; ' . date("Y") . ' Your Company. All rights reserved.
                </td>
            </tr>
        </table>
    </body>
</html>';


        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mail Error: {$mail->ErrorInfo}");
        return false;
    }
}
