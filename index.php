<?php
    session_start();
    $_SESSION['pageId'] = 'index';
    unset($_SESSION['failInfo']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dominik Grzegorzewicz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<!-- NAVIGATION -->
<header>
    <?php include('navbar.php'); ?>
</header>

<!--
  <section class="img-bg" id="start">
    <div class="container top-marg text-center">
        <h1 class="display-1">MONOPOLY</h1>
    </div>
  </section>
-->
    <section id="start">
        <canvas>
        </canvas>
    <section>

<!--
    <section id="start">
        <div class="grad">
            <div class="container top-marg text-center">
                <h1 class="display-1">MONOPOLY</h1>
            </div>
        </div>
    </section>-->

<!-- TOP BUTTON -->
    <a href="#start"><button type="button" class="btn button-up btn-circle">TOP</button></a>

<!-- SECTION 1 -->
    <section id="first" class="sm-pad">
        <div class="container">
        <div class="headings">
            <h2 class="title">Awesome Title Heading</h2>
            <span class="hr"></span>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis hendrerit dolor sed lacus condimentum, ut semper libero vestibulum. Suspendisse placerat massa erat, non porttitor mauris varius nec. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus a gravida lacus. Duis placerat a massa in sodales. Phasellus finibus urna nisl, quis bibendum dui condimentum sed. Fusce blandit mi tincidunt accumsan semper. Etiam vulputate mi id dictum tempus. Donec congue pretium nibh, in tincidunt sapien convallis quis. Nulla scelerisque commodo quam sit amet porta. Sed commodo tortor sapien, nec molestie velit tempor sed. Duis et convallis odio, a sagittis diam. Proin consequat velit sed pharetra hendrerit.</p>
        <p>Ut quis sodales lacus. Sed eu nulla nec velit auctor semper. Sed dui quam, faucibus eget finibus vestibulum, consectetur quis risus. Curabitur congue libero et rhoncus elementum. Nam eu orci sit amet lorem vestibulum commodo. Pellentesque auctor urna in luctus lobortis. Sed pharetra vel ipsum ut consectetur. Praesent ultrices non nisl ut faucibus. Nunc fermentum, neque at volutpat pretium, enim neque luctus ante, eu hendrerit urna justo vitae nisl. Donec sed ante in nunc feugiat finibus in nec arcu. Donec venenatis scelerisque viverra. Etiam ut vulputate purus. Vivamus rutrum massa sed felis ornare, a dignissim enim tincidunt. Quisque porttitor porta nisl, mollis tempor elit facilisis ut.</p>
        <p>Aenean porttitor ante quis sem accumsan, et suscipit mi ornare. Suspendisse dignissim sapien ante. Sed tincidunt erat mollis, finibus ipsum at, fringilla tellus. Proin interdum elit suscipit lacus venenatis suscipit. Nunc imperdiet consectetur varius. Mauris dictum consectetur lobortis. Ut sollicitudin purus nec nisl auctor vehicula. Suspendisse potenti.</p>
    </div>
    </section>

<!-- SECTION 2 -->
    <section id="second" class="sm-pad">
        
        <div class="container">
            <div class="headings">
                <h2 class="title">Wybrane wzory na pochodne</h2>
                <span class="hr"></span>
            </div>

            <p>
                Niech \(x_{0} \in R\) oraz \(S(x_{0})\) to otoczenie punktu \(x_{0, f: S(x_{0}) \to R}\) <br>
                Wyrażenie w postaci \({f(x_{0}+h)-f(x_{0}) \over h}\) gdzie \(h\) jest tak dobrane, że \(x_{0} + h = S(x_{0})\)
                nazywamy ilorazem różnicowym funkcji \(f\) w punkcie \(x_{0}\) odpowiadającym przyrostowi argumentu \(h\).
                Jeżeli istnieje skończona granica \(\lim\limits_{h \to 0} {f(x_{0}+h)-f(x_{0}) \over h}\) to nazywamy ją pochodną
                funkcji \(f\) w punkcie \(x_{0}\) i oznaczamy symbolem \(f'(x_{0})\)
            </p>
            <div class="row sm-pad-top">
                <div class="col-lg-4 col-md-12">
                    <h3 class="art-title">Pierwiastek</h3>
                    <p>$$\sqrt{x}' = {1 \over 2\sqrt{x}}$$</p>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h3 class="art-title">Sinus</h3>
                    <p>$$\sin(x)' = \cos(x)$$</p>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h3 class="art-title">Logarytm</h3>
                    <p>$$\log{a}x' = {1 \over x \ln a}$$</p>
                </div>
            </div>
            <div class="sm-pad-top">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur eveniet libero voluptatibus ipsam accusamus eos, veritatis alias incidunt deleniti amet explicabo mollitia est tempora quibusdam tenetur earum modi non at?</p>
            </div>
        </div>
    </section>

<!-- FOOTER -->
    <footer class="bg-foot">
        <?php include('footer.php'); ?>
    </footer>

<!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>

    <script type="text/javascript" src="js/canvas.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>