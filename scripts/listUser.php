<?php
    include 'config.php';


error_reporting(0);



   // $admin_id = $_POST['id'];
   // $password = $_POST['password'];

    $conn = mysqli_connect($db_host, $db_user, $db_password);



    if($conn){

        if(mysqli_select_db($conn,$mjdb)){

            $query = mysqli_query($conn , "select password from admin where id = '$admin_id' ");

            $row = mysqli_fetch_array($query);

            $res = $row['password'];

            if($password == $res){

                $query = mysqli_query($conn , "select * from user");



                while ($rows = mysqli_fetch_array($query)) {

                    $myObj->name = $rows['name'];
                    $myObj->id = $rows['id'];
                    $myObj->profile_photo = $rows['profile_photo'];
                    $myObj->password = $rows['password'];
                    $myObj->dept = $rows['dept'];
                    $myObj->sub_dept = $rows['subdept'];

                    $myObj->result = "yes";



                    $myJSON = json_encode($myObj);
                    echo $myJSON;
                    echo "\n";



                }

            }

        }
    }


    $myObj->result = "no";
    $myJSON = json_encode($myObj);

    echo $myJSON;


?>

