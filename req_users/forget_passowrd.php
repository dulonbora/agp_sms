<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
error_reporting(0);
include '../classes/Users.php';
$user = new Users();
include '../classes/Posts.php';
$Posts = new Posts();

$response = array();
$response["SUCCESS"] = 0;
$email = filter_input(INPUT_POST, 'EMAIL_OR_PHONE');

 $id  =$user->forget($email);
if ($id > 0) {
    
    $user->loadValue($id);
    
    if(strlen($user->getPassword()) > 0){
    $Posts->SendOtp("Your Passord id ".$user->getPassword(), $user->getMobileNo());

    $message = "Your Passord id ".$user->getPassword();
    $subject = "Password Request";
    $fromname = "Asom Gana Parishad";
    $from = "join@asomganaparishad.in";

    require '../phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = '127.0.0.1';
    $mail->Port = 25;
    $mail->setFrom('join@asomganaparishad.com', 'Asom Gana Parishad');
    $mail->addReplyTo('join@asomganaparishad.com', 'Asom Gana Parishad');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = $message;
    $mail->From = $from;
    $mail->FromName = $fromname;

    if ($mail->send()) {
    $response["SUCCESS"] = 1;
        
    } 
        
    }
    
 else {
        $pas = rand(10000,10000);
        $user->UpdateSingle("PASSWORD", $pas, $id);
        $Posts->SendOtp("Your Passord id ".$pas, $user->getMobileNo());
        
        $message = "Your Passord id ".$pas;
        $subject = "Password Request";
        $fromname = "Asom Gana Parishad";
        $from = "join@asomganaparishad.in";

        require '../phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = '127.0.0.1';
        $mail->Port = 25;
        $mail->setFrom('join@asomganaparishad.com', 'Asom Gana Parishad');
        $mail->addReplyTo('join@asomganaparishad.com', 'Asom Gana Parishad');
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = $message;
        $mail->From = $from;
        $mail->FromName = $fromname;

        if ($mail->send()) {
    $response["SUCCESS"] = 1;
            
        } 
    }
    


}
echo json_encode($response);
?>
