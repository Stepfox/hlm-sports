<?php 
function remove_past_matches(){
		$now_date = current_time('timestamp');
			//Delete Matches
			$args = array(
			    'posts_per_page' => -1,
			    'post_type' => 'match',
			    'post_status' => 'publish', 
				'meta_key'			=> 'start_time',
				'orderby'			=> 'meta_value',
				'order'				=> 'ASC',
				'meta_query' => array(
						array('key' => 'start_time',
							'value'   => $now_date,
							'compare' => '<'),
				   			 ),
			);
			$hlm_sports_posts = new WP_Query($args);
			while($hlm_sports_posts->have_posts()) : $hlm_sports_posts->the_post();
			  	$page_name_id = get_the_ID();
			 	wp_delete_post( $page_name_id, true );
			endwhile;	

}


function remove_all_matches($sport){

			//Delete Matches
			$args = array(
			    'posts_per_page' => -1,
			    'post_type' => 'match',
			    'post_status' => 'publish',
          'tax_query' => array(
                array(
                    'taxonomy' => 'sports',
                    'field' => 'slug',
                    'terms' => $sport
                  )
             )   
			);
			$hlm_sports_posts = new WP_Query($args);
			while($hlm_sports_posts->have_posts()) : $hlm_sports_posts->the_post();
			  	$page_name_id = get_the_ID();
			 	wp_delete_post( $page_name_id, true );
			endwhile;	

}


function remove_all_matches_all(){

			//Delete Matches
			$args = array(
			    'posts_per_page' => -1,
			    'post_type' => 'match',
			    'post_status' => 'publish',
			);
			$hlm_sports_posts = new WP_Query($args);
			while($hlm_sports_posts->have_posts()) : $hlm_sports_posts->the_post();
			  	$page_name_id = get_the_ID();
			 	wp_delete_post( $page_name_id, true );
			endwhile;	

}





function crawl_matches($sport){





	$opts=array('http'=>array('method'=>"GET",'header'=>"Accept-language: en\r\n"."Cookie: odds_type=decimal\r\n",'user_agent'=>'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10.4; en-US; rv:1.9.2.28) Gecko/20120306 Firefox/3.6.28'));
	$context=stream_context_create($opts);

	$html = file_get_html('https://www.oddschecker.com/'.$sport,false,$context);




		$crawled_titles_number = count($html->find('.match-on .fixtures-bet-name'));

		//remove span text
		foreach($html->find('.match-on p.fixtures-bet-name span') as $row) {
			$row->innertext = '';
			$row->outertext = '';
		}


		for ($i=0; $i < $crawled_titles_number; $i+=2) { 

			$html->find('.match-on p.fixtures-bet-name', $i)->plaintext = str_replace("/"," & ", $html->find('.match-on p.fixtures-bet-name', $i)->plaintext);
			$html->find('.match-on p.fixtures-bet-name', $i + 1)->plaintext = str_replace("/"," & ", $html->find('.match-on p.fixtures-bet-name', $i + 1)->plaintext);



			$duplicate = 'unique';
			$title = $html->find('.match-on p.fixtures-bet-name', $i)->plaintext.' vs '.$html->find('.match-on p.fixtures-bet-name', $i + 1)->plaintext;
			if (substr($html->find('.match-on .link-right a', $i / 2)->href, 0, 1) === '/') { 

			$match_url = 'https://www.oddschecker.com'.$html->find('.match-on .link-right a', $i / 2)->href;
			}else{
			$match_url = 'https://www.oddschecker.com/'.$html->find('.match-on .link-right a', $i / 2)->href;
			}





		//check for duplicate
		            $args = array(
		                'post_type' => 'match',
		                'posts_per_page' => -1, 
		                's' => $title, 
		                'post_status' => 'publish',   
		            );
		            $lunar_magazine_posts = new WP_Query($args);
		            while($lunar_magazine_posts->have_posts()) : $lunar_magazine_posts->the_post();
		                // $page_name_id = get_the_ID();
		                // wp_delete_post( $page_name_id, true );
		                $duplicate = 'duplicate';
		            endwhile;   
		//create match
		        if($duplicate != 'duplicate'){
					$post= array('post_title' => $title, 'post_content' => '', 'post_status' => 'publish', 'post_type' => 'match' );
			 		$post_ID = wp_insert_post( $post );
			 		update_field( 'match_url', $match_url, $post_ID );


$teams = wp_set_object_terms( $post_ID, array($html->find('.match-on p.fixtures-bet-name', $i)->plaintext,  $html->find('.match-on p.fixtures-bet-name', $i + 1)->plaintext), 'teams', false );

$sports_tax = explode("/", $sport);

wp_set_object_terms( $post_ID, $sports_tax, 'sports', false );

					update_field( 'home_team', $teams[0], $post_ID );
					update_field( 'away_team', $teams[1], $post_ID );
// update_field( 'start_time', $html->find('.match-on .time .time-div .time-digits', $i)->plaintext, $post_ID );







				}

echo $i / 2;
echo '     ';
echo $match_url;
echo '     ';
echo $title;
echo '</br>';






		}







}








function crawl_table(){




		//check for duplicate
		            $args = array(
		                'post_type' => 'match',
		                'posts_per_page' => -1, 
		                'post_status' => 'publish',   
		            );
		            $lunar_magazine_posts = new WP_Query($args);
		            while($lunar_magazine_posts->have_posts()) : $lunar_magazine_posts->the_post();


	$opts=array('http'=>array('method'=>"GET",'header'=>"Accept-language: en\r\n"."Cookie: odds_type=decimal\r\n",'user_agent'=>'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10.4; en-US; rv:1.9.2.28) Gecko/20120306 Firefox/3.6.28'));
	$context = stream_context_create($opts);
	$match_url = get_field('match_url');

	$html = file_get_html($match_url,false,$context);



$crawl_date = $html->find('.date', 0)->plaintext;
$date_parts = explode(' ', $crawl_date);
$day = substr($date_parts[1], 0, -2);
$month = date('m',strtotime($date_parts[2]));
$year = get_the_date( 'Y' );
$time = $date_parts[4];
$fulldate_unix = mysql2date( 'U', $year.'-'.$month.'-'.$day.' '.$time.':00' );



		//$crawled_titles_number = count($html->find('.match-on .fixtures-bet-name'));


//the id of the table with odds
$table = $html->find('#t1', 0);


$rowData = array();
if (!empty($table)){
foreach($table->find('tr') as $row) {
    // initialize array to store the cell data from each row
    $flight = array();
    foreach($row->find('td') as $cell) {
        // push the cell's text to the array
        $flight[] = $cell->plaintext;
    }
    $rowData[] = $flight;
}
}
//var_dump($rowData);


		                 $page_name_id = get_the_ID();
		                // wp_delete_post( $page_name_id, true );
		                 echo get_the_title();
update_field( 'start_time', $fulldate_unix, $page_name_id );

		            $args1 = array(
		                'post_type' => 'bookmaker',
		                'posts_per_page' => -1, 
		                'post_status' => 'publish',   
		            );
		            $bookmakers_query = new WP_Query($args1);
		            $count = 0;
		            while($bookmakers_query->have_posts()) : $bookmakers_query->the_post();




		            		$bookmaker_crawl_order = get_field('bookmaker_crawl_order', get_the_ID());





		            		echo get_the_title();
		            		echo get_the_ID();
		            		echo $match_url;

		            		$value[$count]['win_odds'] = $rowData[0][$bookmaker_crawl_order];
		            		$value[$count]['draw_odds'] = $rowData[1][$bookmaker_crawl_order];
		            		$value[$count]['loss_odds'] = $rowData[2][$bookmaker_crawl_order];
		            		$value[$count]['bookmaker'] = get_the_ID();


		            		$count++;
		            endwhile; 

// save a repeater field value
$field_key = "winner_table";
// $value = array(
//     array(
//         "win_odds"	=> "2222",
//         "draw_odds"	=> "3333"
//     ),    array(
//         "win_odds"	=> "444",
//         "draw_odds"	=> "5555"
//     ),

// );
update_field( $field_key, $value, $page_name_id );


// update_sub_field( array('winner_table', 1, 'win_odds'), '1111' );
// update_sub_field( array('winner_table', 2, 'win_odds'), '1111' );






		            endwhile;  



}








function our_own_api($pick_league){

$url = 'http://market.exaloc.org/v1/pre-match/markets?categories='.$pick_league;



$request = wp_remote_get($url);
$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body, true );


	foreach ($data as $data_part) {

		$title = $data_part['teams'][0]['name'].' vs '.$data_part['teams'][1]['name'];
		$league = $data_part['league']['name'];

		//check for duplicate
					$duplicate = 'unique';
		            $args = array(
		                'post_type' => 'match',
		                'posts_per_page' => -1, 
		                's' => $title, 
		                'post_status' => 'publish',   
		            );
		            $check_duplicate_posts = new WP_Query($args);
		            while($check_duplicate_posts->have_posts()) : $check_duplicate_posts->the_post();
		                $duplicate = 'duplicate';
		            endwhile;   


				//Add Match
		        if($duplicate != 'duplicate'){
					$post= array('post_title' => $title, 'post_content' => '', 'post_status' => 'publish', 'post_type' => 'match' );
			 		$post_ID = wp_insert_post( $post );
			 		wp_set_object_terms( $post_ID, $league, 'leagues', false );
			 		
			 		$teams = wp_set_object_terms( $post_ID, array($data_part['teams'][0]['name'],  $data_part['teams'][1]['name']), 'teams', false );

			 		update_field( 'start_time', $data_part['startTime'], $post_ID );
					update_field( 'home_team', $teams[0], $post_ID );
					update_field( 'away_team', $teams[1], $post_ID );

					$args1 = array(
		                'post_type' => 'bookmaker',
		                'posts_per_page' => -1, 
		                'post_status' => 'publish',   
		            );
		            $bookmakers_query = new WP_Query($args1);
		            $count = 0;
		            while($bookmakers_query->have_posts()) : $bookmakers_query->the_post();
		            		$bookmaker_crawl_order = get_field('bookmaker_crawl_order', get_the_ID());
 							$bookmaker_number = 'none';
							for ($g=0; $g < 20; $g++) { 
								if($data_part['markets'][0]['bookies'][$g]['code'] == $bookmaker_crawl_order){ $bookmaker_number = $g;}
							}

		            		$value[$count]['bookmaker'] = get_the_ID();
		            		$value[$count]['win_odds'] = $data_part['markets'][0]['bookies'][$bookmaker_number]['bets'][0]['odds'];
		            		$value[$count]['draw_odds'] = $data_part['markets'][0]['bookies'][$bookmaker_number]['bets'][1]['odds'];
		            		$value[$count]['loss_odds'] = $data_part['markets'][0]['bookies'][$bookmaker_number]['bets'][2]['odds'];


		            		$count++;
		            endwhile; 

					$field_key = "winner_table";
					update_field( $field_key, $value, $post_ID );


				}

	}

}


































































function crawl_super_table($market = 'correct-score', $page_name_id){

		


	$opts=array('http'=>array('method'=>"GET",'header'=>"Accept-language: en\r\n"."Cookie: odds_type=decimal\r\n",'user_agent'=>'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10.4; en-US; rv:1.9.2.28) Gecko/20120306 Firefox/3.6.28'));
	$context = stream_context_create($opts);
	$match_url = str_replace('winner', $market, get_field('match_url', $page_name_id ));
	
	$html = file_get_html($match_url,false,$context);

if (!empty($html->find('#t1', 0))){

echo $match_url;
echo '</br>';


		//$crawled_titles_number = count($html->find('.match-on .fixtures-bet-name'));


//the id of the table with odds
$table = $html->find('#t1', 0);



$crawl_date = $html->find('.date', 0)->plaintext;
$date_parts = explode(' ', $crawl_date);
$day = substr($date_parts[1], 0, -2);
$month = date('m',strtotime($date_parts[2]));
$year = get_the_date( 'Y' );
$time = $date_parts[4];
$fulldate_unix = mysql2date( 'U', $year.'-'.$month.'-'.$day.' '.$time.':00' );


update_field( 'start_time', $fulldate_unix, $page_name_id );




$rowData = array();
if (!empty($table)){
foreach($table->find('tr') as $row) {
    // initialize array to store the cell data from each row
    $flight = array();

    foreach($row->find('td') as $cell) {
    	if(!empty($cell->find('.tcell .top-row')[0]->children[0]->attr['data-name'])){
			$flight[] = $cell->find('.tcell .top-row')[0]->children[0]->attr['data-name'];
        // push the cell's text to the array
    	}else{

    		$flight[] = $cell->plaintext;
    	}

    }
    if(array_filter($flight)){
    	$rowData[] = $flight;
	}
}
}
//var_dump($rowData);

	            

//title of the odd

//echo $rowData[$count][0];

//bookmaker crawl number

//echo $rowData[$count][$bookmaker_crawl_order];
$rowdata_count = count($rowData) - 1;


for ($i = 0; $i <= $rowdata_count; $i++) {

	foreach($rowData[$i] as $hhh) {
	        // push the cell's text to the array
	        	$gggg[$i]['odd_list'][] = array('odd' => $hhh);       	
	}

}

       

return $gggg;
}else{

	return  'none';
}




}

function crawl_full_football_game(){





		$page_name_id = get_the_ID();

        $tax_terms = get_the_terms( get_the_ID(), 'sports' );
                   


// foreach($tax_terms as $term) {
//     if ($term->parent === 0) { // avoid parent categories
//         $sport_crawl = $term;
//     }
// }

// $market = array();
// if( have_rows('crawl_markets', $sport_crawl ) ):
//    while ( have_rows('crawl_markets', $sport_crawl ) ) : the_row();
//    	$market[] = get_sub_field('market');
                    
// 	endwhile;
// endif;

                

	$opts=array('http'=>array('method'=>"GET",'header'=>"Accept-language: en\r\n"."Cookie: odds_type=decimal\r\n",'user_agent'=>'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10.4; en-US; rv:1.9.2.28) Gecko/20120306 Firefox/3.6.28'));
	$context = stream_context_create($opts);
	$match_url = str_replace('winner', 'betting-markets', get_field('match_url', $page_name_id ));

	$html = file_get_html($match_url,false,$context);


$markets = $html->find('#mc', 0);


			$count = 0;

			foreach($markets->find('li a') as $row) {
				if ($count < 100){
           		$market[] =  end(explode('/',$row->href));	 
           		echo   end(explode('/',$row->href)); 
           		echo '</br>';
           		}
           		$count++;
                }

			$market = array_unique($market);



			$i = 0;
			foreach ($market as $key => $value) {
				$see_if_empty = crawl_super_table($value, $page_name_id);
				
				if($see_if_empty == 'none'){
					echo 'its empty </br>';
				}else{
					$crawl_full[$i]['odds_lists'] = crawl_super_table($value, $page_name_id);
					$crawl_full[$i]['name_of_the_table'] = $value;			
				$i++;
				}
			}

			// echo $page_name_id;
			//save a repeater field value
			// $field_key = "super_table";
			$value = $crawl_full;


			// delete_post_meta($page_name_id, 'lice_za_kontakt');
			if ( ! add_post_meta( $page_name_id, 'lice_za_kontakt', $value, true ) ) { 
			   update_post_meta ( $page_name_id, 'lice_za_kontakt', $value );
			}

			$now_date = current_time('timestamp');

			if ( ! add_post_meta( $page_name_id, 'last_crawled', $now_date, true ) ) { 
			   update_post_meta ( $page_name_id, 'last_crawled', $now_date );
			}

the_title();
echo ' Done!</br>';




}











function convert_winner_table(){




		//check for duplicate
		            $args = array(
		                'post_type' => 'match',
		                'posts_per_page' => -1, 
		                'post_status' => 'publish',   
		            );
		            $lunar_magazine_posts = new WP_Query($args);
		            while($lunar_magazine_posts->have_posts()) : $lunar_magazine_posts->the_post();


		$page_name_id = get_the_ID();
		$test = get_post_meta( get_the_ID(), 'lice_za_kontakt', true );

$winner_odds = array();
		foreach ($test as $key){
			if($key['name_of_the_table'] == 'winner' ){
			foreach($key['odds_lists'] as $odds_lists){
				$list_number = 0;
				$winner_odds[$list_number][] = $odds_lists['odd_list'];
				$list_number++;
			}
			}
		}



		            $args1 = array(
		                'post_type' => 'bookmaker',
		                'posts_per_page' => -1, 
		                'post_status' => 'publish',   
		            );
		            $bookmakers_query = new WP_Query($args1);
		            $count = 0;
		            while($bookmakers_query->have_posts()) : $bookmakers_query->the_post();




		            		$bookmaker_crawl_order = get_field('bookmaker_crawl_order', get_the_ID());


		            		$value[$count]['win_odds'] = $winner_odds[0][0][$bookmaker_crawl_order]['odd'];
		            		$value[$count]['draw_odds'] = $winner_odds[0][1][$bookmaker_crawl_order]['odd'];
		            		$value[$count]['loss_odds'] = $winner_odds[0][2][$bookmaker_crawl_order]['odd'];
		            		$value[$count]['bookmaker'] = get_the_ID();


		            		$count++;
		            endwhile; 


$field_key = "winner_table";

update_field( $field_key, $value, $page_name_id );

endwhile;  



}






/*


function get_team_images_from_google($team_search = "winningsportsbets"){
    
    $html = file_get_html( "https://www.shutterstock.com/search?search_source=base_landing_page&language=en&searchterm=".$search_query."&image_type=all" );
    $images = $html->find('img');
    $image_count = 2; //Enter the amount of images to be shown
    $i = 0;
    foreach($images as $image){
        if($i == $image_count) break;
        $i++;
        // DO with the image whatever you want here (the image element is '$image'):
        
        $image_list[] = $image->src;
	}

	return $image_list[1];

}



	function get_team_images_from_google_for_all_teams(){

						$tax_terms = get_terms('teams', array('hide_empty' => '0'));      
                       foreach ( $tax_terms as $tax_term ){


                                $sport_crawl = $tax_term->name;
                                $parentId = $tax_term->parent;
                                if(!empty($parentId)){
                                $parentObj = get_term_by('id', $parentId, 'sports');
                                    $sport_crawl = $parentObj->name.' '.$tax_term->name;

                                    $main_parentId = $parentObj->parent;
                                    if(!empty($main_parentId)){
                                        $main_parentObj = get_term_by('id', $main_parentId, 'sports');                                      
                                        $sport_crawl = $main_parentObj->name.' '.$parentObj->name.' '.$tax_term->name;
                                    }

                                }







                       			$img = hlm_autoimage_upload( get_team_images_from_google($sport_crawl ));
								update_field( 'flag', $img, $tax_term);

                          }

	}




function hlm_autoimage_upload( $image_url  ){
    $upload_dir = wp_upload_dir();
    $image_data = wp_remote_get($image_url);
	$image_data = wp_remote_retrieve_body( $image_data );
    $filename = basename($image_url);
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
	global $wp_filesystem;
	WP_Filesystem(); // Initial WP file system
	$wp_filesystem->put_contents( $file, $image_data );
    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    return $attach_id;
}

*/



?>