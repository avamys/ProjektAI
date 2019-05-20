<?php
    session_start();
    $_SESSION['pageId'] = 'login';

    if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
    {
        header('Location: index.php');
        exit();
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

</head>
<body>

<header>
    <?php include('navbar.php'); ?>
</header>

<!-- LOGIN SECTION -->
    <section id="third" class="sm-pad">
        <div class="container">
            <div class="headings">
                    <h2 class="title">Zaloguj się</h2>
                    <span class="hr"></span>
            </div>
            <div class="row sm-pad-top">
                <div class = "col-sm-1 col-md-2 col-lg-3"></div>
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-block">
                    <?php 
                        if(isset($_SESSION['failInfo']))
                            echo $_SESSION['failInfo'];
                    ?>
                    <!-- FORM -->
                    <form action="log.php" method="POST">
                        <div class="form-group">
                            <label for="login">Login:</label>
                            <input type="text" class="form-control" name="login">
                        </div>
                        <div class="form-group">
                            <label for="password">Hasło:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary text-center">Zaloguj</button>
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