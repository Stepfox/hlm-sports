<?php 
/* Template Name: Landing Page
 * Description :Landing Page
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?>><head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<!--viewport-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--pingback-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--stylesheet-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/landing.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/bootstrap-grid.min.css'; ?>" />

<!-- 

https://bootsnipp.com/snippets/featured/findcond-navbar 
https://bootsnipp.com/snippets/featured/services-section-using-bootstrap-4





-->


</head>


<body>


<nav class="navbar navbar-findcond navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Findcond</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> Bildirimler <span class="badge">0</span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Music</span> sayfasında iletiniz beğenildi</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Video</span> sayfasında iletiniz beğenildi</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Game</span> sayfasında iletiniz beğenildi</a></li>
                    </ul>
                </li>
                <li class="active"><a href="#">Ana Sayfa <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Geri bildirim</a></li>
                        <li><a href="#">Yardım</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Ayarlar</a></li>
                        <li><a href="#exit">Çıkış yap</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>



<div id="top-element" class="container-fluid">


<!-- Services section -->
<div class="container">
        <p class="h1 col-8">Top World Cup Bets</p>
        <p class="text-left col-8 text-muted h5">Bet $10 on Harry Kane winning the Golden Boot and win $140</p>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="card-block block-1">
                            <h3 class="card-title">Special title</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="card-block block-2">
                            <h3 class="card-title">Special title</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="card-block block-3">
                            <h3 class="card-title">Special title</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="card-block block-3">
                            <h3 class="card-title">Special title</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>












<!-- Services section -->
<div class="container">
    <section id="what-we-do">
        <div class="container-fluid">
            <h2 class="section-title mb-2 h1">What we do</h2>
            <p class="text-center text-muted h5">Having and managing a correct marketing strategy is crucial in a fast moving market.</p>
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-1">
                            <h3 class="card-title">Special title</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-2">
                            <h3 class="card-title">Special title</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-4">
                            <h3 class="card-title">Special title</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
    <!-- /Services section -->
</div>





<div id="bonus-list" class="container">
        <div class="container-fluid">
            <p class="section-title mb-2 h1 text-center">What we do</p>
             <div class="card">
                <img class="col-sm-12 col-xs-3 col-md-3" src="http://placehold.it/350x80" alt="placehold.it/350x80" >
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Eu eum corpora torquatos, ne postea constituto mea, quo tale lorem facer no. Ut sed odio appetere partiendo, quo meliore salutandi ex. Vix an sanctus vivendo, sed vocibus accumsan petentium ea.                         
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <button type="button" class="btn btn-primary btn-lg btn-block">Vote Now!</button>
                </div>
            </div>

             <div class="card">
                <img class="col-sm-12 col-xs-3 col-md-3" src="http://placehold.it/350x80" alt="placehold.it/350x80" >
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Eu eum corpora torquatos, ne postea constituto mea, quo tale lorem facer no. Ut sed odio appetere partiendo, quo meliore salutandi ex. Vix an sanctus vivendo, sed vocibus accumsan petentium ea.                         
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <button type="button" class="btn btn-primary btn-lg btn-block">Vote Now!</button>
                </div>
            </div>

             <div class="card">
                <img class="col-sm-12 col-xs-3 col-md-3" src="http://placehold.it/350x80" alt="placehold.it/350x80" >
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Eu eum corpora torquatos, ne postea constituto mea, quo tale lorem facer no. Ut sed odio appetere partiendo, quo meliore salutandi ex. Vix an sanctus vivendo, sed vocibus accumsan petentium ea.                         
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <button type="button" class="btn btn-primary btn-lg btn-block">Vote Now!</button>
                </div>
            </div>



        </div>
</div>






<div class="container text-center">
<img class="align-self-center" src="http://placehold.it/350x80" alt="placehold.it/350x80" >
</div>
<div class="container text-center">
            <a href="#">Toggle navigation</a>
            <a href="#">Toggle navigation</a>
            <a href="#">Toggle navigation</a>
            <a href="#">Toggle navigation</a>
</div>

<div class="container text-center">
    copyrightcopyrightcopyright copyright copyright copyright copyright copyright copyright copyright copyright copyright 
</div>
<div class="container text-center">
<img class="align-self-center" src="http://placehold.it/350x80" alt="placehold.it/350x80" >
</div>







</body>