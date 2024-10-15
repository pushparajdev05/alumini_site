<?php
include "../config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

	$action=mysqli_real_escape_string($con,$_POST["user"]);
	$uname=mysqli_real_escape_string($con,$_POST["login_name"]); 
	$pwd=mysqli_real_escape_string($con,$_POST["login_password"]); 
    if($action=="in")
    {
             $sql="select * from staff where email='{$uname}' and pwd='{$pwd}'";
            $res=$con->query($sql);
            // echo $res;
            if ($res->num_rows > 0) {
                echo 1;
            }
            else{
                echo 0;
            }
    }
    else{
  
    $token = bin2hex(random_bytes(16));
    $sql1 = "insert into temp_staff(email,pwd,token,expired_date) values('{$uname}','{$pwd}','{$token}',NOW())";
    if($con->query($sql1))
    {
        $sql2 = "select * from admins";
        $res=$con->query($sql2);
        $subject = "verfication request from measi alumini";
        $message="<h1>New staff tried to sign up to staff page in alumini site with identity of {$uname}<h1>
        <a href='http://localhost/alumini_site/backend/authentication/verify_login.php?token={$token}'>Verify Login</a>";
        if($res->num_rows > 0)
        {
            $mail = new PHPMailer(true);

            try {
    //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'pushparajdev05@gmail.com';                     //SMTP username
                $mail->Password   = 'ycjt mqmb iggh fwio';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption - use 465 port if set to SMTPSecure = PHPMailer::ENCRYPTION_SMTPS
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('pushparajdev05@gmail.com', 'Measi IT');
                while ($row = $res->fetch_assoc()) {
                $admin_email = $row["id"];
                    $mail->addAddress($admin_email, 'Admin'); 
            }
                    //Add a recipient


                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                $sql3 = "delete from temp_staff where token='{$token}'";
                if ($con->query($sql3)) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

            }
            
        }
        else{
            $sql3 = "delete from temp_staff where token='{$token}'";
            if($con->query($sql3))
            {
                echo "there is no admin's emails";
            }
            
        }
    }
    }
?>