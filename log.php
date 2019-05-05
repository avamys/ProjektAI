<?php

    session_start();
    require_once "connect.php";

    $connection = @new mysqli($host,$db_user,$db_password,$db_name);

    if($connection->connect_errno!=0)
    {
        echo "Error: ".$connection->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        $qry = "select * from user where binary login='$login' and binary passwd='$password'";
    
        if($result = @$connection->query(sprintf("select * from user where binary login='%s' and binary passwd='%s'",
        mysqli_real_escape_string($connection,$login),
        mysqli_real_escape_string($connection,$password))))
        {
            $resNum = $result->num_rows;
            if($resNum>0)
            {
                $row = $result->fetch_assoc();
                $_SESSION['login'] = $row['login'];
                $_SESSION['logged'] = true;
                unset($_SESSION['failInfo']);
                
                $result->free_result();

                header('Location: index.php');
            }
            else
            {
                $_SESSION['failInfo'] = "<span class='text-center text-danger'>Nieprawidłowy login i/lub hasło</span>";
                header('Location: login.php');
            }
        }

        $connection->close();
    }
?>