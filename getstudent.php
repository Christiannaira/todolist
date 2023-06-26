<?php

include "connect.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $student = array(
            'id' => $row['id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'grade' => $row['grade']
        );

        $json = json_encode($student);
        header("Content-Type: Application/json");
        echo $json;

    } else {

        echo "No Student";

    }

} else {

    echo "No student ID provided";

}

?>