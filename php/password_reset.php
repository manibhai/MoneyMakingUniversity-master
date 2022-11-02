<?php
session_start();
include "../navigations/config.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function  send_password_reset($get_email, $token){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'moneymakinguniversity.mmu@gmail.com';                     //SMTP username
        $mail->Password   = 'tpuijqmrbgqokbxw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('moneymakinguniversity.mmu@gmail.com');
        $mail->addAddress('msingh27@oldwestbury.edu');     //Add a recipient

        //Content
        $email_template = "
            <h2>Hello</h2>
            <h3>You are receiving this email because $get_email has sent a password reset request. </h3>
            <a href='http://ec2-3-88-8-244.compute-1.amazonaws.com/php/forgetpassword.php?token=$token&email=$get_email'> Link to Reset </a>
        ";

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password Notification';
        $mail->Body    = $email_template;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if(isset($_POST['passwordreset'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM userlogin WHERE email = '$email' LIMIT 1";
    $check_email_run = mysqli_query($connection, $check_email);

    if(mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_email = $row['email'];
        $update_token = "UPDATE userlogin SET code = '$token' WHERE email = '$get_email' LIMIT 1";
        $update_token_run = mysqli_query($connection, $update_token);

        if($update_token_run) {
            send_password_reset($get_email, $token);
            $_SESSION['status'] = "Email Sent for Password Reset";
            header("Location: forgetpassword.php");
            exit(0);
        }

        else {
            $_SESSION['status'] = "Something Went Wrong. #1";
            header("Location: ../forgetpassword.php");
            exit(0);
        }
    }

    else {
        $_SESSION['status'] = "Invalid Email";
        header("Location: forgetpassword.php");
        exit(0);
    }
}
?>