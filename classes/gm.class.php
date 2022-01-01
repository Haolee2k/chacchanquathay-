<?php
class gm extends Db{
    function GuiMail($to, $from, $from_name, $subject, $body, $username, $password, &$error){
       $error = "";
       require_once "phpmailer.class.php";      
       require_once "smtp.class.php";      
       try {
            $mail = new PHPMailer();  
            $mail -> IsSMTP(); 
            $mail -> SMTPDebug = 0;  //  1=errors and messages, 2=messages only
            $mail -> SMTPAuth = true;  
            $mail -> SMTPSecure = 'ssl'; 
            $mail -> Host = 'smtp.mail.yahoo.com';
            $mail -> Port = 465; 
            $mail -> Username = $username;
            $mail -> Password = $password;           
            $mail -> SetFrom($from, $from_name);
            $mail -> Subject = $subject;
            $mail -> MsgHTML($body);// noi dung chinh cua mail
            $mail -> AddAddress($to);
            $mail -> CharSet="utf-8";
            $mail -> IsHTML(true);
            if( !$mail->Send() ) {
              echo $error = 'Loi:'.$mail->ErrorInfo;
            } else { 
                $error = '';
            }
       } 
       catch (phpmailerException $e) { echo "<pre>".$e->errorMessage(); }    
    }
}
?>