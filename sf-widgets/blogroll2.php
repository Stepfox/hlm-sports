<?php   
/* 
Plugin Name: Blog Posts 2
Description: The blog posts widget displayed in blogroll. 
Version: 1.0 
Author: Stefan Naumovski 
*/    
add_action ( 'widgets_init', 'exm1_blog_posts_widget' );

function exm1_blog_posts_widget() {register_widget ( 'exm1_blog_posts_exm1' );}

class exm1_blog_posts_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */

	function __construct() {
		parent::__construct ( 
		'exm1_blog_posts_exm1',	//Widget ID
		__('Blogroll 2', 'examiner'),	// Name
		array( 'description' => '', ) // Args
	);}
	
		/* Front-end display of widget. */
	
	public function widget($args, $instance) {
		
		/* Default widget settings. */

		$defaults = array( 'title' => 'Blog Posts', 'number' => 3, 'widget_size' => 'one-part', 'categories' => 0, 'author' => 'on', 'offset' => 0, 'date' => 'on');
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		/* Widget settings. */
		
		$title = $instance ['title'];	
		$number = $instance ['number'];
		$offset = $instance['offset'];
		$categories = $instance ['categories'];
		$widget_size = $instance['widget_size'];
		$author = $instance['author'];
		$date = $instance['date'];




	
		$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget '. esc_attr($widget_size) , $args['before_widget']);		
		echo $args ['before_widget'];
		if ( ! empty( $title ) ){
			echo $args['before_title'];		
				if($categories != 0){echo '<a href='.esc_url(get_category_link( $categories )).'>';}		
			echo esc_html($title); 			
				if($categories != 0){echo '</a>';}
			echo $args['after_title'];}				
				?>

<ul class="exm1-blog-posts-category">
	<?php $exm1_posts = new WP_Query(array( 'cat' => $categories, 'posts_per_page' => $number, 'offset' => $offset )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
	<li <?php post_class((is_sticky()?'sticky':'')); ?>>
		<div class="exm1-blog-posts-thumb">
			<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php if( $widget_size == 'one-part'){the_post_thumbnail('big-blog-one');} elseif($widget_size == 'two-parts' ) {the_post_thumbnail('big-blog-two');}  elseif ( $widget_size == 'three-parts' ){the_post_thumbnail('big-blog-three');}elseif ( $widget_size == 'four-parts' ){the_post_thumbnail('big-blog-four');} ?>
			<?php if ( 'video' == get_post_format() ): echo '<span class="play-icon"></span>'; endif; ?>
			</a>
			<?php } ?>
		</div>
		<!--exm1-blog-posts-thumb-->
		<div class="exm1-blog-posts-text">
			<h2>
				<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				</a>
			</h2>
			<div class="exm1-blog-posts-subtitle">
				<?php  $exm1_subtitle = get_post_meta(get_the_ID(), 'exm1_sub_title', true); if(empty($exm1_subtitle)) { echo excerpt(30); }  else { echo esc_html($exm1_subtitle);}  ?>
			</div>
			<!--exm1-blog-posts-subtitle-->
			<?php if($author || $date ) { ?>
			<div class="exm1-blog-posts-date-author">
				<?php if($author) { ?>
				<div class="exm1-blog-posts-author">
					<?php the_author_posts_link(); ?>
				</div>
				<!--exm1-blog-posts-author-->
				<?php } ?>
				<?php if($date) { ?>
				<div class="exm1-blog-posts-date">
					<?php echo esc_html(get_the_date()); ?>
				</div>
				<!--exm1-blog-posts-date-->
				<?php } ?>
			</div>
			<!--exm1-blog-posts-date-author-->
			<?php } ?>
		</div>
		<!--exm1-blog-posts-text-->
	</li>
	<?php endwhile; ?>
</ul>
<?php		
	/* After widget. */
		
	echo $args ['after_widget'];
	}
	
		/* Widget settings. */
			
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		/* Strip tags. */
		
		$instance ['title'] = $new_instance ['title'];
		$instance ['number'] = $new_instance ['number'];
		$instance['offset'] = $new_instance['offset'];
		$instance ['categories'] = $new_instance ['categories'];
		$instance['widget_size'] = $new_instance['widget_size'];
		$instance['author'] = $new_instance['author'];
		$instance['date'] = $new_instance['date'];
		

		
		return $instance;
	}
	function form($instance) {
		
		/* Default widget settings. */

		$defaults = array( 'title' => 'Blog Posts', 'number' => 3, 'widget_size' => 'one-part', 'categories' => 0, 'author' => 'on', 'offset' => 0, 'date' => 'on');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width: 90%;" />
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
		<?php _e('Number of posts to show:', 'examiner'); ?>
	</label>
	<input type="number" min="1" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
</p>

<!-- Offset posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>">
		<?php _e('Forward Posts(offset):', 'examiner'); ?>
	</label>
	<input type="number" min="0" id="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'offset' )); ?>" value="<?php echo esc_attr($instance['offset']); ?>" size="3" />
</p>

<!--Category -->
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

<!-- Author -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'author' )); ?>">
		<?php _e('Show Author:', 'examiner'); ?>
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'author' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'author' )); ?>" <?php checked( (bool) $instance['author'], true ); ?> />
</p>
<!-- Date -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'date' )); ?>">
		<?php _e('Show Date:', 'examiner'); ?>
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'date' )); ?>" <?php checked( (bool) $instance['date'], true ); ?> />
</p>


<?php }} ?>