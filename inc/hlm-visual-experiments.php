<?php 


if ( ! function_exists( 'hlm_theme_styles' ) ) :
  function hlm_theme_styles() {
    wp_enqueue_style( 'experimental', get_template_directory_uri() . '/css/experimental.css', array() );
    wp_enqueue_style( 'hlm-sports-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0' );
    wp_register_style( 'hlm-sports-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array() );
    wp_enqueue_style( 'hlm-sports-styles', get_stylesheet_uri(), array( 'hlm-sports-bootstrap' ), '1' );
  }
endif;
add_action('wp_enqueue_scripts', 'hlm_theme_styles');


if ( ! function_exists( 'hlm_theme_scripts' ) ) :
  function hlm_theme_scripts() {

    wp_enqueue_script( 'hlm-sports-bootstrap-tether', get_template_directory_uri() . '/js/tether.js', array( 'jquery' ) );
    wp_enqueue_script( 'hlm-sports-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ) );

  }
endif;
add_action('wp_enqueue_scripts', 'hlm_theme_scripts');







function experiment_1(){ 

    ?>


  <div class="container">
    <div class="row">
      <!--team-1-->
      <div class="col-lg-4">
        <div class="our-team-main">
          <div class="team-front">
            <img class="img-fluid" src="http://placehold.it/110x110/9c27b0/fff?text=Dilip">
            <h3>Dilip Kevat</h3>
            <p>Web Designer</p>
          </div>
          <div class="team-back">
            <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque.</span>
          </div>
        </div>
      </div><!--team-1-->
      <!--team-2-->
      <div class="col-lg-4">
        <div class="our-team-main">
          <div class="team-front">
            <img class="img-fluid" src="http://placehold.it/110x110/336699/fff?text=Dilip">
            <h3>Dilip Kevat</h3>
            <p>Web Designer</p>
          </div>
          <div class="team-back">
            <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque.</span>
          </div>
        </div>
      </div><!--team-2-->
      <!--team-3-->
      <div class="col-lg-4">
        <div class="our-team-main">
          <div class="team-front">
            <img class="img-fluid" src="http://placehold.it/110x110/607d8b/fff?text=Dilip">
            <h3>Dilip Kevat</h3>
            <p>Web Designer</p>
          </div>
          <div class="team-back">
            <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque.</span>
          </div>
        </div>
      </div><!--team-3-->
      <!--team-4-->
      <div class="col-lg-4">
        <div class="our-team-main">
          <div class="team-front">
            <img class="img-fluid" src="http://placehold.it/110x110/4caf50/fff?text=Dilip">
            <h3>Dilip Kevat</h3>
            <p>Web Designer</p>
          </div>
          <div class="team-back">
            <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque.</span>
          </div>
        </div>
      </div><!--team-4-->
      <!--team-5-->
      <div class="col-lg-4">
        <div class="our-team-main">
          <div class="team-front">
            <img class="img-fluid" src="http://placehold.it/110x110/e91e63/fff?text=Dilip">
            <h3>Dilip Kevat</h3>
            <p>Web Designer</p>
          </div>
          <div class="team-back">
            <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque.</span>
          </div>
        </div>
      </div><!--team-5-->
      <!--team-6-->
      <div class="col-lg-4">
        <div class="our-team-main">
          <div class="team-front">
            <img class="img-fluid" src="http://placehold.it/110x110/2196f3/fff?text=Dilip">
            <h3>Dilip Kevat</h3>
            <p>Web Designer</p>
          </div>
          <div class="team-back">
            <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque.</span>
          </div>
        </div>
      </div><!--team-6-->
    </div>
  </div>



<?php 
} 
add_shortcode('experiment_1','experiment_1');












function experiment_2(){ ?>
<section>
    <div class="container">
      <div class="row">
          <h1 class="text-center"><span>Bootstrap 4 Cards</span>Created with <i class="fa fa-heart"></i> from<a href="http://grafreez.com"> Grafreez.com</a></h1>

        <div class="col-md-4">
            <div class="card profile-card-1">
                <img src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb" alt="profile-sample1" class="background"/>
                <img src="https://randomuser.me/api/portraits/women/20.jpg" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>Savannah Fields<small>Engineer</small></h3>
                    <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                    </div>
                </div>
                <p class="mt-3 w-100 float-left text-center"><strong>Basic Profile Card</strong></p>
        </div>
      </div>
    </div>
</section>
<?php

}
add_shortcode('experiment_2','experiment_2');










function experiment_3(){
//https://www.templatemonster.com/demo/63853.html
//https://livedemo00.template-help.com/wt_63853_v1/index.html

 ?>
                <!-- Game Result Bug-->
                <article class="game-result">
                  <div class="game-info game-info-creative">
                    <h3 class="game-info-title"><?php echo get_the_title(); ?></h3>
                    <div class="game-info-main">
                      <div class="game-info-team game-info-team-first">
                        <figure>
                          <?php $home_team = get_term( get_field('home_team'), 'teams' ); 
                               $image = get_field('flag', $home_team);                            
                                  if( $image ) {?>
                                    <img src="<?php  echo $image['sizes']['hlm_sports_196x196']; ?>">                 
                                  <?php } ?>
                        </figure>
                        <div class="game-result-team-name">                      
                          <?php    ?>
                          <a href="<?php echo esc_url(get_term_link($home_team, 'teams')); ?>">
                            <?php echo $home_team->slug;   ?>       



                          </a>
                        </div>
                      </div>
                      <div class="game-info-middle game-info-middle-vertical">
                        <time class="time-big" ><span class="heading-3"><?php $myDateTime = get_field('start_time'); echo date('D d',$myDateTime);?></span> <?php echo date('F Y',$myDateTime);?>
                        <span class="heading-3"><?php echo date ('H:i',$myDateTime); ?></span>
                        </time>
                        <div class="game-result-divider-wrap"><span class="game-info-team-divider">VS</span></div>
                        <div class="group-sm">
                          <div class="button button-sm button-share-outline">Share
                            <ul class="game-info-share">
                              <li class="game-info-share-item"><a class="icon fa fa-facebook" href="#"></a></li>
                              <li class="game-info-share-item"><a class="icon fa fa-twitter" href="#"></a></li>
                              <li class="game-info-share-item"><a class="icon fa fa-google-plus" href="#"></a></li>
                              <li class="game-info-share-item"><a class="icon fa fa-instagram" href="#"></a></li>
                            </ul>
                          </div><a href="<?php the_permalink();?>" class="button button-sm button-primary" href="#">Bet Now</a>
                        </div>
                      </div>
                      <div class="game-info-team game-info-team-second">
                        <figure>
                                <?php
                                $away_team = get_term( get_field('away_team'), 'teams' );
                               $image = get_field('flag', $away_team);                            
                                  if( $image ) {?>
                                    <img src="<?php  echo $image['sizes']['hlm_sports_196x196']; ?>">                 
                                  <?php } ?>

                        </figure>
                          <?php   ?>
                          <a href="<?php echo esc_url(get_term_link($away_team, 'teams')); ?>">
                            <?php echo $away_team->slug;?>
                          </a>
                      </div>
                    </div>
                  </div>
                </article>




<?php

}
add_shortcode('experiment_3','experiment_3');



function experiment_4(){
  ?>
<div class="game-highlights">
                <ul class="game-highlights-list">
                  <li>
                    <p class="game-highlights-title">Start of the Match
                    </p><span class="game-highlights-minute">0’</span>
                  </li>
                  <li>
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-orange-dark fa fa-exclamation"></span>Foul by Martin Pierto
                    </p>
                    <p class="game-highlights-description">Martin Pierto showed sharp reflexes but failed to score for his team.</p><span class="game-highlights-minute">12’</span>
                  </li>
                  <li class="team-primary">
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-primary fa fa-futbol-o"></span><span class="game-highlights-goal">Goal</span> (1-0)
                    </p>
                    <p class="game-highlights-description">Franklin Stevens scored with the right foot. Assisted by David Hawkins.</p><span class="game-highlights-minute">18’</span>
                  </li>
                  <li class="team2-blue">
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-blue-boston fa fa-futbol-o"></span><span class="game-highlights-goal">Goal</span> (1-1)
                    </p>
                    <p class="game-highlights-description">atletico’s defender James Peterson turned Hernandez’s cross into his own net.</p><span class="game-highlights-minute">21’</span>
                  </li>
                  <li>
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-orange fa fa-file"></span>Yellow card
                    </p>
                    <p class="game-highlights-description">Ernesto Wilson got his first yellow card just before the first time ended.</p><span class="game-highlights-minute">28’</span>
                  </li>
                  <li>
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-primary fa fa-life-ring"></span>Attempt saved
                    </p>
                    <p class="game-highlights-description">Harry Stevenson saved Rob Wilson’s attempt to score a goal.</p><span class="game-highlights-minute">31’</span>
                  </li>
                  <li>
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-blue-boston fa fa-hand-o-right"></span>Penalty Kick
                    </p>
                    <p class="game-highlights-description">Performed by Sam Schmidt, this penalty kick marks the beginning of the 2nd time.</p><span class="game-highlights-minute">47’</span>
                  </li>
                  <li>
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-primary fa fa-flag"></span>Offside of Chris Balleron
                    </p>
                    <p class="game-highlights-description">Chris Balleron received offside warning for touching the passed ball.</p><span class="game-highlights-minute">60’</span>
                  </li>
                  <li>
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-red-2 fa fa-file"></span>Red card
                    </p>
                    <p class="game-highlights-description">The referee showed red card to Joe Perkins on the 74th minute of the match.</p><span class="game-highlights-minute">74’</span>
                  </li>
                  <li>
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-primary fa fa-exchange"></span>Gary Cahill <span class="text-gray-500">for</span> jack windsor
                    </p>
                    <p class="game-highlights-description">Atletico replaces their first forward with Jack Windsor before the 2nd time ends.</p><span class="game-highlights-minute">86’</span>
                  </li>
                  <li>
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-blue-boston fa fa-clock-o"></span>The referee adds 4 minutes 
                    </p>
                    <p class="game-highlights-description">The referee adds 4 minutes to the second time to compensate goal celebration time.</p><span class="game-highlights-minute">89’</span>
                  </li>
                  <li>
                    <p class="game-highlights-title"><span class="icon icon-xxs icon-primary fa fa-flag-checkered"></span>End of the game
                    </p>
                    <p class="game-highlights-description">4 minutes later the referee announces the end of the game with a draw as a result.</p><span class="game-highlights-minute">94’</span>
                  </li>
                </ul>
              </div>

<?php

}
add_shortcode('experiment_4','experiment_4');







function experiment_5(){
  ?>

<style>
*, *::before, *::after {
  box-sizing: border-box;
}
.heading-component + * {
  margin-top: 25px;
}
.promo-creative {
  text-align: center;
  font-size: 12px;
  font-weight: 500;
  letter-spacing: 0.05em;
  text-transform: uppercase;
}
/* @media all and (min-width:420px) */
.promo-creative, .promo {
  font-size: 14px;
}
/* @media all and (min-width:768px) */
.promo-creative {
  text-align: center;
}
.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
/* @media all and (min-width:576px) */
.container {
  max-width: 540px;
}
/* @media all and (min-width:768px) */
.container {
  max-width: 720px;
}
/* @media all and (min-width:992px) */
.container {
  max-width: 960px;
}
/* @media all and (min-width:1200px) */
.container {
  max-width: 1140px;
}
article, aside, dialog, figcaption, figure, footer, header, hgroup, main, nav, section {
  display: block;
}
.section-sm, .section-md, .section-lg, .section-xl {
  padding: 50px 0;
}
/* @media all and (min-width:768px) */
.section-sm {
  padding: 60px 0;
}
.bg-gray-100 {
  background-color: #edeff4;
}
.bg-gray-100 + .bg-gray-100 {
  padding-top: 0px;
}
.page {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  opacity: 0;
}
.animated {
  animation-duration: 1s;
  animation-fill-mode: both;
  opacity: 1;
}
body {
  margin: 0;
  font-family: "Roboto",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.7142;
  color: #9b9b9b;
  text-align: left;
  background-color: #fff;
}
body {
  display: block;
  font-family: "Roboto",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
  font-size: 14px;
  line-height: 1.7142;
  font-weight: 400;
  letter-spacing: 0.02em;
  color: #9b9b9b;
  background-color: #fff;
  -webkit-text-size-adjust: none;
  -webkit-font-smoothing: subpixel-antialiased;
}
html {
  font-family: sans-serif;
  line-height: 1.15;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -ms-overflow-style: scrollbar;
  -webkit-tap-highlight-color: transparent;
}
:root {
  --blue:  #007bff;
  --indigo:  #6610f2;
  --purple:  #6f42c1;
  --pink:  #e83e8c;
  --red:  #dc3545;
  --orange:  #fd7e14;
  --yellow:  #ffc107;
  --green:  #28a745;
  --teal:  #20c997;
  --cyan:  #17a2b8;
  --white:  #fff;
  --gray:  #868e96;
  --gray-dark:  #343a40;
  --breakpoint-xs:  0;
  --breakpoint-sm:  576px;
  --breakpoint-md:  768px;
  --breakpoint-lg:  992px;
  --breakpoint-xl:  1200px;
  --breakpoint-xxl:  1600px;
  --font-family-sans-serif:  "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  --font-family-monospace:  Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
}
.align-items-center {
  align-items: center !important;
}
/* @media all and (min-width:768px) */
.align-items-md-stretch {
  align-items: stretch !important;
}
.unit {
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -ms-flex: 0 1 100%;
  -webkit-flex: 0 1 100%;
  flex: 0 1 100%;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
}
.unit, .unit-vertical {
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  margin-bottom: -30px;
  margin-left: -20px;
}
/* @media all and (min-width:768px) */
.unit-md-horizontal {
  -webkit-flex-direction: row;
  -ms-flex-direction: row;
  flex-direction: row;
}
.unit-spacing-lg .unit {
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -ms-flex: 0 1 100%;
  -webkit-flex: 0 1 100%;
  flex: 0 1 100%;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
}
.unit-spacing-lg .unit, .unit-spacing-lg .unit-vertical {
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  margin-bottom: -30px;
  margin-left: -30px;
}
/* @media all and (min-width:768px) */
.unit-spacing-lg .unit-md-horizontal {
  -webkit-flex-direction: row;
  -ms-flex-direction: row;
  flex-direction: row;
}
.unit-body {
  -ms-flex: 0 1 auto;
  -webkit-flex: 0 1 auto;
  flex: 0 1 auto;
}
.unit-left, .unit-right {
  -ms-flex: 0 0 auto;
  -webkit-flex: 0 0 auto;
  flex: 0 0 auto;
  max-width: 100%;
}
.unit > *, .unit-vertical > * {
  display: inline-block;
  margin-top: 0px;
  margin-bottom: 30px;
  margin-left: 20px;
}
.unit-spacing-lg .unit-body {
  -ms-flex: 0 1 auto;
  -webkit-flex: 0 1 auto;
  flex: 0 1 auto;
}
.unit-spacing-lg .unit-left, .unit-spacing-lg .unit-right {
  -ms-flex: 0 0 auto;
  -webkit-flex: 0 0 auto;
  flex: 0 0 auto;
  max-width: 100%;
}
.unit-spacing-lg .unit > *, .unit-spacing-lg .unit-vertical > * {
  display: inline-block;
  margin-top: 0px;
  margin-bottom: 30px;
  margin-left: 30px;
}
.promo-creative .unit-body {
  display: flex;
  flex-direction: column;
  flex-basis: 30%;
  max-width: 357px;
}
/* @media all and (min-width:768px) */
.promo-creative .unit-body {
  max-width: 100%;
}
/* @media all and (min-width:1200px) */
.promo-creative .unit-body {
  flex-direction: row;
  flex-basis: auto;
}
.promo-creative .unit-right {
  flex-grow: 1;
  flex-basis: 55%;
}
.promo-creative-details {
  position: relative;
  padding: 24px 15px;
  min-height: 100%;
  background: #fff;
  border: 1px solid #e1e1e1;
}
/* @media all and (min-width:576px) */
.promo-creative-details {
  padding-left: 30px;
  padding-right: 30px;
}
/* @media all and (min-width:1200px) */
.promo-creative-details {
  padding-left: 40px;
  padding-right: 40px;
}
h1, h2, h3, h4, h5, h6 {
  margin-top: 0px;
  margin-bottom: 0.5rem;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
  margin-bottom: 0.5rem;
  font-weight: 500;
  line-height: 1.1;
  color: #151515;
}
h3, .h3 {
  font-size: 33px;
}
h1, h2, h3, h4, h5, h6, [class*='heading-'] {
  margin-top: 0px;
  margin-bottom: 0px;
  font-weight: 500;
  letter-spacing: 0.05em;
  color: #151515;
  text-transform: uppercase;
}
h3, .heading-3 {
  font-size: 24px;
  line-height: 1.5;
}
/* @media all and (min-width:1200px) */
h3, .heading-3 {
  font-size: 33px;
  line-height: 1.3333;
}
.promo-creative-title {
  line-height: 1.1;
}
p {
  margin-top: 0px;
  margin-bottom: 1rem;
}
p {
  margin: 0;
}
* + p {
  margin-top: 15px;
}
* + .promo-creative-location {
  margin-top: 3px;
}
* + .promo-creative-countdown {
  margin-top: 15px;
}
.promo-main {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.promo-creative-main {
  max-width: 488px;
}
* + .promo-creative-main {
      margin: 0 auto;
  margin-top: 20px;
}
.promo-creative-tickets {
  margin-bottom: -10px;
  margin-left: -10px;
}
* + .promo-creative-tickets {
  margin-top: 18px;
}
.text-nowrap {
  white-space: nowrap !important;
}
.promo-creative-tickets > * {
  display: inline-block;
  margin-top: 0px;
  margin-bottom: 10px;
  margin-left: 10px;
}
.promo-creative-tickets > * {
  vertical-align: middle;
}
.promo-buttons {
  position: relative;
  display: inline-block;
}
.promo-creative-tickets-description {
  font-family: "Roboto",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
  font-weight: 400;
  color: #151515;
  text-transform: capitalize;
}
/* @media all and (min-width:992px) */
.promo-creative-tickets-description {
  margin-left: 13px;
}
/* @media all and (min-width:992px) */
.promo-buttons + p {
  margin-top: 0px;
}
.promo-creative-tickets-number {
  display: inline-block;
  text-align: center;
  margin: 0 3px;
  width: 29px;
  height: 29px;
  line-height: 29px;
  font-weight: 500;
  color: #fff;
  background-color: #35ad79;
  border-radius: 50%;
}
.button {
  position: relative;
  overflow: hidden;
  display: inline-block;
  padding: 14px 32px;
  font-size: 14px;
  line-height: 1.25;
  border: 2px solid;
  font-weight: 500;
  letter-spacing: 0.02em;
  text-transform: uppercase;
  white-space: nowrap;
  text-overflow: ellipsis;
  text-align: center;
  cursor: pointer;
  vertical-align: middle;
  user-select: none;
  border-radius: 4px;
  transition: .3s ease-out all;
}
.promo-buttons > * {
  display: inline-block;
  vertical-align: middle;
}
.promo-button {
  display: inline-block;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  color: #151515;
  background-color: #fcef57;
  border-radius: 3px;
  cursor: pointer;
}
.fl-bigmug-line-ico, [class^='fl-bigmug-line-']::before, [class*=' fl-bigmug-line-']::before, [class^='fl-bigmug-line-']::after, [class*=' fl-bigmug-line-']::after {
  font-family: "fl-bigmug-line";
  font-size: inherit;
  font-weight: 400;
  font-style: normal;
}
a {
  color: #007bff;
  text-decoration: none;
  background-color: transparent;
  -webkit-text-decoration-skip: objects;
}
a, area, button, [role='button'], input:not([type='range']), label, select, summary, textarea {
  touch-action: manipulation;
}
a {
  transition: all 0.3s ease-in-out;
}
a, a:focus, a:active, a:hover {
  text-decoration: none;
}
a, a:focus, a:active {
  color: #35ad79;
}
* + .button {
  margin-top: 30px;
}
html .button-primary, html .button-primary:focus {
  color: #fff;
  background-color: #35ad79;
  border-color: #35ad79;
}
.promo-creative-tickets * + .button {
  margin-top: 0px;
}
.promo-buttons .button {
  min-width: 194px;
  letter-spacing: 0.1em;
}
.promo-button + .button {
  margin-top: 0px;
  margin-left: 10px;
}
ol, ul, dl {
  margin-top: 0px;
  margin-bottom: 1rem;
}
ul, ol {
  list-style: none;
  padding: 0;
  margin: 0;
}
.promo-share-list {
  position: absolute;
  top: 0px;
  bottom: 0px;
  left: 40px;
  right: 0px;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  padding: 5px 20px 5px 5px;
  background-color: #fcef57;
  border-radius: 3px;
  opacity: 0;
  visibility: hidden;
  transform-origin: 0px 0px 0px;
  cursor: auto;
  transition: .3s ease-out all;
  transition-delay: 0.2s;
  z-index: 1;
}
ul li, ol li {
  display: block;
}
.promo-share-item {
  
  font-size: 12px;
  line-height: 1;
  font-weight: 500;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  color: #151515;
  transform: translateX(-5px);
  opacity: 0;
  visibility: hidden;
  transition: .3s ease-out all;
  transition-delay: 0.4s;
}
:first-child.promo-share-item {
  margin-right: 12px;
}
.fa {
  display: inline-block;
  font-family: "FontAwesome";
  font-size: inherit;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.mdi {
  display: inline-block;
  font: normal normal normal 24px/1 "Material Design Icons";
  font-size: inherit;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  transform: translate(0px, 0px);
}
.icon {
  display: inline-block;
  line-height: 1;
}
.promo-share-item .icon {
  font-size: 15px;
  transition: .3s ease-out all;
}
.promo-share-item .icon, .promo-share-item .icon:focus, .promo-share-item .icon:active {
  color: #151515;
}
.promo-team {
  line-height: 1.2;
  flex-grow: 1;
}
.promo-creative-team {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 90px;
  border: 1px solid #d7d7d7;
}
/* @media all and (min-width:576px) */
.promo-creative-team {
  flex-direction: row;
  height: 74px;
}
.promo-creative-middle {
  text-align: center;
  font-size: 14px;
  letter-spacing: 0.1em;
  color: #151515;
  min-width: 54px;
}
figure {
  margin: 0 0 1rem;
}
figure {
  margin-bottom: 0px;
}
.promo-team-title {
  margin-top: 6px;
}
/* @media all and (min-width:576px) */
.promo-team-title {
  margin-top: 0px;
  margin-left: 10px;
}
.promo-team-name {
  color: #151515;
}
.promo-team-country {
  font-size: 0.86em;
}
img {
  vertical-align: middle;
  border-style: none;
}
img {
  display: inline-block;
  max-width: 100%;
  height: auto;
}
.countdown-bordered {
  display: inline-block;
  white-space: nowrap;
  margin-left: -14px;
  margin-right: -16px;
  font-size: 16px;
  line-height: 1;
  font-weight: 500;
  letter-spacing: 0.05em;
  text-transform: uppercase;
}
/* @media all and (min-width:992px) */
.countdown-bordered {
  margin-left: -20px;
  margin-right: -22px;
  font-size: 18px;
}
.countdown-bordered .countdown-section {
  display: inline-block;
  padding: 0 16px 0 10px;
  text-align: center;
}
/* @media all and (min-width:992px) */
.countdown-bordered .countdown-section {
  padding: 0 22px 0 16px;
}
.countdown-bordered :not(:first-child).countdown-section {
  border-left: 1px solid #c6c6c6;
}
.countdown-bordered .countdown-amount, .countdown-bordered .countdown-period {
  display: block;
}
.countdown-bordered .countdown-amount {
  color: #151515;
  min-width: 30px;
  padding-right: 8px;
}
/* @media all and (min-width:576px) */
.countdown-bordered .countdown-amount, .countdown-bordered .countdown-period {
  display: inline-block;
}
/* @media all and (min-width:992px) */
.countdown-bordered .countdown-amount {
  min-width: 34px;
}
.icon-gray-800 {
  color: #151515;
}
.promo-creative-location .icon {
  font-size: 14px;
  margin-right: 5px;
}
.promo-creative-meta {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
/* @media all and (min-width:1200px) */
.promo-creative-meta {
  flex-direction: column;
  justify-content: flex-start;
}
.promo-creative-figure {
  margin-top: 10px;
}
/* @media all and (min-width:1200px) */
.promo-creative-figure {
  margin-left: 27px;
  margin-top: 0px;
}
.promo-creative-meta-description {
  margin-left: 7px;
  color: #151515;
}
/* @media all and (min-width:1200px) */
.promo-creative-meta-description {
  margin-top: 10px;
}
.promo-creative-meta-description > * {
  display: block;
}
.promo-creative-meta-description > * {
  line-height: 1.3;
}
html .page .text-primary {
  color: #35ad79;
}
h1, .heading-1 {
  font-size: 32px;
  line-height: 1.3;
}
/* @media all and (min-width:768px) */
h1, .heading-1 {
  font-size: 40px;
  line-height: 1.15;
}
/* @media all and (min-width:1200px) */
h1, .heading-1 {
  font-size: 60px;
  line-height: 1.1666;
}
/* @media all and (min-width:1200px) */
h5, .heading-5 {
  font-size: 18px;
  line-height: 1.2222;
}
.promo-creative-time > * {
  line-height: 1;
}
h4, .heading-4, h5, .heading-5, h6, .heading-6 {
  letter-spacing: 0.02em;
}
h5, .heading-5 {
  font-size: 18px;
  line-height: 1.35;
}
.promo-creative-time span + span {
  margin-left: -3px;
}
</style>
<section class="section section-sm bg-gray-100"><div class="container"><div class="promo-creative unit-spacing-lg">
            <div class="unit unit-md-horizontal align-items-center align-items-md-stretch">
              <div class="unit-right">
                <div class="promo-creative-details">
                  <div class="promo-creative-countdown">
                      <p class="game-info-subtitle">
                        <time> 
                          <?php $myDateTime = get_field('start_time'); 
                          echo date ('F d, Y H : i',$myDateTime); ?>                  
                        </time>
                      </p>
                  </div>
                  <div class="promo-main promo-creative-main">
                    <div class="promo-team promo-creative-team">
                      <div class="promo-team-title">
                        <div class="promo-team-name">     
                          <?php  $home_team = get_term( get_field('home_team'), 'teams' );  ?>
                          <a href="<?php echo esc_url(get_term_link($home_team, 'teams')); ?>">
                            <?php echo $home_team->slug;?>
                          </a>
                        </div>
                      </div>
                      <figure class="promo-team-figure">                                <?php
                          $home_team = get_term( get_field('home_team'), 'teams' );
                         $image = get_field('flag', $home_team);                            
                            if( $image ) {?>
                              <img src="<?php  echo $image['sizes']['hlm_sports_40x40']; ?>">                 
                            <?php } ?>
                      </figure>
                    </div>
                    <div class="promo-creative-middle">VS</div>
                    <div class="promo-team promo-creative-team">
                      <figure class="promo-team-figure">                                <?php
                                $away_team = get_term( get_field('away_team'), 'teams' );
                               $image = get_field('flag', $away_team);                            
                                  if( $image ) {?>
                                    <img src="<?php  echo $image['sizes']['hlm_sports_40x40']; ?>">                 
                                  <?php } ?>
                      </figure>
                      <div class="promo-team-title">
                        <div class="promo-team-name">
                          <?php  $away_team = get_term( get_field('away_team'), 'teams' );  ?>
                          <a href="<?php echo esc_url(get_term_link($away_team, 'teams')); ?>">
                            <?php echo $away_team->slug;?>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="promo-creative-tickets">
                    <div class="promo-buttons text-nowrap">
                      <a class="button button-primary" href="<?php the_permalink();?>">Check Game Odds</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div></div></section>




<?php

}
add_shortcode('experiment_5','experiment_5');