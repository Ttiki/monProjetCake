<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <!--    <link href="../assets/css/bootstrap.css" rel="stylesheet">-->
    <?php
    echo $this->Html->css('bootstrap');
    echo $this->Html->css('bootstrap-responsive');
    echo $this->fetch('css');
    ?>

    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>

    <!-- Lien à modifier ici -->
    <!--    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">-->
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--            <a class="brand" href="#">Project name</a>-->
            <a class="brand" href="#"><?php //echo Création du bloc monTitre avec fetch
                echo $this->fetch('MonTitre'); ?></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                >
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">
    <?php echo $this->fetch('content'); ?>
    <hr>

    <footer>
        <p>Site réalisé avec le framework CakePHP version 3 .</p>
    </footer>


</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="../assets/js/jquery.js"></script>-->
<!--<script src="../assets/js/bootstrap-transition.js"></script>-->
<!--<script src="../assets/js/bootstrap-alert.js"></script>-->
<!--<script src="../assets/js/bootstrap-modal.js"></script>-->
<!--<script src="../assets/js/bootstrap-dropdown.js"></script>-->
<!--<script src="../assets/js/bootstrap-scrollspy.js"></script>-->
<!--<script src="../assets/js/bootstrap-tab.js"></script>-->
<!--<script src="../assets/js/bootstrap-tooltip.js"></script>-->
<!--<script src="../assets/js/bootstrap-popover.js"></script>-->
<!--<script src="../assets/js/bootstrap-button.js"></script>-->
<!--<script src="../assets/js/bootstrap-collapse.js"></script>-->
<!--<script src="../assets/js/bootstrap-carousel.js"></script>-->
<!--<script src="../assets/js/bootstrap-typeahead.js"></script>-->
<?php
echo $this->Html->script('bootstrap');
echo $this->Html->script('bootstrap.min');
echo $this->fetch('script');
?>

</body>
</html>
