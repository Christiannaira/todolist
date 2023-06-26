<?php

include 'connect.php';

$firstname = 'Christian';
$lastname = 'Naira';
$grade = 99;

$sql = "INSERT INTO users(firstname, lastname, grade)
        VALUES ('$firstname', '$lastname', '$grade')";

if ($connect->query($sql)) {

    echo "A Student Added";

}

?>