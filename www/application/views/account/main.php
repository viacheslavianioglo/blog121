<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$pagetitle?></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="<?=base_url()?>css/blog-post.css" rel="stylesheet">

    <script type="application/javascript">
        $(document).ready(function(){
//            alert($("#article").html());
            $("#article img").addClass( "img_article" );

        });

    </script>


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
<!--            <a class="navbar-brand" href="pages/index/list">Start Bootstrap</a>-->
            <?=anchor( "pages/index/", "Blog", array('class' => "navbar-brand"))?>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
<!--                <li>--><?//=anchor("pages/index", "Blog")?><!-- </li>-->
                <li><?=anchor("account/lunit/index", "Statistic")?> </li>
                <li><?=anchor("account/pages/index/list", "Pages")?> </li>
                <li><?=anchor("account/images/index/list", "Images")?> </li>
                <li><?=anchor("account/lunit/settings", "My settings")?> </li>
                <li><?=anchor("admin/categories/index/list", "Categories")?> </li>
                <li><?=anchor("admin/settings", "Settings")?> </li>
                <li><?=anchor("admin/users", "Users")?> </li>
                <li><?=anchor("account/logout", "Logout")?> </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">

    <?=$content?>

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
                <div style="border: 1px solid black" id="debug"><?=print_r($this->session->userdata())?></div>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!--</div>-->


</body>

</html>
