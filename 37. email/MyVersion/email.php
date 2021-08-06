<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/PHPMailer/src/Exception.php';
    require 'phpmailer/PHPMailer/src/PHPMailer.php';
    require 'phpmailer/PHPMailer/src/SMTP.php';
    
    echo "algo";
    function enviarEmail(){
        if(isset($_POST['name'])&&isset($_POST['email']) && isset($_POST['coment'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $coment= $_POST['email'];
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'familiarcarlos@hotmail.com';                     //SMTP username
                $mail->Password   = 'zombie11';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('familiarcarlos@hotmail.com', 'Mailer');
                $mail->addAddress('romero.martinez.carlosraul@gmail.com', 'Mailer');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Correo de contacto'.$email.'<br/>'.$coment;
                $mail->Body    = 'Nombre :'.$name.'<br/>Correo';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        else{
            return;
        }
    }
    enviarEmail();
?>