<?php

include 'config.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "UPDATE todos SET status = 'complete' WHERE id = $id";

    if ($connect->query($sql)) {

        $response = array(
            'success' => true,
        );

        echo json_encode($response);

    }


}

?>