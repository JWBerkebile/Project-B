<!DOCTYPE html>
<html lang="en">

    <?php

        //Database
        $servername = "localhost:8889";
        $username = "root";
        $password = "root";
        $dbname = "parts";


        //Create Connection
        $conn = new mysqli($servername, $username, $password, $dbname);


        //Check connection

        if($conn->connect_error) {
            die("Connection Failed:  " . $conn->connect_error);
        }

    ?> 

</html>