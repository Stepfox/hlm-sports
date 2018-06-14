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
            <a class="navbar-brand" href="#"><img src="<?php echo get_template_directory_uri() . '/images/mob-logo.png'; ?>" ></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reviews <span class="badge">11</span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Review</span> 888Sport</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Review</span>Unibet</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Review</span>Betfred</a></li>
                    </ul>
                </li>
                <li class="active"><a href="#">Strategy <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bonuses <span class="badge">3</span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"> <span class="badge">Bonus</span> 10$ bonus</a></li>
                        <li><a href="#"><span class="badge">Bonus</span> 100$ bonus</a></li>
                        <li><a href="#"> <span class="badge">Bonus</span> Sign Up Bonus</a></li>
                    </ul>
                </li>
                <li class="active"><a href="#">World Cup</a></li>
            </ul>
        </div>
    </div>
</nav>



<div id="top-element" class="container-fluid">


<!-- Services section -->
<div class="container">
        <p class="h1 col-8">Top World Cup Bets</p>
        <p class="text-left col-6 text-muted h5">Bet $10 on Harry Kane winning the Golden Boot and win $140</p>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">

                        <div class="logo">
                            <img src="<?php echo get_template_directory_uri() . '/images/landing/888.png'; ?>" >
                        </div>
                        <div class="card-block block-2">
                            <h3 class="card-title">888Sport</h3>
                            <p class="card-text">Wager just $10 on England to win the World Cup and you can win $160 plus an extra $5 free bet every time the team winds a match</p>
                            <div class="bet-now">bet now</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="logo">
                            <img src="<?php echo get_template_directory_uri() . '/images/landing/unibet.png'; ?>" >
                        </div>
                        <div class="card-block block-1">
                            <h3 class="card-title">Unibet</h3>
                            <p class="card-text">Wager $10 on England to top the group and win $22.5</p>
                            <div class="bet-now">bet now</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="logo">
                            <img src="<?php echo get_template_directory_uri() . '/images/landing/betfred.png'; ?>" >
                        </div>
                        <div class="card-block block-3">
                            <h3 class="card-title">BetFred</h3>
                            <p class="card-text">Spain vs Portugal, Place a wager of $10 on both Ronaldo and David Silva scoring form direct free kick and win $1000</p>
                            <div class="bet-now">bet now</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="logo">
                            <img src="<?php echo get_template_directory_uri() . '/images/landing/william.png'; ?>" >
                        </div>
                        <div class="card-block block-3">
                            <h3 class="card-title">William Hill</h3>
                            <p class="card-text">Bet just $1 on England making the knockout stages and win a massive $50 Bet Now</p>
                            <div class="bet-now">bet now</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>












<!-- Services section -->
<div id="good-bonus" class="container">
    <section id="what-we-do">
        <div class="container-fluid">
            <h2 class="section-title mb-2 h1">What makes a good bonus?</h2>
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-1">
                            The size of the bonus
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-2">
                            Low wagering requirements
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-4">
                            Lots of time to use your bonus
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

                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <img src="<?php echo get_template_directory_uri() . '/images/landing/888.png'; ?>" >
                </div>                

                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Wager just $10 on England to win the World Cup and you can win $160 plus an extra $5 free bet every time the team winds a match                    
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <div class="bet-now">bet now</div>
                </div>
            </div>

             <div class="card">
                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <img src="<?php echo get_template_directory_uri() . '/images/landing/unibet.png'; ?>" >
                </div> 
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Wager $10 on England to top the group and win $22.5                      
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <div class="bet-now">bet now</div>
                </div>
            </div>

             <div class="card">
                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <img src="<?php echo get_template_directory_uri() . '/images/landing/betfred.png'; ?>" >
                </div> 
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Spain vs Portugal, Place a wager of $10 on both Ronaldo and David Silva scoring form direct free kick and win $1000                       
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <div class="bet-now">bet now</div>
                </div>
            </div>

             <div class="card">
                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <img src="<?php echo get_template_directory_uri() . '/images/landing/william.png'; ?>" >
                </div> 
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Bet just $1 on England making the knockout stages and win a massive $50 Bet Now                    
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <div class="bet-now">bet now</div>
                </div>
            </div>


        </div>
</div>






<div class="container text-center">
    <img class="align-self-center" src="<?php echo get_template_directory_uri() . '/images/landing/logo-landing.png'; ?>">
</div>
<div class="container text-center footer-nav">
            <a href="#">Toggle navigation</a>
            <a href="#">Toggle navigation</a>
            <a href="#">Toggle navigation</a>
            <a href="#">Toggle navigation</a>
</div>

<div class="container text-center">
    WinningSportsBets 2018 All rights reserverd 
</div>
<div class="container text-center">
<img class="align-self-center" src="<?php echo get_template_directory_uri() . '/images/landing/gamble.png'; ?>" alt="placehold.it/350x80" >
</div>







</body>