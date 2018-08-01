<?php 
/**
 * Examiner customizer
**/ 
?>
<?php 
function exm1_customize( $wp_customize ) {
	//  = Examiner: Sections =
	
	$wp_customize->get_section('title_tagline')->title = __('Site Title, Tagline, Footer copyright text & Favorite Icon', 'examiner');
	$wp_customize->get_section('title_tagline')->priority = '1';

	$wp_customize->get_section('header_image')->title = __('Logo', 'examiner');
	$wp_customize->get_section('header_image')->priority = '2';	
	
	$wp_customize->get_section('colors')->title = __('Colors', 'examiner');
	$wp_customize->get_section('colors')->priority = '3';

	$wp_customize->add_section('exm1_design' , array(
			'title' => __('Design', 'examiner'),
			'priority' => '4'
	));
	
	$wp_customize->add_section('exm1_typography' , array(
			'title' => __('Typography', 'examiner'),
			'priority' => '5'
	));

	$wp_customize->add_section('exm1_header_posts_options' , array(
			'title' => __('Header Posts', 'examiner'),
			'priority' => '6'
	));

	$wp_customize->add_section('exm1_post_page_options' , array(
			'title' => __('Post page option', 'examiner'),
			'priority' => '7'
	));
	
	$wp_customize->add_section('exm1_category_page_options' , array(
			'title' => __('Category and TV options', 'examiner'),
			'priority' => '8'
	));

	$wp_customize->add_section('exm1_translate' , array(
			'title' => __('Translate', 'examiner'),
			'priority' => '9'
	));
	
	$wp_customize->add_section('exm1_social' , array(
			'title' => __('Social settings', 'examiner'),
			'priority' => '10'
	));

	$wp_customize->add_section('exm1_ad_page' , array(
			'title' => __('Theme Ad Spaces', 'examiner'),
			'priority' => '11'
	));

	

	
	//  = Examiner: Colors =
	
	$colors = array();

	$colors[] = array(
			'slug'=>'exm1_top_posts_background',
			'default' => '#FFFFFF',
			'label' => __('Top posts background', 'examiner'),
			'section' => 'colors',
			'priority' => '2'
	);

	$colors[] = array(
			'slug'=>'exm1_top_posts_cat_color',
			'default' => '#000000',
			'label' => __('Top posts category color', 'examiner'),
			'section' => 'colors',
			'priority' => '2'
	);

	$colors[] = array(
			'slug'=>'exm1_top_posts_title_color',
			'default' => '#000000',
			'label' => __('Top posts title color', 'examiner'),
			'section' => 'colors',
			'priority' => '2'
	);

	$colors[] = array(
			'slug'=>'exm1_menu_background',
			'default' => '#FFFFFF',
			'label' => __('Menu background color', 'examiner'),
			'section' => 'colors',
			'priority' => '2'
	);

	$colors[] = array(
			'slug'=>'exm1_menu_color',
			'default' => '#000000',
			'label' => __('Menu font color', 'examiner'),
			'section' => 'colors',
			'priority' => '3'
	);
	
	$colors[] = array(
			'slug'=>'exm1_menu_hover_color',
			'default' => '#ff6e00',
			'label' => __('Menu hover color', 'examiner'),
			'section' => 'colors',
			'priority' => '3'
	);

	$colors[] = array(
			'slug'=>'exm1_main_color',
			'default' => '#ff6e00',
			'label' => __('Main color', 'examiner'),
			'section' => 'colors',
			'priority' => '5'
	);
	
		$colors[] = array(
			'slug'=>'exm1_menu_border_color',
			'default' => '#ebebeb',
			'label' => __('Menu border color','examiner'), 
			'section' => 'colors',
			'priority' => '2'
	);
	
		$colors[] = array(
			'slug'=>'exm1_logo_background',
			'default' => '#FFF',
			'label' => __('Logo background','examiner'), 
			'section' => 'colors',
			'priority' => '2'
	);


		$colors[] = array(
			'slug'=>'exm1_gradient1',
			'default' => '#2a7ab7',
			'label' => __('Image overlay gradient color 1','examiner'), 
			'section' => 'colors',
			'priority' => '5'
	);

		$colors[] = array(
			'slug'=>'exm1_gradient2',
			'default' => '#F00',
			'label' => __('Image overlay gradient color 2','examiner'), 
			'section' => 'colors',
			'priority' => '5'
	);

		$colors[] = array(
			'slug'=>'exm1_widget_title_color',
			'default' => '#F00',
			'label' => __('Widget title color','examiner'), 
			'section' => 'colors',
			'priority' => '5'
	);

		$colors[] = array(
			'slug'=>'exm1_footer_background_color',
			'default' => '#F00',
			'label' => __('Footer background','examiner'), 
			'section' => 'colors',
			'priority' => '6'
	);

		$colors[] = array(
			'slug'=>'exm1_footer_border_color',
			'default' => '#F00',
			'label' => __('Footer border color','examiner'), 
			'section' => 'colors',
			'priority' => '6'
	);

		$colors[] = array(
			'slug'=>'exm1_footer_text_color',
			'default' => '#F00',
			'label' => __('Footer text color','examiner'), 
			'section' => 'colors',
			'priority' => '6'
	);

		$colors[] = array(
			'slug'=>'exm1_footer_hover_color',
			'default' => '#000',
			'label' => __('Footer hover color','examiner'), 
			'section' => 'colors',
			'priority' => '6'
	);

		$colors[] = array(
			'slug'=>'exm1_popular_background_color',
			'default' => '#F00',
			'label' => __('Category page:popular background color','examiner'), 
			'section' => 'colors',
			'priority' => '7'
	);


		$colors[] = array(
			'slug'=>'exm1_popular_text_color',
			'default' => '#F00',
			'label' => __('Category page:popular text color','examiner'), 
			'section' => 'colors',
			'priority' => '7'
	);

		$colors[] = array(
			'slug'=>'exm1_popular_read_more_color',
			'default' => '#F00',
			'label' => __('Category page:popular read more color','examiner'), 
			'section' => 'colors',
			'priority' => '7'
	);


	foreach( $colors as $color ) {
		$wp_customize->add_setting(
				$color['slug'], array(
						'default' => $color['default'],
						'type' => 'option',
						'capability' =>'edit_theme_options',
						'sanitize_callback' => 'sanitize_hex_color',

				)
		);

		$wp_customize->add_control(
				new WP_Customize_Color_Control(
						$wp_customize,
						$color['slug'],
						array('label' => $color['label'],
								'section' => $color['section'],
								'settings' => $color['slug'],
								'priority' => $color['priority'])
				)
		);
	}
	


		//  = Examiner: Images =

		
		$exm1images = array();
		$bloginfo = get_template_directory_uri();

		$exm1images[] = array(
				'slug'=>'exm1_footer_logo',
				'default' => $bloginfo.'/images/examiner-footer-logo.png',
				'label' => __('Footer Logo','examiner'),
				'priority' => '30'
		);

		$exm1images[] = array(
				'slug'=>'exm1_facebook_default',
				'default' => $bloginfo.'/images/examiner-facebook.jpg',
				'label' => __('Facebook Homepage image','examiner'),
				'priority' => '30'
		);
		
		foreach( $exm1images as $exm1image ) {		
		
		
		$wp_customize->add_setting($exm1image['slug'], array(
				'capability'        => 'edit_theme_options',
				'type'           => 'option',
				'default' => $exm1image['default'],
				'sanitize_callback' => 'exm1_sanitize'
		));
		
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $exm1image['slug'], array(
				'label'    => $exm1image['label'],
				'section'  => 'header_image',
				'settings' => $exm1image['slug'],
				'priority' => $exm1image['priority']
		)));
	
	
	
		}
	
	
		//  = Examiner: Text =
		
		
		$exm1text = array();
	
		$exm1text[] = array(
				'slug'=>'exm1_facebook',
				'default' => '',
				'label' => __('Facebook:','examiner'), 
				'section' => 'exm1_social',
				'priority' => '1'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_twitter',
				'default' => '',
				'label' => __('Twitter:','examiner'),  
				'section' => 'exm1_social',
				'priority' => '2'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_pinterest',
				'default' => '',
				'label' => __('Pinterest:','examiner'),  
				'section' => 'exm1_social',
				'priority' => '3'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_google',
				'default' => '',
				'label' => __('Google:', 'examiner'), 
				'section' => 'exm1_social',
				'priority' => '4'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_youtube',
				'default' => '',
				'label' => __('Youtube:','examiner'), 
				'section' => 'exm1_social',
				'priority' => '5'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_instagram',
				'default' => '',
				'label' => __('Instagram:','examiner'),  
				'section' => 'exm1_social',
				'priority' => '6'
		);


		$exm1text[] = array(
				'slug'=>'exm1_word_before_author',
				'default' => 'by',
				'label' => __('Word before author(eg. by, from, posted by)','examiner'), 
				'section' => 'exm1_translate',
				'priority' => '1'
		);

		$exm1text[] = array(
				'slug'=>'exm1_word_load_more',
				'default' => 'Load More',
				'label' => __('Load More button','examiner'), 
				'section' => 'exm1_translate',
				'priority' => '1'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_word_before_category',
				'default' => 'Latest in:',
				'label' => __('Category page:Word before Category title','examiner'), 
				'section' => 'exm1_translate',
				'priority' => '1'
		);

		$exm1text[] = array(
				'slug'=>'exm1_read_more_translate',
				'default' => 'Read More',
				'label' => __('Category page:Popular posts Read More','examiner'), 
				'section' => 'exm1_translate',
				'priority' => '1'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_post_tags_title',
				'default' => 'Tags',
				'label' => __('Post page: Tags title','examiner'), 
				'section' => 'exm1_translate',
				'priority' => '4'
		);

		$exm1text[] = array(
				'slug'=>'exm1_post_views_translate',
				'default' => 'Views',
				'label' => __('Post page: Views','examiner'), 
				'section' => 'exm1_translate',
				'priority' => '4'
		);

		$exm1text[] = array(
				'slug'=>'exm1_post_category_title',
				'default' => 'Categories',
				'label' => __('Post page: Categories title','examiner'), 
				'section' => 'exm1_translate',
				'priority' => '4'
		);

		$exm1text[] = array(
				'slug'=>'exm1_share_this_article',
				'default' => 'SHARE THIS ARTICLE',
				'label' => __('Post page: share', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '4'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_share_this_video',
				'default' => 'SHARE THIS VIDEO',
				'label' => __('TV page: share', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '4'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_share_this_gallery',
				'default' => 'SHARE THIS GALLERY',
				'label' => __('Gallery page: share', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '4'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_older_article',
				'default' => 'OLDER ARTICLE',
				'label' => __('Post page: Older article', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '5'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_next_article',
				'default' => 'NEXT ARTICLE',
				'label' => __('Post page: next article', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '6'
		);
		
		
		$exm1text[] = array(
				'slug'=>'exm1_related_by',
				'default' => 'RELATED BY',
				'label' => __('Post page: related widget title', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '7'
		);

		$exm1text[] = array(
				'slug'=>'exm1_category_popular_title',
				'default' => 'Popular Posts',
				'label' => __('Category page: Popular posts widget title', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '7'
		);
	
		$exm1text[] = array(
				'slug'=>'exm1_tv_carousel_title',
				'default' => 'BROWSE MORE VIDEOS',
				'label' => __('Tv title', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '10'
		);

		$exm1text[] = array(
				'slug'=>'exm1_no_match',
				'default' => 'Sorry, no posts matched your criteria.',
				'label' => __('No posts matched your criteria.', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '10'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_gallery_carousel_title',
				'default' => 'BROWSE MORE GALLERIES',
				'label' => __('Gallery title', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '10'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_review_page_title',
				'default' => 'Reviews',
				'label' => __('Reviews title', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '10'
		);

		$exm1text[] = array(
				'slug'=>'exm1_review_good_title',
				'default' => 'The Good',
				'label' => __('Reviews: Good', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '10'
		);

		$exm1text[] = array(
				'slug'=>'exm1_review_bad_title',
				'default' => 'The Bad',
				'label' => __('Reviews: Bad', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '10'
		);		
			
		$exm1text[] = array(
				'slug'=>'exm1_comments_post_comment',
				'default' => 'Post comment',
				'label' => __('Comments: Post comment', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '12'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_comments_post_reply',
				'default' => 'Leave a Reply',
				'label' => __('Comments: Leave a Reply', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '13'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_comments_post_reply_to',
				'default' => 'Leave a Reply to',
				'label' => __('Comments: Leave a Reply to', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '14'
		);
		
		
		$exm1text[] = array(
				'slug'=>'exm1_comments_cancel_reply',
				'default' => 'Cancel reply',
				'label' => __('Comments: Cancel reply', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '15'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_comments_logged_in_as',
				'default' => 'Logged in as',
				'label' => __('Comments: Logged in as', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '15'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_comments_logged_in_as_log_out',
				'default' => 'Log out',
				'label' => __('Comments: Log out', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '15'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_comments_name',
				'default' => 'Name',
				'label' => __('Comments: Name', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '16'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_comments_email',
				'default' => 'Email',
				'label' => __('Comments: Email', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '17'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_comments_website',
				'default' => 'Website',
				'label' => __('Comments: Website', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '18'
		);
				
		$exm1text[] = array(
				'slug'=>'exm1_comments_no_comment',
				'default' => 'No Comment',
				'label' => __('Comments: No Comment', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '19'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_comments_one_comment',
				'default' => 'One Comment',
				'label' => __('Comments: One Comment', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '20'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_comments_number_comments',
				'default' => 'Comments on this post.',
				'label' => __('Comments: Number of comments on this post.(the line after the number)', 'examiner'),
				'section' => 'exm1_translate',
				'priority' => '21'
		);
		
		$exm1text[] = array(
				'slug'=>'exm1_category_number',
				'default' => '9',
				'label' => __('Number of posts to show', 'examiner'),
				'section' => 'exm1_category_page_options',
				'priority' => '100'
		);	
		
		$exm1text[] = array(
				'slug'=>'exm1_copyright',
				'default' => 'Copyright 2015 Examiner Theme. Stepfox Development Studios',
				'label' => __('Footer copyright text', 'examiner'),
				'section' => 'title_tagline',
				'priority' => '10'
		);
	
		foreach( $exm1text as $exm1_text ) {
			
			
			$wp_customize->add_setting($exm1_text['slug'], array(
					'default'        => $exm1_text['default'],
					'capability'     => 'edit_theme_options',
					'type'           => 'option',
					'sanitize_callback' => 'exm1_sanitize'
			
			));
			
			$wp_customize->add_control($exm1_text['slug'], array(
					'label'      => $exm1_text['label'],
					'section'    => $exm1_text['section'],
					'settings'   => $exm1_text['slug'],
					'priority'   => $exm1_text['priority'],
			));
					
		}
		
		
		
		
		
		
		
		//  = Examiner: Dropdown =
		
		$exm1_tags = array();
		
		$exm1_tags_obj = get_categories('hide_empty=0');
		
		foreach ($exm1_tags_obj as $exm1_tag) {
		
			$exm1_tags[$exm1_tag->term_id] = $exm1_tag->slug;
		}
		 $exm1_tags = array('all' => 'Latest') + $exm1_tags;


			
			
			$fonts_list = array(
				'Asap' => 'Asap',
				'Asul' => 'Asul',		
				'Bitter' => 'Bitter',
				'Caudex' => 'Caudex',
				'Droid Sans' => 'Droid Sans',
				'Droid Serif' => 'Droid Serif',
				'Electrolize' => 'Electrolize',
				'Hanuman' => 'Hanuman',
				'Jura' => 'Jura',
				'Kameron' => 'Kameron',
				'Kotta One' => 'Kotta One',
				'Lato' => 'Lato',
				'Lora' => 'Lora',
				'Magra' => 'Magra',
				'Maven Pro' => 'Maven Pro',
				'Metrophobic' => 'Metrophobic',
				'Molengo' => 'Molengo',
				'Montserrat' => 'Montserrat',
				'Open Sans' => 'Open Sans',
				'PT Sans' => 'PT Sans',
				'PT Serif' => 'PT Serif',
				'Play' => 'Play',
				'Podkova' => 'Podkova',
				'Pontano Sans' => 'Pontano Sans',
				'Quattrocento Sans' => 'Quattrocento Sans',
				'Raleway' => 'Raleway',
				'Rosario' => 'Rosario',
				'Shanti' => 'Shanti',
				'Share' => 'Share',
				'Signika' => 'Signika',
				'Telex' => 'Telex',
				'Tinos' => 'Tinos',
				'Ubuntu' => 'Ubuntu',
				'Vidaloka' => 'Vidaloka',
				'Viga' => 'Viga'				
			);
					
			$exm1_dropdowns = array();

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_header_posts_cat',
					'default' => 'all',
					'label' => __('Header small posts category:', 'examiner'),
					'section' => 'exm1_header_posts_options',
					'choices' => $exm1_tags,
			);				
					
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_site_width',
					'default' => '1290',
					'label' => __('Body width:(if you play with this option dont forget to reupload or regenerate your images so the new sizes can take full effect!!!important!!!!!) ', 'examiner'),
					'section' => 'exm1_design',
					'choices'    => array(
							'1290' => '1290px',
							'1596' => '1596px',
							'1903' => '1903px',
				
					));

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_gradient_shape',
					'default' => 'linear-gradient(to right',
					'label' => __('Pick gradient shape:', 'examiner'),
					'section' => 'exm1_design',
					'choices'    => array(	
							'//'=>'none',				
							'linear-gradient(to right' => 'horizontal',
							'linear-gradient(to bottom' => 'vertical',
							'linear-gradient(135deg' => 'diagonal up',
							'linear-gradient(45deg' => 'diagonal down',
							'radial-gradient(ellipse at center' => 'radial',			
					));	

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_header_type',
					'default' => '',
					'label' => __('Pick Header Type:', 'examiner'),
					'section' => 'exm1_design',
					'choices'    => array(	
							''=>'Normal',				
							'small-header' => 'Small Header',		
					));

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_gradient_opacity',
					'default' => '0.5',
					'label' => __('Pick gradient opacity:', 'examiner'),
					'section' => 'exm1_design',
					'choices'    => array(	
							'0.1'=>'10%',
							'0.2'=>'20%',
							'0.3'=>'30%',
							'0.4'=>'40%',
							'0.5'=>'50%',
							'0.6'=>'60%',
							'0.7'=>'70%',
							'0.8'=>'80%',				
			
					));	

							
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_slider_picker',
					'default' => 'slider_fx2',
					'label' => __('Slider transition', 'examiner'),
					'section' => 'exm1_design',
					'choices'    => array(
							'slider_fx1' => 'Slide',
							'slider_fx2' => 'Fade',
							'slider_fx3' => 'Pop',
							'slider_fx4' => 'Move up',
							'slider_fx5' => 'Drop in',
							'slider_fx6' => 'Rise from bottom',
							'slider_fx7' => 'Clapper',
							'slider_fx8' => 'Zoom',
							'slider_fx9' => 'Black and white',							
					));
					
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_image_effect',
					'default' => 'image_fx1',
					'label' => __('Image Effect:', 'examiner'),
					'section' => 'exm1_design',
					'choices'    => array(
							'' => 'None',
							'image_fx1' => 'Fast Shine',
							'image_fx2' => 'Zoom in',
							'image_fx3' => 'Border Line',
							'image_fx4' => 'Black and white',
							'image_fx5' => 'Opacity',					
					));
							
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_search_color',
					'default' => '',
					'label' => __('Search Icon Color', 'examiner'),
					'section' => 'colors',
					'choices'    => array(
							'-black' => 'Black',
							'' => 'White',
		
					));

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_mob_search_color',
					'default' => '',
					'label' => __('Search Icon Color Mobile', 'examiner'),
					'section' => 'colors',
					'choices'    => array(
							'-black' => 'Black',
							'' => 'White',
		
					));
											
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_fixed_menu',
					'default' => 'show-menu',
					'label' => __('Menu follow with scroll', 'examiner'),
					'section' => 'exm1_design',
					'choices'    => array(
							'show-menu' => 'Show',
							'' => 'Hide',
		
					));
			
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_fonts',
					'default' => 'Open Sans',
					'label' => __('Main Font', 'examiner'),
					'section' => 'exm1_typography',
					'choices'    => $fonts_list
	
					);
			
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_menu_font',
					'default' => 'Open Sans',
					'label' => __('Menu Font', 'examiner'),
					'section' => 'exm1_typography',
					'choices'    => $fonts_list
			
			);
			
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_menu_font_weight',
					'default' => '400',
					'label' => __('Menu Font Weight', 'examiner'),
					'section' => 'exm1_typography',
					'choices'    => array(
							'400' => 'Regular',
							'600' => 'Semi-bold',
							'700' => 'Bold',
							'800' => 'Extra Bold',
			));

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_menu_font_size',
					'default' => '16px',
					'label' => __('Menu Font Size', 'examiner'),
					'section' => 'exm1_typography',
					'choices'    => array(
							'13px' => '13px',
							'14px' => '14px',
							'15px' => '15px',
							'16px' => '16px',
							'17px' => '17px',
							'18px' => '18px',
							'19px' => '19px',
							'20px' => '20px',
			));
			
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_small_text_font',
					'default' => 'Open Sans',
					'label' => __('Small text font', 'examiner'),
					'section' => 'exm1_typography',
					'choices'    => $fonts_list
			
			);

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_widget_title_style',
					'default' => '',
					'label' => __('Widget Title Style', 'examiner'),
					'section' => 'exm1_typography',
					'choices'    => array(
							'italic;font-size:26px;' => 'Italic',
							'normal' => 'Normal',		
					));

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_widget_font_weight',
					'default' => '700',
					'label' => __('Widget Title Font Weight', 'examiner'),
					'section' => 'exm1_typography',
					'choices'    => array(
							'400' => 'Regular',
							'600' => 'Semi-bold',
							'700' => 'Bold',
							'800' => 'Extra Bold',
			));


						
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_widget_fx',
					'default' => 'widgetfx-1',
					'label' => __('Widget load effect', 'examiner'),
					'section' => 'exm1_design',
					'choices'    => array(
							'nowidgetfx' => 'no effect',
							'widgetfx-1' => 'Fade in',
							'widgetfx-2' => 'Move up',
							'widgetfx-3' => 'Scale up',
							'widgetfx-4' => 'Rubber band',
							'widgetfx-5' => 'Bounce up',
							'widgetfx-6' => 'Pulse',
							'widgetfx-7' => 'Fade in up',
							'widgetfx-8' => 'Pop up',
							'widgetfx-9' => 'Bounce',
		
					));			

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_uppercase_title',
					'default' => 'uppercase',
					'label' => __('Title Uppercase', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'uppercase' => 'On',
							'none' => 'Off',	
					));	

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_first_letter',
					'default' => '',
					'label' => __('First Letter', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'first-letter' => 'On',
							'' => 'Off',	
					));	
									
											
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_content_font_size',
					'default' => '13',
					'label' => __('Post: Content font size', 'examiner'),
					'section' => 'exm1_typography',
					'choices'    => array(
							'12' => '12px',
							'13' => '13px',
							'14' => '14px',
							'15' => '15px',
							'16' => '16px',
							'17' => '17px',
							'18' => '18px',

		
					));	

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_share_post',
					'default' => 'true',
					'label' => __('Share buttons', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
		
					));	

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_post_info_author',
					'default' => 'true',
					'label' => __('Author and Date', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
		
					));	

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_post_page_views',
					'default' => 'false',
					'label' => __('Display Pageviews:', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
		
					));

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_floating_share_post',
					'default' => 'true',
					'label' => __('Floating Share buttons', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
		
					));		
			
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_post_tags',
					'default' => 'true',
					'label' => __('Post tags', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
		
					));	
					
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_post_categories',
					'default' => 'true',
					'label' => __('Post categories', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
		
					));			
	
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_author_box',
					'default' => 'true',
					'label' => __('Author-box', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
		
					));
			
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_show_comments',
					'default' => 'true',
					'label' => __('Comments', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
			
					));
					
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_next_prev_links',
					'default' => 'true',
					'label' => __('Navigation Links', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
			
					));	

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_last_widget_sticky',
					'default' => 'stickylastwidget',
					'label' => __('Last Widget Sticky follow', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'stickylastwidget' => 'On',
							'' => 'Off',
			
					));					
			
		
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_related',
					'default' => 'true',
					'label' => __('Related Posts', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
			
					));
									
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_related_choice',
					'default' => 'tags',
					'label' => __('Chose related posts', 'examiner'),
					'section' => 'exm1_post_page_options',
					'choices'    => array(
							'tags' => 'Tags',
							'category' => 'Category',
							'author' => 'Author',
			
					));					

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_category_post_style',
					'default' => 'style_1',
					'label' => __('Category post style', 'examiner'),
					'section' => 'exm1_category_page_options',
					'choices'    => array(
							'style_1' => 'Style 1',
							'style_2' => 'Style 2',
							'style_3' => 'Style 3',
			
					));
					
	

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_category_show_author',
					'default' => 'true',
					'label' => __('Category show author', 'examiner'),
					'section' => 'exm1_category_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
			
					));	
					
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_category_show_date',
					'default' => 'true',
					'label' => __('Category show date', 'examiner'),
					'section' => 'exm1_category_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
			
					));		
			
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_popular_widget',
					'default' => 'true',
					'label' => __('Popular Posts', 'examiner'),
					'section' => 'exm1_category_page_options',
					'choices'    => array(
							'true' => 'Show',
							'false' => 'Hide',
			
					));
										
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_popular_post',
					'default' => 'forever',
					'label' => __('Popular Posts Time', 'examiner'),
					'section' => 'exm1_category_page_options',
					'choices'    => array(
							'week' => 'week',
							'month' => 'month',
							'year' => 'year',
							'forever' => 'forever',
			
					));	
					
			$exm1_dropdowns[] = array(
					'slug'=>'exm1_tv_widget_style',
					'default' => 'one',
					'label' => __('TV-Widget-Style', 'examiner'),
					'section' => 'exm1_category_page_options',
					'choices'    => array(
							'one' => 'Style 1',
							'two' => 'Style 2',
							'three' => 'Style 3',		
					));	

			$exm1_dropdowns[] = array(
					'slug'=>'exm1_pagination_style',
					'default' => 'ajax',
					'label' => __('Pagination', 'examiner'),
					'section' => 'exm1_category_page_options',
					'choices'    => array(
							'ajax' => 'Ajax Load More',
							'normal' => 'Normal Pagination',
							'auto-load'=>'Ajax Auto Load on scroll',	
					));	

					
								
			foreach( $exm1_dropdowns as $exm1_dropdown ) {
					
					
				$wp_customize->add_setting($exm1_dropdown['slug'], array(
						'default'        => $exm1_dropdown['default'],
						'capability'     => 'edit_theme_options',
						'type'           => 'option',
						'sanitize_callback' => 'exm1_sanitize'
							
				));
					
				$wp_customize->add_control($exm1_dropdown['slug'], array(
						'label'      => $exm1_dropdown['label'],
						'section'    => $exm1_dropdown['section'],
						'settings'   => $exm1_dropdown['slug'],
						'choices' => $exm1_dropdown['choices'],
						'type'    => 'select',
				));
					
			}




			$exm1_textareas = array();


			$exm1_textareas[] = array(
					'slug'=>'exm1_header_advert',
					'default' => '',
					'label' => __('Header Ad', 'examiner'),
					'section' => 'exm1_ad_page',
					);	

			$exm1_textareas[] = array(
					'slug'=>'exm1_footer_advert',
					'default' => '',
					'label' => __('Footer Ad', 'examiner'),
					'section' => 'exm1_ad_page',
					);	

			$exm1_textareas[] = array(
					'slug'=>'exm1_postend_advert',
					'default' => '',
					'label' => __('Post page under article Ad', 'examiner'),
					'section' => 'exm1_ad_page',
					);	

					
								
			foreach( $exm1_textareas as $exm1_textarea ) {
					
					
				$wp_customize->add_setting($exm1_textarea['slug'], array(
						'default'        => $exm1_textarea['default'],
						'capability'     => 'edit_theme_options',
						'type'           => 'option',
						'sanitize_callback' => 'exm1_ad_sanitize'
							
				));
					
				$wp_customize->add_control($exm1_textarea['slug'], array(
						'label'      => $exm1_textarea['label'],
						'section'    => $exm1_textarea['section'],
						'settings'   => $exm1_textarea['slug'],
						'type'    => 'textarea',
				));
					
			}




		
function exm1_sanitize($input) {return esc_html($input);}
function exm1_ad_sanitize($input) {return $input;}	
}


	


add_action( 'customize_register', 'exm1_customize' );
?>