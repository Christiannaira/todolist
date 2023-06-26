<?php

include 'connect.php';

$firstname = 'Jewer';
$lastname = 'Naira';
$grade = 100;

$sql = "INSERT INTO users(firstname, lastname, grade)
        VALUES ('$firstname', '$lastname', '$grade')";

if ($connect->query($sql)) {

    echo "A Student Added";

}

?>