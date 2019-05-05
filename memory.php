<?php
    session_start();
    $_SESSION['pageId'] = 'memory';

    if(!isset($_SESSION['logged']))
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

<section id="memory" class="sm-pad">
    <div class="container">
        <div class="headings">
            <h2 class="title">Memory game</h2>
            <span class="hr"></span>
        </div>
        
        <div class="game">
            <div class="memory-card" data-fw="aurelia">
                <img class="front-face" src="img/aurelia.svg" alt="Aurelia">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="aurelia">
                <img class="front-face" src="img/aurelia.svg" alt="Aurelia">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="angular">
                <img class="front-face" src="img/angular.svg" alt="Angular">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="angular">
                <img class="front-face" src="img/angular.svg" alt="Angular">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="vue">
                <img class="front-face" src="img/vue.svg" alt="Vue">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="vue">
                <img class="front-face" src="img/vue.svg" alt="Vue">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="react">
                <img class="front-face" src="img/react.svg" alt="React">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="react">
                <img class="front-face" src="img/react.svg" alt="React">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="backbone">
                <img class="front-face" src="img/backbone.svg" alt="Backbone">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="backbone">
                <img class="front-face" src="img/backbone.svg" alt="Backbone">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="ender">
                <img class="front-face" src="img/ember.svg" alt="Ember">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
            <div class="memory-card" data-fw="ender">
                <img class="front-face" src="img/ember.svg" alt="Ember">
                <img class="back-face" src="img/js-badge.svg" alt="JS Badge">
            </div>
        </div>
    </div>
</section>

<!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>

    <script type="text/javascript" src="js/memory.js"></script>
</body>
</html>