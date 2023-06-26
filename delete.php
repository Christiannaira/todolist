<?php

include "connect.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = '$id'";

    if ($connect->query($sql)) {
        echo "Student deleted";
    }

} else {

    echo "No student ID provided";

}

?>