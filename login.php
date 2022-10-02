<?php

require_once "loginpage/dbengine/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //something was posted
    $name = $_POST['uname'];
    $password = $_POST['psw'];

    if(!empty($name) && !empty($password) && !is_numeric($name))
    {

        //read from database
        
        $query = "select * from users where user_name = '$name' limit 1";
        $result = mysqli_query($conn, $query);

        if($result)
        {

            if($result && mysqli_num_rows($result) > 0)
		    {

                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("location: loginpage/index.php");
                    die;

                }
			
            }
        }
         header("location: index.php? error=Invalid Login Details! Try again.");

    }else{

         header("location: index.php? error=Wrong Username or Password! Try again.");
    }
}

?>