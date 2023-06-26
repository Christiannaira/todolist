<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    $title = $data['title'];
    $status = 'pending';

    $sql = "INSERT INTO todos (title, status)
            VALUES ('$title', '$status')";

    if ($connect->query($sql)) {

        $response = array(
            'success' => true
        );

        echo json_encode($response);

    }


}

?>