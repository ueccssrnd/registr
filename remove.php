<?php
    $id = $_GET['id'];
    $db = "registr_database";
    $tb = "registered_people";

    $connection = mysqli_connect("localhost", "root", "", "$db");

    $requestOne = "DELETE FROM $tb WHERE id='$id'";
    $modelOne = mysqli_query($connection, $requestOne);

    if($modelOne) {
        header("Location: /registr/admin.php");
    } else {
        echo mysqli_error();
    }

    mysqli_close($connection);
?>