<?php

require_once "loginpage/dbengine/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //something was posted
    $name = $_POST['name'];
    $password = $_POST['psw'];

    if(!empty($name) && !empty($password) && !is_numeric($name))
    {

        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id, user_name, password)
                values('$user_id', '$name', '$password')";

                mysqli_query($conn, $query);

                header("location: index.php? error=Registration successful...Login Below.");
                die;

    }else{

         header("location: index.php? error=Please enter some valid details.");
    }
}

function random_num($length){

    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4,$lenght);
    for ($i=0; $i < $len; $i++){

        $text .= rand(0,9);
    }

    return $text;
}