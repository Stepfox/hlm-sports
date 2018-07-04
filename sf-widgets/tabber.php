<?php
/* 
Plugin Name: Tabs (Tabs-widget) 
Description:  Tabs widget that shows Lastest, Popular and most commented posts.
Version: 1.0 
Author: Stefan Naumovski 
*/    
add_action( 'widgets_init', 'tabs_widget' );

function Tabs_widget() {register_widget( 'tabs_exm1' );}

class tabs_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'tabs_exm1', 	//Widget ID
			__('Tabs Widget', 'examiner'), // Name
			array( 'description' => '', ) // Args
		);}
		
		/* Front-end display of widget. */
		
	function widget( $args, $instance ) {
		/* Default widget settings. */
		$defaults = array( 'latest_title' => 'Latest','popular_title' => 'Popular','comments_title' => 'Commented', 'latest_number' => 3, 'categories' => 0, 'widget_size' => 'one-part', 'duration'=>'forever');
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		extract( $args );
		$latest_title = $instance['latest_title'];
		$popular_title = $instance['popular_title'];
		$comments_title = $instance['comments_title'];
		$latest_number = $instance['latest_number'];
		$categories = $instance['categories'];
		$widget_size = $instance['widget_size'];
		$duration = $instance['duration'];
		
		$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget '. esc_attr($widget_size) , $args['before_widget']);			
		echo $args['before_widget'];
		?>

<div class="tabber-container">
	<ul class="tabs">
		<li>
			<h4>
				<a href="#tab1">
				<?php echo esc_html($latest_title); ?>
				</a>
			</h4>
		</li>
		<li>
			<h4>
				<a href="#tab2">
				<?php echo esc_html($popular_title); ?>
				</a>
			</h4>
		</li>
		<li>
			<h4>
				<a href="#tab3">
				<?php echo esc_html($comments_title); ?>
				</a>
			</h4>
		</li>
	</ul>
	<div id="tab1" class="tabber-content">
		<ul class="featured-thumbnails">
			<?php $exm1_posts = new WP_Query(array('cat' => $categories, 'posts_per_page' => $latest_number, 'ignore_sticky_posts' => 1 )); while($exm1_posts->have_posts()) : $exm1_posts->the_post();?>
			<li>
				<div class="featured-posts-image">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('small-thumb'); ?>
					</a>
					<?php } ?>
				</div>
				<!---featured-posts-image-->
				<div class="featured-posts-text">
					<span class="category-icon">
					<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
					</span>
					<div class="featured-posts-title">
						<a href="<?php the_permalink(); ?>">
						<?php echo wp_trim_words( get_the_title(), 10 ); ?>
						</a>
					</div>
					<!--featured-posts-title-->
					<span class="post-date">
					<?php echo esc_html(get_the_date()); ?>
					</span>
				</div>
				<!--featured-posts-text-->
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
	<!--tab1-->
	<div id="tab2" class="tabber-content">
		<ul class="featured-thumbnails">
					<?php 
if( $duration == 'week'){					
	$week = date('W');
		$args = array(
			'posts_per_page'=> $latest_number,
			'w' => $week,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order'    => 'DESC'
			);
			
} elseif ($duration == 'year'){
	$year = date('Y');
		$args = array(
			'posts_per_page'=> $latest_number,
			'year'     => $year,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order'    => 'DESC'
			);	
} elseif($duration == 'month'){	
	$month = date('m');
		$args = array(
			'posts_per_page'=> $latest_number,
			'monthnum'     => $month,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order'    => 'DESC'
			);
}elseif($duration == 'forever'){
		$args = array(
			'posts_per_page'=> $latest_number,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order'    => 'DESC'
			);	
}




$exm1_posts = new WP_Query($args); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post();
?>
			<li>
				<div class="featured-posts-image">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('small-thumb'); ?>
					</a>
					<?php } ?>
				</div>
				<!---featured-posts-image-->
				<div class="featured-posts-text">
					<span class="category-icon">
					<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
					</span>
					<div class="featured-posts-title">
						<a href="<?php the_permalink(); ?>">
						<?php echo wp_trim_words( get_the_title(), 10 ); ?>
						</a>
					</div>
					<!--featured-posts-title-->
					<span class="post-date">
					<?php echo esc_html(get_the_date()); ?>
					</span>
				</div>
				<!--featured-posts-text-->
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
	<!--tab2-->
	
	<div id="tab3" class="tabber-content">
		<ul class="featured-thumbnails">
			<?php $most_commented_query = new WP_Query('orderby=comment_count&posts_per_page='.esc_html($latest_number).'&cat='.esc_html($categories).''); 
		while ($most_commented_query->have_posts()) : $most_commented_query->the_post(); ?>
			<li>
				<div class="featured-posts-image">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('small-thumb'); ?>
					</a>
					<?php } ?>
				</div>
				<!---featured-posts-image-->
				<div class="featured-posts-text">
					<span class="category-icon">
					<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
					</span>
					<div class="featured-posts-title">
						<a href="<?php the_permalink(); ?>">
						<?php echo wp_trim_words( esc_html(get_the_title()), 10 ); ?>
						</a>
					</div>
					<!--featured-posts-title-->
					<span class="category-icon">
					<?php 
						$exm1_comments_no_comment = get_option('exm1_comments_no_comment');
						$exm1_comments_one_comment = get_option('exm1_comments_one_comment');
						$exm1_comments_number_comments = get_option('exm1_comments_number_comments');
					
						comments_popup_link( esc_html($exm1_comments_no_comment), esc_html($exm1_comments_one_comment), '% '.esc_html($exm1_comments_number_comments) ); 
						
					?>
					</span>
				</div>
				<!--featured-posts-text-->
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
	<!--tab3-->
</div>
<!--tabber-container-->
<?php

	/* After widget. */	
	
		echo $after_widget;
	}
	
	/* Widget settings. */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags. */
		
		$instance['latest_title'] = $new_instance['latest_title'];
		$instance['popular_title'] = $new_instance['popular_title'];
		$instance['comments_title'] = $new_instance['comments_title'];
		$instance['latest_number'] = $new_instance['latest_number'];
		$instance['categories'] = $new_instance['categories'];
		$instance['widget_size'] = $new_instance['widget_size'];
		$instance['duration'] =  $new_instance['duration'];
		return $instance;
	}
	

		
	function form( $instance ) {
		/* Default widget settings. */
		$defaults = array( 'latest_title' => 'Latest','popular_title' => 'Popular','comments_title' => 'Commented', 'latest_number' => 3, 'widget_size' => 'one-part', 'duration'=>'forever');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>


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


<!--Latest-posts-title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'latest_title' )); ?>">
		<?php _e('Latest Title:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'latest_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_title' )); ?>" value="<?php echo esc_textarea($instance['latest_title']); ?>" style="width:90%;" />
</p>

<!--Latest posts number of posts-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'latest_number' )); ?>">
		<?php _e('Number of posts to show:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'latest_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_number' )); ?>" value="<?php echo esc_textarea($instance['latest_number']); ?>" size="3" />
</p>

<!--Latest posts category-->
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

<!--Popular-posts-title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'popular_title' )); ?>">
		<?php _e('Popular Title:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'popular_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'popular_title' )); ?>" value="<?php echo esc_textarea($instance['popular_title']); ?>" style="width:90%;" />
</p>
<!--Duration-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('duration')); ?>">Popular time:</label>
	<select name="<?php echo esc_attr($this->get_field_name('duration')); ?>" id="<?php echo esc_attr($this->get_field_id('duration')); ?>" class="widefat" >
		<?php $options = array('week', 'month', 'year', 'forever');
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['duration']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>
<!--Comments-posts-title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'comments_title' )); ?>">
		<?php _e('Comments Title:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'comments_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'comments_title' )); ?>" value="<?php echo esc_textarea($instance['comments_title']); ?>" style="width:90%;" />
</p>
<?php }} ?>