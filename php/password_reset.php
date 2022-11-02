<?php
session_start();
include "../navigations/config.php";
require "phpmailer/PHPMailerAutoload.php";

function  send_password_reset($get_email, $token){
    $mail = new PHPMailer(true);
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'moneymakinguniversity.mmu@gmail.com';                     //SMTP username
    $mail->Password   = 'mmu32100';                               //SMTP password

    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($get_email);
    $mail->addAddress('moneymakinguniversity.mmu@gmail.com', 'Admin');     //Add a recipient

    $mail->isHTML(true);
    $mail->Subject = "Reset Password Notification";

    $email_template = "
        <h2>Hello</h2>
        <h3>You are receiving this email because $get_email has sent a password reset request. </h3>
        <br/><br/>
        <a href='http://ec2-3-88-8-244.compute-1.amazonaws.com/php/forgetpassword.php>token=$token&email=$get_email' Link to Reset </a>
    ";

    $mail->Body    = $email_template;
    $mail->send();
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