<?php   
/* 
Plugin Name: Featured Categories
Description: Featured Categories posts from 3 diferenet categories.
Version: 1.0 
Author: Stefan Naumovski 
*/    
add_action( 'widgets_init', 'featured_category_list_widget' );

function featured_category_list_widget() {register_widget( 'featured_category_list_exm1' );}

class featured_category_list_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'featured_list_posts_exm1', //Widget ID
			__('Featured Categories and links', 'examiner'), //Name
			array( 'description' => '', ) //Args
		);}
		
		/* Front-end display of widget. */
		
		public function widget( $args, $instance ) {
			/* Default widget settings. */
		
			$defaults = array( 'title' => 'Featured categories', 'widget_size' => 'one-part', 'category_one' => '0', 'category_two' => '0', 'category_three' => '0', 'category_four' => '0' );
			$instance = wp_parse_args( (array) $instance, $defaults );
			
			$title = $instance['title'];
			$category_one = $instance['category_one'];
			$category_two = $instance['category_two'];
			$category_three = $instance['category_three'];
			$category_four = $instance['category_four'];
			$widget_size = $instance['widget_size'];
						
			$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget '. esc_attr($widget_size) , $args['before_widget']);		
			echo $args['before_widget'];
			if ( ! empty( $title ) )
				echo $args['before_title'] . esc_html($title) . $args['after_title'];
				?>

<div class="multi-category-small">
	<ul class="featured-small">
		<?php $exm1_posts = new WP_Query(array( 'cat' => $category_one, 'posts_per_page' => 1, 'ignore_sticky_posts' => 1 )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li>
			<div class="multi-category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('small-blog'); ?>
				</a>
				<?php } ?>				
				<div class="multi-category-title">
					<h2>
						<a href="<?php the_permalink(); ?>" class="blog-post-title">
						<?php the_title(); ?>
						</a>
					</h2>
				</div>
				<!--multi-category-title-->									
			</div>
			<!--multi-category-image-->
		</li>
		<?php endwhile; ?>
	</ul>
	<ul class="featured-multi-category-small-links">
		<?php $exm1_posts = new WP_Query(array( 'cat' => $category_one, 'posts_per_page' => 4, 'offset' => '1' )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li>
			<h2>
				<a href="<?php the_permalink(); ?>" >
				<?php echo wp_trim_words( get_the_title(), 8 ); ?>
				</a>
			</h2>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<!--multi-category-small-->

<?php if( $widget_size == 'two-parts' || $widget_size == 'three-parts' || $widget_size == 'four-parts') { ?>
<div class="multi-category-small">
	<ul class="featured-small">
		<?php $exm1_posts = new WP_Query(array( 'cat' => $category_two, 'posts_per_page' => 1, 'ignore_sticky_posts' => 1 )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li>
			<div class="multi-category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('small-blog'); ?>
				</a>
				<?php } ?>				
				<div class="multi-category-title">
					<h2>
						<a href="<?php the_permalink(); ?>" class="blog-post-title">
						<?php the_title(); ?>
						</a>
					</h2>
				</div>
				<!--multi-category-title-->									
			</div>
			<!--multi-category-image-->
		</li>
		<?php endwhile; ?>
	</ul>
	<ul class="featured-multi-category-small-links">
		<?php $exm1_posts = new WP_Query(array( 'cat' => $category_two, 'posts_per_page' => 4, 'offset' => '1' )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li>
			<h2>
				<a href="<?php the_permalink(); ?>" >
				<?php echo wp_trim_words( get_the_title(), 8 ); ?>
				</a>
			</h2>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<!--multi-category-small-->
<?php } ?>
<?php if( $widget_size == 'three-parts' || $widget_size == 'four-parts' ) { ?>
<div class="multi-category-small">
	<ul class="featured-small">
		<?php $exm1_posts = new WP_Query(array( 'cat' => $category_three, 'posts_per_page' => 1, 'ignore_sticky_posts' => 1 )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li>
			<div class="multi-category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('small-blog'); ?>
				</a>
				<?php } ?>				
				<div class="multi-category-title">
					<h2>
						<a href="<?php the_permalink(); ?>" class="blog-post-title">
						<?php the_title(); ?>
						</a>
					</h2>
				</div>
				<!--multi-category-title-->									
			</div>
			<!--multi-category-image-->
		</li>
		<?php endwhile; ?>
	</ul>
	<ul class="featured-multi-category-small-links">
		<?php $exm1_posts = new WP_Query(array( 'cat' => $category_three, 'posts_per_page' => 4, 'offset' => '1' )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li>
			<h2>
				<a href="<?php the_permalink(); ?>" >
				<?php echo wp_trim_words( get_the_title(), 8 ); ?>
				</a>
			</h2>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<!--multi-category-small-->
<?php } ?>
<?php if( $widget_size == 'four-parts' ) { ?>
<div class="multi-category-small">
	<ul class="featured-small">
		<?php $exm1_posts = new WP_Query(array( 'cat' => $category_four, 'posts_per_page' => 1, 'ignore_sticky_posts' => 1 )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li>
			<div class="multi-category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('small-blog'); ?>
				</a>
				<?php } ?>				
				<div class="multi-category-title">
					<h2>
						<a href="<?php the_permalink(); ?>" class="blog-post-title">
						<?php the_title(); ?>
						</a>
					</h2>
				</div>
				<!--multi-category-title-->									
			</div>
			<!--multi-category-image-->
		</li>
		<?php endwhile; ?>
	</ul>
	<ul class="featured-multi-category-small-links">
		<?php $exm1_posts = new WP_Query(array( 'cat' => $category_four, 'posts_per_page' => 4, 'offset' => '1' )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li>
			<h2>
				<a href="<?php the_permalink(); ?>" >
				<?php echo wp_trim_words( get_the_title(), 8 ); ?>
				</a>
			</h2>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<!--multi-category-small-->
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
		$instance['category_one'] = $new_instance['category_one'];
		$instance['category_two'] = $new_instance['category_two'];
		$instance['category_three'] = $new_instance['category_three'];
		$instance['category_four'] = $new_instance['category_four'];
		$instance['widget_size'] = $new_instance['widget_size'];
			
		return $instance;
	}
	
	function form( $instance ) {
			
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Featured categories', 'widget_size' => 'one-part', 'category_one' => '0', 'category_two' => '0', 'category_three' => '0', 'category_four' => '0');
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

<!-- cateogry-one -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('category_one')); ?>">
		<?php _e('Select Category: One', 'examiner'); ?>
	</label>
	<select id="<?php echo esc_attr($this->get_field_id('category_one')); ?>" name="<?php echo esc_attr($this->get_field_name('category_one')); ?>" style="width:100%;">
		<option value='all' <?php if ('all' == (isset($instance['category_one']))) echo 'selected="selected"'; ?>>
		<?php _e('All Categories', 'examiner'); ?>
		</option>
		<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
		<?php foreach($categories as $category) { ?>
		<option value='<?php echo esc_attr($category->term_id); ?>' <?php if(isset($instance['category_one'])){ if ($category->term_id == $instance['category_one']) echo 'selected="selected"';}?>>
		<?php echo esc_html($category->cat_name); ?>
		</option>
		<?php } ?>
	</select>
</p>

<!-- cateogry-two -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('category_two')); ?>">
		<?php _e('Select Category: Two', 'examiner'); ?>
	</label>
	<select id="<?php echo esc_attr($this->get_field_id('category_two')); ?>" name="<?php echo esc_attr($this->get_field_name('category_two')); ?>" style="width:100%;">
		<option value='all' <?php if ('all' == (isset($instance['category_two']))) echo 'selected="selected"'; ?>>
		<?php _e('All Categories', 'examiner'); ?>
		</option>
		<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
		<?php foreach($categories as $category) { ?>
		<option value='<?php echo esc_attr($category->term_id); ?>' <?php if(isset($instance['category_two'])){ if ($category->term_id == $instance['category_two']) echo 'selected="selected"';}?>>
		<?php echo esc_html($category->cat_name); ?>
		</option>
		<?php } ?>
	</select>
</p>

<!-- cateogry-three -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('category_three')); ?>">
		<?php _e('Select Category: Three', 'examiner'); ?>
	</label>
	<select id="<?php echo esc_attr($this->get_field_id('category_three')); ?>" name="<?php echo esc_attr($this->get_field_name('category_three')); ?>" style="width:100%;">
		<option value='all' <?php if ('all' == (isset($instance['category_three']))) echo 'selected="selected"'; ?>>
		<?php _e('All Categories', 'examiner'); ?>
		</option>
		<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
		<?php foreach($categories as $category) { ?>
		<option value='<?php echo esc_attr($category->term_id); ?>' <?php if(isset($instance['category_three'])){ if ($category->term_id == $instance['category_three']) echo 'selected="selected"';}?>>
		<?php echo esc_html($category->cat_name); ?>
		</option>
		<?php } ?>
	</select>
</p>

<!-- cateogry-four -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('category_four')); ?>">
		<?php _e('Select Category: Four', 'examiner'); ?>
	</label>
	<select id="<?php echo esc_attr($this->get_field_id('category_four')); ?>" name="<?php echo esc_attr($this->get_field_name('category_four')); ?>" style="width:100%;">
		<option value='all' <?php if ('all' == (isset($instance['category_four']))) echo 'selected="selected"'; ?>>
		<?php _e('All Categories', 'examiner'); ?>
		</option>
		<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
		<?php foreach($categories as $category) { ?>
		<option value='<?php echo esc_attr($category->term_id); ?>' <?php if(isset($instance['category_four'])){ if ($category->term_id == $instance['category_four']) echo 'selected="selected"';}?>>
		<?php echo esc_html($category->cat_name); ?>
		</option>
		<?php } ?>
	</select>
</p>
<?php }}?>