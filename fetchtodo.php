<?php

include "config.php";

$sql = "SELECT * FROM todos ORDER BY id DESC";
$results = $connect->query($sql);

if ($results->num_rows > 0) {

    $items = array();

    while ($row = $results->fetch_assoc()) {

        $item = array(
            'id' => $row['id'],
            "title" => $row['title'],
            'status' => $row['status']
        );

        $items[] = $item;

    }

    $json = json_encode($items);
    header('Content-Type: application/json');
    echo $json;

}

?>