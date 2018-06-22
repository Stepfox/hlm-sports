<?php get_header();?>






<main id="main" class="category-page">
  <div class="three-parts post-page-area hlm-sports-widget">
        <div class="post-content widget">

          <div class="post-title">
            <h1>
        <?php
          the_archive_title( '<h1 class="page-title">', '</h1>' );
          the_archive_description( '<div class="taxonomy-description">', '</div>' );
        
          $term = get_queried_object();

         $image = get_field('flag', $term);                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_40x40']; ?>" alt="" class="bookmaker-background-wrap-<?php echo $bookmaker_id; ?>">                 
            <?php }     

          ?>
            </h1>
          </div>


  <ul>
        <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
             ?>               
        <li>          

            <?php experiment_5(); ?>

        </li>
        <?php 
        endwhile;
        //pagination
        
      else :
        ?><p><?php _e( 'Sorry, no posts matched your criteria.', 'hlm-sports' ); ?></p><?php
      endif;
    ?>
  </ul>

<style>
*, *::before, *::after {
  box-sizing: border-box;
}
.heading-component + * {
  margin-top: 25px;
}
* + .table-custom-responsive {
  margin-top: 25px;
}
.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col, .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm, .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md, .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg, .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl, .col-xl-auto, .col-xxl-1, .col-xxl-2, .col-xxl-3, .col-xxl-4, .col-xxl-5, .col-xxl-6, .col-xxl-7, .col-xxl-8, .col-xxl-9, .col-xxl-10, .col-xxl-11, .col-xxl-12, .col-xxl, .col-xxl-auto {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}
/* @media all and (min-width:992px) */
.col-lg-6 {
  flex: 0 0 50%;
  max-width: 50%;
}
/* @media all and (min-width:1200px) */
.col-xl-4 {
  flex: 0 0 33.33333%;
  max-width: 33.33%;
}
.row-50 > * {
  margin-bottom: 50px;
}
.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}
.row-50 {
  margin-bottom: -50px;
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
/* @media all and (min-width:1600px) */
.container {
  max-width: 1200px;
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
table {
  border-collapse: collapse;
}
.table-custom {
  width: 100%;
  text-align: center;
  font-family: "Kanit",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
  text-transform: uppercase;
  line-height: 1.2;
  border-collapse: collapse;
  border: 1px solid #ddd;
  background: #fff;
}
.table-standings {
  font-size: 14px;
  letter-spacing: 0.1em;
}
.table-standings tr {
  transition: all 200ms ease-in-out;
}
.table-standings tr + tr {
  border-top: 1px solid #ddd;
}
.player-inline, .team-inline {
  display: flex;
  align-items: center;
}
.table-standings td {
  padding: 5px;

  font-weight: 400;
  color: #151515;
}
.table-standings tbody td:first-child {
  width: 11%;
  padding-left: 20px;
  font-size: 16px;
}
.table-modern tbody td:first-child {
  width: 18%;
}
.table-standings td:nth-child(n+3) {
  width: 14%;
}
.player-title, .team-title {
  text-align: left;
  line-height: 1.15;
  font-weight: 500;
  letter-spacing: 0.05em;
}
.player-title {
  margin-left: 4px;
}
.player-country, .team-country {
  font-size: 12px;
  color: #9b9b9b;
}
.table-counter {
  position: relative;
  display: inline-block;
  text-align: center;
  width: 38px;
  height: 29px;
  line-height: 29px;
  z-index: 1;
  transition: all 200ms ease-in-out;
}
.table-modern tr:hover {
  background: #f5f7f9;
}
th {
  text-align: inherit;
}
.table-standings th {
  padding: 12px 10px;
  text-align: center;
  font-weight: 500;
  color: #fff;
  background: #35ad79;
}
.table-standings th:first-child {
  text-align: left;
}
.table-standings thead th:first-child {
  padding-left: 22px;
}
.table-standings tr, .table-standings tr:nth-child(odd) td{background: #FFF;}
</style>

<div class="table-custom-responsive">
                <table class="table-custom table-standings table-modern">
                  <thead>
                    <tr>
                      <th>Number</th>
                      <th>Player Name</th>
                      <th>Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="table-counter">1</span></td>
                      <td class="player-inline">
                        <div class="player-title">
                          <div class="player-name">S. Lavery-Spahr</div>
                        </div>
                      </td>
                      <td>21</td>
                    </tr>
                    <tr>
                      <td><span class="table-counter">2</span></td>
                      <td class="player-inline">
                        <div class="player-title">
                          <div class="player-name">P. Bohn III</div>
                        </div>
                      </td>
                      <td>20</td>
                    </tr>

                  </tbody>
                </table>
              </div>
      </div>
  </div>

  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>

</main>










<?php get_footer(); ?>