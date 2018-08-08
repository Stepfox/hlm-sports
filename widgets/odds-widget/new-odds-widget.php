<?php   

/* 
Author: Stefan Naumovski 
*/    



add_action( 'widgets_init', 'odds_widget1' );

function odds_widget1() {register_widget( 'odds_widget1_hlm_sports' );}

class odds_widget1_hlm_sports extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'hlm_sports_odds1', // Widget ID
			esc_html__('New Odds Widget', 'hlm-sports'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true ) // Args
			);

		    if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
		            add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
		        }

	}


	    public function widget_enqueue_scripts() {
			wp_enqueue_script('odds_widget1_scripts', get_stylesheet_directory_uri() . '/widgets/odds-widget/odds-widget.js');
			
	    }

		
		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Odds widget',  'categories' => '0' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$categories = $instance['categories'];


        echo $args['before_widget'];

        if ( ! empty( $title ) ){
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

			include( locate_template( 'widgets/odds-widget/newlooks5.php', false, false ) );   


		/* After widget. */
		
		echo $args['after_widget'];
	}
	
		/* Widget settings. */
		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags. */
		
		$instance['title'] = $new_instance['title'];
		$instance['categories'] = $new_instance['categories'];

		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Odds widget', 'categories' => '0' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'hlm-sports'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>

<p>
	<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php _e('Match:', 'hlm-sports');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('categories')); ?>" id="<?php echo esc_attr($this->get_field_id('categories')); ?>" class="widefat" >
<?php
global $post;
$args = array( 'post_type'=> 'match' ,'numberposts' => -1);
$posts = get_posts($args);
foreach( $posts as $post ) : setup_postdata($post); ?>
	<option value="<?php echo $post->ID; ?>"  <?php if ($post->ID == $instance['categories']) echo 'selected="selected"'; ?>><?php the_title(); ?></option>
<?php endforeach; ?>
	</select>





</p>






<?php






 }} ?>