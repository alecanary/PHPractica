<?php
function listaEjemplos()
{
    $dir = opendir( "./sections" );


    while ($fichero = readdir( $dir )) {
        if (substr( $fichero, -3 ) == 'php') {
            $ejemplos[] = substr( $fichero, 0, -4 );
        }

    }
    closedir( $dir );

    return $ejemplos;
}

function listaEjemplosMathew()
{
    $dir = "./sections";
    if (is_dir( $dir )) {
        if ($dirOpen = opendir( $dir )) {
            $i = 1;
            while (($file = readdir( $dirOpen )) !== false) {
                if ($file != "." && $file != "..") {
                    $name = substr( $file, 0, -4 );
                    echo "<li class=\"nav-item\"><a class=\"nav-link js-scroll-trigger\" href=\"?section=$i\">$name</a></li>" . "<br>";
                    $i++;
                }
            }
        }
        closedir( $dirOpen );
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resume - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <!-- <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="?section=prueba">Prueba</a>
             </li>-->
            <?php
            // listaEjemplosMathew();
            ?>
            <?php
            foreach (listaEjemplos() as $ficheroEjemplo) { ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger"
                       href="?section=<?= $ficheroEjemplo ?>"> <?= $ficheroEjemplo ?></a>

                </li>
                <?php
            }
            ?>

            <!--<li class=" nav-item">
                <a class="nav-link js-scroll-trigger" href="?section=about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="?section=experience">Experience</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="?section=education">Education</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="?section=skills">Skills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="?section=interests">Interests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="?section=awards">Awards</a>
            </li>
            -->
        </ul>
    </div>
</nav>

<div class="container-fluid p-0">

    <?php
    // me muestra los sections

    if (isset( $_GET['section'] ) && !empty( $_GET['section'] )) {
        include("sections/" . $_GET['section'] . '.php');
    }


    ?>

    <!--








-->

</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/resume.min.js"></script>

</body>

</html>
