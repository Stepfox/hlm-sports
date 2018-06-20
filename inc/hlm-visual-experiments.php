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


<div class="main-component">
                <!-- Game Result Bug-->
                <article class="game-result">
                  <div class="game-info game-info-creative">
                    <p class="game-info-subtitle">Real Stadium - 
                      <time datetime="08:30"> 08:30 PM</time>
                    </p>
                    <h3 class="game-info-title">Champions league semi-final 2018</h3>
                    <div class="game-info-main">
                      <div class="game-info-team game-info-team-first">
                        <figure><img src="https://livedemo00.template-help.com/wt_63853_v1/theme/images/team-atletico-100x100.png" alt="" width="100" height="100">
                        </figure>
                        <div class="game-result-team-name">Atletico</div>
                        <div class="game-result-team-country">Italy</div>
                      </div>
                      <div class="game-info-middle game-info-middle-vertical">
                        <time class="time-big" datetime="2018-04-17"><span class="heading-3">Fri 19</span> May 2018
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
                          </div><a class="button button-sm button-primary" href="#">Buy tickets</a>
                        </div>
                      </div>
                      <div class="game-info-team game-info-team-second">
                        <figure><img src="https://livedemo00.template-help.com/wt_63853_v1/theme/images/team-bavaria-fc-113x106.png" alt="" width="113" height="106">
                        </figure>
                        <div class="game-result-team-name">Celta Vigo</div>
                        <div class="game-result-team-country">Spain</div>
                      </div>
                    </div>
                  </div>
                  <div class="game-info-countdown">
                    <div class="countdown countdown-bordered is-countdown" data-type="until" data-time="31 Dec 2018 16:00" data-format="dhms" data-style="short"><span class="countdown-row countdown-show4"><span class="countdown-section"><span class="countdown-amount">194</span><span class="countdown-period">Days</span></span><span class="countdown-section"><span class="countdown-amount">6</span><span class="countdown-period">Hrs</span></span><span class="countdown-section"><span class="countdown-amount">45</span><span class="countdown-period">Mins</span></span><span class="countdown-section"><span class="countdown-amount">23</span><span class="countdown-period">Secs</span></span></span></div>
                  </div>
                </article>
              </div>


<?php

}
add_shortcode('experiment_3','experiment_3');





?>