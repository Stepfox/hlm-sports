<?php   


add_action( 'widgets_init', 'hlm_sports_232x310' );

function hlm_sports_232x310() {register_widget( 'hlm_sports_232x310_widget' );}

class hlm_sports_232x310_widget extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'top_5_reviews_hlm_sports', // Widget ID
			esc_html__('Top 5 Reviews widget', 'hlm-sports'), // Name
			array( 'description' => '', ) // Args
			);}
		
		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		

		$widget_id = $this->id;
		//$title = get_field( 'title', 'widget_' . $widget_id );

		$defaults = array( 'title' => 'Top 5 Reviews widget', 'rank_list' => 'all');
		$instance = wp_parse_args( (array) $instance, $defaults );
		

		$title = $instance['title'];
				
        echo $args['before_widget'];

        if ( ! empty( $title ) ){
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }
        ?>

<div class="top-5-reviews">



<ul>
<?php

// check if the flexible content field has rows of data
if( have_rows('top_5_list', 'widget_' . $widget_id ) ):
$count = 1;
     // loop through the rows of data
    while ( have_rows('top_5_list', 'widget_' . $widget_id ) ) : the_row();

    		$bookmaker_id = get_sub_field('bookmaker', 'widget_' . $widget_id );
?>

	<li>
		<div class="top-5-logo-wrap">
			<div class="top-5-position-number">
				<?php echo '#';echo $count;$count++;?>
			</div>
			<div class="top-5-logo">		 
				 <?php $image = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image ) {?>
							<img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="">  							 
						<?php } ?>											
			</div>
		</div>
		<div class="top-5-review-image-wrap">
			<div class="top-5-review-image"> 
		<?php 
				$review_id = get_field( 'review_pick', $bookmaker_id );
				$review_img_url = get_the_post_thumbnail_url( $review_id, 'hlm_sports_232x310' ); 
				
				 ?>
				 <img src="<?php   echo $review_img_url; ?>" alt="">
			</div>
		
			<div class="top-5-review-content-wrap">
				<div class="top-5-bookmaker-title">
					<?php echo get_the_title( $bookmaker_id );?>
				</div>
				<div class="top-5-bonus">
					<?php echo the_sub_field('bonus', 'widget_' . $widget_id );	?>
				</div>
				<div class="top-5-star-rating">
						<?php hlm_sports_get_star_rating(get_field('overall_rating', $bookmaker_id));?>
				</div>
				<div class="top-5-review-link">
					<a href="<?php echo get_permalink( $bookmaker_id); ?>">
						review
					</a>
				</div>
				<a href="<?php echo the_field( 'default_tracker', $bookmaker_id); ?>" target="_blank">
					<div class="top-5-review-bet-now">
                   		Bet Now
					</div>
               	</a>
				<div class="top-5-rules-link">
					T&C Apply
				</div>
			</div>
		</div>
	</li>

<?php 

    endwhile;

else :

    echo 'go to widget setup and setup the widget...';

endif;

?>


</ul>

</div>









<?php
		/* After widget. */
		
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags. */
		
		$instance['title'] = $new_instance['title'];
			
		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Top 5 Reviews widget');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'hlm-sports'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>

<?php }

} ?>