<?php 
function generate_random_string($length=10){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function date_difference($date1,$date2=null){
    $date2=$date2?:(new \DateTime('tomorrow'));
   $diff= date_diff($date1,$date2);
   return $diff;
}
