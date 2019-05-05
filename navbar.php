<?php

    if($_SESSION['pageId']=='index')
        echo '<nav class="navbar navbar-expand-md navbar-dark">';
    else
        echo '<nav class="navbar scrolled navbar-expand-md navbar-dark">';

?>
        <!-- Brand/logo -->
        <div class="container font-weight-bold">
        <a class="navbar-brand" href="index.php#start">Dominik Grzegorzewicz</a>
        
        <?php
            if($_SESSION['pageId']=='index')
            {
                echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">';
                echo '<span class="navbar-toggler-icon"></span></button>';
            }

        ?>
        
        <div class="collapse navbar-collapse justify-content-center text-uppercase" id="collapsibleNavbar">
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php#first">Artykuł</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php#second">Pochodne</a>
            </li>

            <!-- GAME TEST -->
            <?php
                if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
                {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="memory.php">Memory</a></li>';
                }
            ?>
            <!-- END TEST -->

        </ul>
        <ul class='navbar-nav align-items-center ml-auto'>
            <?php
                if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
                {
                    $user = $_SESSION['login'];
                    echo "<li class='nav-item'>";
                    echo "<span class='my-img-border'>Witaj $user</span>";
                    echo "</li>";
                    // Log out
                    echo "<li class='nav-item'>";
                    echo '<a class="nav-link" href="logout.php">Logout</a>';
                    echo "</li>";
                }
                else
                {
                    echo "<li class='nav-item'>";
                    echo '<a class="nav-link sm-mg-right" href="login.php">Login</a>';
                    echo "</li>";

                    echo "<li class='nav-item'>";
                    echo '<a class="nav-link" href="signup.php">Sign up</a>';
                    echo "</li>";
                }
            ?>
        </ul>
        </div>
        </div>
  </nav>