<?php

function fetchData($table_name,$id=1){
    global $conn;
    $sql = "SELECT * FROM $table_name where id=?";

    $stmt = mysqli_prepare($conn, $sql);
    
    
    mysqli_stmt_bind_param($stmt, 'i', $id);
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    
    
    return (object) $row;
}
