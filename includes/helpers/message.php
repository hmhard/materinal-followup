<?php

function setMessage($text,$message_type="success"){
global $has_message;
$has_message=true;
    $_SESSION['has_message'] = true;
    $message=[];
    $message['type'] = $message_type;
    $message['text'] = $text;

    $_SESSION['message']=$message;
}
function clearMessages(){
global $has_message;
global $message;
   
    $has_message = $_SESSION['has_message'] ?: false;
    $message = (object) $_SESSION['message'];
    $_SESSION['has_message'] = false;
    $_SESSION['message'] = new stdClass();
}

?>