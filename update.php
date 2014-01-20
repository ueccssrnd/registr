<?php
    $oldfullname = $_GET['ioldfullname'];
    $fullname = $_GET['ifullname'];
    $university = $_GET['iuniversity'];
    $college = $_GET['icollege'];
    $db = "registr_database";
    $tb = "registered_people";
    $tbTwo = "renewal";

    $connection = mysqli_connect("localhost", "root", "", "$db");

    $oldfullname = mysqli_real_escape_string($connection, $oldfullname);
    $fullname = mysqli_real_escape_string($connection, $fullname);
    $university = mysqli_real_escape_string($connection, $university);
    $college = mysqli_real_escape_string($connection, $college);

    $requestOne = "SELECT * FROM $tb WHERE full_name='$oldfullname'";
    $modelOne = mysqli_query($connection, $requestOne);
    $scan = mysqli_num_rows($modelOne);

    if($fullname != "" && $university != "" && $college != "") {
        if($modelOne) {
            $requestFour = "SELECT * FROM $tbTwo WHERE full_name='$oldfullname'";
            $modelFour = mysqli_query($connection, $requestOne);

            if($modelFour) {
                $requestFive = "UPDATE $tbTwo SET full_name='$fullname', university='$university', college='$college' WHERE full_name='$oldfullname'";
                $modelFive = mysqli_query($connection, $requestFive);                
            } else {
                $requestTwo = "INSERT INTO $tbTwo(full_name, university, college) VALUES ('$fullname', '$university', '$college')";
                $modelTwo = mysqli_query($connection, $requestTwo);
            }

            $requestThree = "UPDATE $tb SET full_name='$fullname', university='$university', college='$college' WHERE full_name='$oldfullname'";
            $modelThree = mysqli_query($connection, $requestThree);

            if($modelTwo && $modelThree && $modelFour) {
                echo "Renewal Success!";
                unset($fullname);
                unset($university);
                unset($college);
            }
        } else {
            echo "You are not yet in the list.";
        }
    } else {
        echo "Please fill up all fields.";
    }

    mysqli_close($connection);
?>