<?php
include "db_conn.php";
$id = $_GET["id"];

// prepare the SQL statement
$sql = "DELETE FROM `crud` WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
if(!$stmt){
    echo "Failed to prepare statement: " . mysqli_error($conn);
    exit();
}

// bind the parameter to the statement
mysqli_stmt_bind_param($stmt, "i", $id);

// execute the statement
if(mysqli_stmt_execute($stmt)){
    header("Location: index.php?msg=Record deleted successfully");
}else{
    echo "Failed: " . mysqli_error($conn);
}

// close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>