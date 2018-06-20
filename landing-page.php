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
<?php 


if (is_home()){ ?>
<script src="https://zz.connextra.com/dcs/tagController/tag/4b14c6edf5e6/homepage" async defer></script>
<?php }else{ ?>
<script src="https://zz.connextra.com/dcs/tagController/tag/4b14c6edf5e6/<?php $post_slug = get_post_field( 'post_name', get_post() ); echo $post_slug;?>" async defer></script>
<?php } ?>
<script src="https://a.volvelle.tech/pixel?id=8928&aid=1115&type=js"></script>  
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-113659323-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

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
            <a class="navbar-brand" href="https://www.winningsportsbets.co.uk/"><img src="<?php echo get_template_directory_uri() . '/images/mob-logo.png'; ?>" ></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/all-bookmakers-reviews" role="button" >Reviews </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bonuses <span class="badge">3</span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a target="_blank" href="https://www.winningsportsbets.co.uk/best-bonuses-promotions-world-cup-2018"> <span class="badge">Bonus</span> 10£ bonus</a></li>
                        <li><a target="_blank" href="https://www.winningsportsbets.co.uk/best-bonuses-promotions-world-cup-2018"><span class="badge">Bonus</span> 100£ bonus</a></li>
                        <li><a target="_blank" href="https://www.winningsportsbets.co.uk/best-bonuses-promotions-world-cup-2018"> <span class="badge">Bonus</span> Sign Up Bonus</a></li>
                    </ul>
                </li>
                <li><a target="_blank" href="https://www.winningsportsbets.co.uk/world-cup-2018-calendar">World Cup Odds<span class="sr-only">(current)</span></a></li>
                <li class="active"><a target="_blank" href="https://www.winningsportsbets.co.uk/world-cup-2018-betting-tips ">World Cup Tips</a></li>
            </ul>
        </div>
    </div>
</nav>



<div id="top-element" class="container-fluid">


<!-- Services section -->
<div class="container">
        <p class="h1 col-8">Top World Cup Bets</p>
        <p class="text-left col-6 text-muted h5">Bet £10 on Harry Kane winning the Golden Boot and win £140</p>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">

                        <div class="logo">
                            <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/888-bg1">
                                <img src="https://www.winningsportsbets.co.uk/wp-content/uploads/888sport_logo_136x44.png" alt="" class="bookmaker-background-wrap-30">
                            </a>
                        </div>
                        <div class="card-block block-2">
                            <h3 class="card-title">888Sport</h3>
                            <p class="card-text">Wager just £10 on England to win the World Cup and you can win £160 plus an extra £5 free bet every time the team winds a match</p>
                            <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/888-bg1">
                                <div class="bet-now">bet now</div>
                    </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="logo">
                            <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/unibet-bg1">
                                <img src="<?php echo get_template_directory_uri() . '/images/landing/unibet.png'; ?>" >
                            </a>
                        </div>
                        <div class="card-block block-1">
                            <h3 class="card-title">Unibet</h3>
                            <p class="card-text">Wager £10 on England to top the group and win £22.5</p>
                            <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/unibet-bg1">
                                <div class="bet-now">bet now</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="logo">
                            <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/betfred-bg1">
                                <img src="<?php echo get_template_directory_uri() . '/images/landing/betfred.png'; ?>" >
                            </a>
                        </div>
                        <div class="card-block block-3">
                            <h3 class="card-title">BetFred</h3>
                            <p class="card-text">Spain vs Portugal, Place a wager of £10 on both Ronaldo and David Silva scoring form direct free kick and win £1000</p>
                            <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/betfred-bg1">
                                <div class="bet-now">bet now</div>
                    </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="logo">
                            <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/ladbrokes-bg1">
                                <img src="https://www.winningsportsbets.co.uk/wp-content/uploads/ladbrokes-logo-136x44.png" alt="" class="bookmaker-background-wrap-494">
                            </a>
                        </div>
                        <div class="card-block block-3">
                            <h3 class="card-title">Ladbrokes</h3>
                            <p class="card-text">Bet just £1 on England making the knockout stages and win a massive £50 Bet Now</p>
                            <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/ladbrokes-bg1">
                                <div class="bet-now">bet now</div>
                            </a>
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
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/888-bg1">
                       <img src="https://www.winningsportsbets.co.uk/wp-content/uploads/888sport_logo_136x44.png" alt="" class="bookmaker-background-wrap-30">
                    </a>
                </div>                

                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Bet £10 on Harry Kane to with the Golden Boot and win £170                    
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/888-bg1">
                        <div class="bet-now">bet now</div>
                    </a>
                </div>
            </div>

             <div class="card">
                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/betfred-bg1">
                       <img src="https://www.winningsportsbets.co.uk/wp-content/uploads/betfred-1-1-136x44.png" alt="" class="bookmaker-background-wrap-852">
                    </a>
                </div> 
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Bet on Brazil to win the World Cup at odds of 9/2                      
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/betfred-bg1">
                        <div class="bet-now">bet now</div>
                    </a>
                </div>
            </div>

             <div class="card">
                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/william-hill-bg1">
                        <img src="https://www.winningsportsbets.co.uk/wp-content/uploads/2018/02/Comp-1-0000000-1-136x44.png" alt="" class="bookmaker-background-wrap-43">
                    </a>
                </div> 
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Bet £10 on England reaching the final and win £70
                      
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/william-hill-bg1">
                        <div class="bet-now">bet now</div>
                    </a>
                </div>
            </div>

             <div class="card">
                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/bet365">
                        <img src="https://www.winningsportsbets.co.uk/wp-content/uploads/bet365logo_600x300-136x44.jpg" alt="" class="bookmaker-background-wrap-1276">
                    </a>
                </div> 
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Bet on Iceland to get knocked out in the quarter finals at odds of 12/1       
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/bet365">
                        <div class="bet-now">bet now</div>
                    </a>
                </div>
            </div>
             <div class="card">
                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/ladbrokes-bg1">
                        <img src="https://www.winningsportsbets.co.uk/wp-content/uploads/ladbrokes-logo-136x44.png" alt="" class="bookmaker-background-wrap-494">
                    </a>
                </div>                

                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Bet on France being the top scoring team at odds of 11/2                 
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/ladbrokes-bg1">
                        <div class="bet-now">bet now</div>
                    </a>
                </div>
            </div>

             <div class="card">
                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/unibet-bg1">
                        <img src="https://www.winningsportsbets.co.uk/wp-content/uploads/unibet-logo-3-136x44.png" alt="" class="bookmaker-background-wrap-256">
                    </a>
                </div> 
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Bet £10 on Jordan Pickford earning the Golden Glove and win £160                      
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/unibet-bg1">
                        <div class="bet-now">bet now</div>
                    </a>
                </div>
            </div>

             <div class="card">
                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/bet-at-home-bg1">
                        <img src="https://www.winningsportsbets.co.uk/wp-content/uploads/bet-at-home-logo-136x44.png" alt="" class="bookmaker-background-wrap-177">
                    </a>
                </div> 
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text"> Bet £10 on the winner coming from group G and win £60                    
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/bet-at-home-bg1">
                        <div class="bet-now">bet now</div>
                    </a>
                </div>
            </div>

             <div class="card">
                <div class="logo col-sm-12 col-xs-3 col-md-3">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/bethard-bg1">
                        <img src="https://www.winningsportsbets.co.uk/wp-content/uploads/bethardd.png" alt="" class="bookmaker-background-wrap-374">
                    </a>
                </div> 
                <div class="col-sm-12 col-xs-6 col-md-6">
                    <p class="list-group-item-text">Bet £10 on Marcus Rashford being top England goal scorer and win £70      
                    </p>
                </div>
                <div class="col-sm-12 col-xs-3 col-md-3 text-center">
                    <a target="_blank" href="https://www.winningsportsbets.co.uk/goto/bethard">
                        <div class="bet-now">bet now</div>
                    </a>
                </div>
            </div>

        </div>
</div>






<div class="container text-center">
    <img class="align-self-center" src="<?php echo get_template_directory_uri() . '/images/landing/logo-landing.png'; ?>">
</div>

<div class="container text-center">
    WinningSportsBets 2018 All rights reserverd 
</div>
<div class="container text-center">
<img class="align-self-center" src="<?php echo get_template_directory_uri() . '/images/landing/gamble.png'; ?>" >
</div>







</body>
</html>