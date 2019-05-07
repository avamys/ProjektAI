<?php
    session_start();
    $_SESSION['pageId'] = 'signup';

    if(isset($_POST['email']))
    {
        $isCorrect = true;
        $rlogin = $_POST['rlogin'];

        if(strlen($rlogin)<3 || strlen($rlogin)>20)
        {
            $isCorrect = false;
            $_SESSION['regFail']="<span class='text-center text-danger'>Login musi zawierać od 3 do 20 znaków</span>";
        }

        if(ctype_alnum($rlogin)==false)
        {
            $isCorrect = false;
            $_SESSION['regFail']="<span class='text-center text-danger'>Login musi składać się tylko z liter i cyfr</span>";
        }

        $email = $_POST['email'];
        $safeEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        if((filter_var($safeEmail,FILTER_VALIDATE_EMAIL)==false) || ($email!=$safeEmail))
        {
            $isCorrect = false;
            $_SESSION['emailFail']="<span class='text-center text-danger'>Niepoprawny adres e-mail</span>";
        }

        $password = $_POST['password'];
        $password2 = $_POST['repasswd'];

        if((strlen($password)<6) || (strlen($password)>20))
        {
            $isCorrect = false;
            $_SESSION['passFail']="<span class='text-center text-danger'>Hasło musi zawierać od 6 do 20 znaków</span>";
        }
        if($password != $password2)
        {
            $isCorrect = false;
            $_SESSION['repassFail']="<span class='text-center text-danger'>Podane hasła nie są identyczne</span>";
        }

        $passHash = password_hash($password,PASSWORD_DEFAULT);

        if(!isset($_POST['check']))
        {
            $isCorrect = false;
            $_SESSION['checkFail']="<span class='text-center text-danger'>Potwierdź akceptację</span>";
        }

        $key = "6Lc946AUAAAAAHh6cIuBaDFvhjpLmRkHgAW7KlmV";

        $checkKey = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$key."&response=".$_POST['g-recaptcha-response']);
        $answ = json_decode($checkKey);

        if($answ->success==false)
        {
            $isCorrect = false;
            $_SESSION['capFail']="<span class='text-center text-danger'>Potwierdź, że nie jesteś robotem</span>";
        }


        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $connection = new mysqli($host,$db_user,$db_password,$db_name);
            if($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                // EMAIL
                $qry = $connection->query("SELECT id FROM user WHERE email='$email'");
                if(!$qry) throw new Exception($connection->error);

                $mailNum = $qry->num_rows;
                if($mailNum>0)
                {
                    $isCorrect = false;
                    $_SESSION['emailFail']="<span class='text-center text-danger'>Istnieje już konto przypisane do tego adresu e-mail</span>";
                }

                // LOGIN
                $qry = $connection->query("SELECT id FROM user WHERE login='$rlogin'");
                if(!$qry) throw new Exception($connection->error);

                $logNum = $qry->num_rows;
                if($logNum>0)
                {
                    $isCorrect = false;
                    $_SESSION['regFail']="<span class='text-center text-danger'>Istnieje już użytkownik o takim loginie</span>";
                }

                // CREATE NEW DB RECORD
                if($isCorrect == true)
                {
                    if($connection->query("insert into user values(NULL,'$rlogin','$passHash','$email')"))
                    {
                        $_SESSION['regSuccess']=true;
                        header('Location: welcome.php');
                    }
                    else
                    {
                        throw new Exception($connection->error);
                    }
                }

                $connection->close();
            }
        }
        catch(Exception $err)
        {
            echo "<span class='text-center text-danger'>Błąd serwera! Przepraszamy za niedogodności.</span>";
            exit();
        }

    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dominik Grzegorzewicz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<header>
    <?php include('navbar.php'); ?>
</header>

<!-- LOGIN SECTION -->
    <section id="third" class="sm-pad">
        <div class="container">
            <div class="headings">
                    <h2 class="title">Create account</h2>
                    <span class="hr"></span>
            </div>
            <div class="row sm-pad-top">
                <div class = "col-sm-1 col-md-2 col-lg-3"></div>
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-block">
                    <?php 
                        if(isset($_SESSION['regFail']))
                        {
                            echo $_SESSION['regFail'];
                            unset($_SESSION['regFail']);
                        }
                    ?>
                    <!-- FORM -->
                    <form method="POST">
                        <div class="form-group">
                            <label for="rlogin">Login:</label>
                            <input type="text" class="form-control" name="rlogin">
                        </div>
                        <?php 
                        if(isset($_SESSION['emailFail']))
                        {
                            echo $_SESSION['emailFail'];
                            unset($_SESSION['emailFail']);
                        }
                        ?>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <?php 
                        if(isset($_SESSION['passFail']))
                        {
                            echo $_SESSION['passFail'];
                            unset($_SESSION['passFail']);
                        }
                        ?>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <?php 
                        if(isset($_SESSION['repassFail']))
                        {
                            echo $_SESSION['repassFail'];
                            unset($_SESSION['repassFail']);
                        }
                        ?>
                        <div class="form-group">
                            <label for="repasswd">Retype password:</label>
                            <input type="password" class="form-control" name="repasswd">
                        </div>
                        <?php 
                        if(isset($_SESSION['checkFail']))
                        {
                            echo $_SESSION['checkFail'];
                            unset($_SESSION['checkFail']);
                        }
                        ?>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="check"> I agree the Terms of Service</label>
                        </div>
                        <?php 
                        if(isset($_SESSION['capFail']))
                        {
                            echo $_SESSION['capFail'];
                            unset($_SESSION['capFail']);
                        }
                        ?>
                        <div class="text-center">
                            <div class="g-recaptcha" data-sitekey="6Lc946AUAAAAAPby9Ftw4FB0oh0hSB-N21rZRmBU"></div><br>
                            <button type="submit" class="btn btn-primary text-center">Create account</button>
                        </div>
                    </form>

                </div>
                <div class = "col-sm-1 col-md-2 col-lg-3"></div>
                </div>
        </div>
    </section>

<!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>

</body>
</html>