<?php
/* 
Plugin Name: Slider 
Description: Slider by selecting categories.
Version: 1.0 
Author: Stefan Naumovski 
*/    
add_action( 'widgets_init', 'slider_widget' );

function slider_widget() {register_widget( 'slider_exm1' );}

class slider_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */

	function __construct() {
		parent::__construct(
				'slider_widget_exm1', 	//Widget ID
				__('Slider', 'examiner'), // Name
				array( 'description' => '', ) // Args
		);}
		
		/* Front-end display of widget. */
		
		public function widget( $args, $instance ) {
			
			$defaults = array( 'title' => 'Image Slider', 'number' => 3, 'slider_control' => 'on', 'widget_size' => 'one-part', 'categories' => 0, 'subtitle'=>'on');
			$instance = wp_parse_args( (array) $instance, $defaults );
			
			
			$title = $instance['title'];
			$number = $instance['number'];
			$categories = $instance['categories'];
			$slider_control = $instance['slider_control'];		
			$widget_size = $instance['widget_size'];
			$subtitle = $instance['subtitle'];
			
		
		$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget '. esc_attr($widget_size) , $args['before_widget']);		
			echo $args['before_widget'];
			if ( ! empty( $title ) ){
				echo $args['before_title'];		
					if($categories != 0){echo '<a href='.esc_url(get_category_link( $categories )).'>';}		
				echo esc_html($title); 			
					if($categories != 0){echo '</a>';}
				echo $args['after_title'];}
			?>

<div class="slider-container">
	<div class="wide-slider <?php echo esc_attr(get_option('exm1_slider_picker'));?>">
		<ul class="slides">
			<?php if($slider_control == 'on'){$number = '5';}
			$exm1_posts = new WP_Query(array( 'cat' => $categories, 'posts_per_page' => $number)); while($exm1_posts->have_posts()) : $exm1_posts->the_post();?>
			<li <?php post_class((is_sticky()?'sticky':'')); ?>>
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php if( $widget_size == 'one-part' ) {the_post_thumbnail('image-featured');} elseif( $widget_size == 'two-parts' ){the_post_thumbnail('slider-two');} elseif ( $widget_size == 'three-parts' ){the_post_thumbnail('slider-three');}elseif ( $widget_size == 'four-parts' ){the_post_thumbnail('slider-four');} ?>
				</a>
				<?php } ?>
				<div class="slider-text-box">
					<div class="slide-date">
						<?php echo esc_html(get_the_date()); ?>
					</div>
					<!--slide-date-->
					<div class="slide-title">
						<h2>
							<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
							</a>
						</h2>
					</div>
					<!--slide-title-->
					<?php if($subtitle) { ?>
					<div class="slide-excerpt-wrap">
						<div class="slide-excerpt">
							<?php  $exm1_subtitle = get_post_meta(get_the_ID(), 'exm1_sub_title', true); if(empty($exm1_subtitle)) { echo excerpt(22); }  else { echo esc_html($exm1_subtitle);}  ?>
						</div>
					</div>
					<?php } ?>
				</div>
				<!--slider-text-box-->
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
	<!--flexslider-->
</div>
<!--slider-container-->
<?php if($slider_control == 'on'){ ?>
<div class="wide-slider-control">
	<ul>
		<?php $exm1_posts = new WP_Query(array( 'cat' => $categories, 'posts_per_page' => '5')); while($exm1_posts->have_posts()) : $exm1_posts->the_post();?>
		<li <?php post_class((is_sticky()?'sticky':'')); ?>>
			<div class="wide-slider-thumb">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="#" title="<?php the_title(); ?>">
				<?php if( $widget_size == 'one-part' ) {the_post_thumbnail('image-featured');} elseif( $widget_size == 'two-parts' ){the_post_thumbnail('slider-two');} elseif ( $widget_size == 'three-parts' ){the_post_thumbnail('slider-three');}elseif ( $widget_size == 'four-parts' ){the_post_thumbnail('slider-four');} ?>
				</a>
				<?php } ?>
			</div>
			<!---wide-slider-thumb-->
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<!--wide-slider-control-->
<?php } ?>
<?php	
	/* After widget. */	
				
		echo $args['after_widget'];
	}
	
	/* Widget settings. */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;	
		
		/* Strip tags. */
					
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['categories'] = $new_instance['categories'];
		$instance['slider_control'] = $new_instance['slider_control'];	
		$instance['widget_size'] = $new_instance['widget_size'];
		$instance['subtitle'] = $new_instance['subtitle'];	
		return $instance;
	}		
	
		/* Default widget settings. */
		
	function form( $instance ) {	
		$defaults = array( 'title' => 'Image Slider', 'number' => 3, 'slider_control' => 'on', 'widget_size' => 'one-part', 'categories' => 0, 'subtitle'=>'on');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>

<!-- widget_size -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'widget_size' )); ?>">
		<?php _e('Widget size:', 'examiner'); ?>
	</label>
	<br>
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="one-part" <?php checked('one-part', $instance['widget_size']); ?> class="one-part"/>
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="two-parts" <?php checked('two-parts', $instance['widget_size']); ?> class="two-parts" />
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="three-parts" <?php checked('three-parts', $instance['widget_size']); ?> class="three-parts"/>
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="four-parts" <?php checked('four-parts', $instance['widget_size']); ?> class="four-parts"/>
</p>

<!-- Number of posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
		<?php _e('Number of slides:', 'examiner'); ?>
	</label>
	<input type="number" min="1" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
</p>

<!-- Category -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>">
		<?php _e('(Optional)Select Category:', 'examiner'); ?>
	</label>
	<select id="<?php echo esc_attr($this->get_field_id('categories')); ?>" name="<?php echo esc_attr($this->get_field_name('categories')); ?>" style="width:100%;">
		<option value='all' <?php if ('all' == (isset($instance['categories']))) echo 'selected="selected"'; ?>>
		<?php _e('All Categories', 'examiner'); ?>
		</option>
		<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
		<?php foreach($categories as $category) { ?>
		<option value='<?php echo esc_attr($category->term_id); ?>' <?php if(isset($instance['categories'])){ if ($category->term_id == $instance['categories']) echo 'selected="selected"';}?>>
		<?php echo esc_html($category->cat_name); ?>
		</option>
		<?php } ?>
	</select>
</p>

<!--slider_control-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'slider_control' )); ?>">
		<?php _e('Show control thumbs:', 'examiner');?>
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'slider_control' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'slider_control' )); ?>" <?php checked( (bool) $instance['slider_control'], true ); ?> />
</p>

<!--Subtitle-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'subtitle' )); ?>">
		<?php _e('Show Subtitle:', 'examiner');?>
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'subtitle' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'subtitle' )); ?>" <?php checked( (bool) $instance['subtitle'], true ); ?> />
</p>

<?php }} ?>