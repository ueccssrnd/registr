<?php
    $fullname = $_GET['ifullname'];
    $university = $_GET['iuniversity'];
    $college = $_GET['icollege'];
    $db = "registr_database";
    $tb = "registered_people";

    $connection = mysqli_connect("localhost", "root", "", "$db");

    $fullname = mysqli_real_escape_string($connection, $fullname);
    $university = mysqli_real_escape_string($connection, $university);
    $college = mysqli_real_escape_string($connection, $college);

    $requestOne = "SELECT * FROM $tb WHERE full_name='$fullname'";
    $modelOne = mysqli_query($connection, $requestOne);
    $scan = mysqli_num_rows($modelOne);

    if($fullname != "" && $university != "" && $college != "") {
        if(!$scan) {
            $fullname = mysqli_real_escape_string($connection, $fullname);
            $university = mysqli_real_escape_string($connection, $university);
            $college = mysqli_real_escape_string($connection, $college);

            $requestTwo = "INSERT INTO $tb(full_name, university, college) VALUES ('$fullname', '$university', '$college')";
            $modelTwo = mysqli_query($connection, $requestTwo);

            if($modelTwo) {
                echo "Registration Successful!";
                unset($fullname);
                unset($university);
                unset($college);
            }
        } else {
            echo "You are already registered.";
        }
    } else {
        echo "Please fill up all fields.";
    }

    mysqli_close($connection);
?>