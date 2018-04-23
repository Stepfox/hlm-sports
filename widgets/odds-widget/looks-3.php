<?php



//coupons origin -> link do 5te sajta
// $url = 'http://api.exaloc.org/v1/pre-match/markets?categories=54a229fad443afef088b45c9,54a229f8d443afef088b45b1&bookmakers=14&to=2018-03-20';

// $request = wp_remote_get($url);
// $body = wp_remote_retrieve_body( $request );
// var_dump($request);
// $data = json_decode( $body );

// $count =  count((array)$data);
// echo $count;
// echo $data[0]->id;

//var_dump($data);

// for ($i=0; $i < $count; $i++) { 
// 	echo 'ID:';
// 	echo $data[$i]->id;
// 	echo '</br>';

// 	echo 'startTime:';
// 	echo $data[$i]->startTime;
// 	echo '</br>';

// 	echo 'markets:';
// 	echo $data[$i]->markets;
// 	echo '</br>';

// 	echo 'teams:';
// 	echo $data[$i]->teams;
// 	echo '</br>';


// }


// foreach ($data as $data_part) {
// var_dump($data_part);

// 	# code...
// }




/*

//GET ELEMENTS

// Create DOM from URL or file
$html = file_get_html('http://www.google.com/');

// Find all images 
foreach($html->find('img') as $element) 
       echo $element->src . '<br>';

// Find all links 
foreach($html->find('a') as $element) 
       echo $element->href . '<br>';





//MODIFY ELEMENTS


// Create DOM from string
$html = str_get_html('<div id="hello">Hello</div><div id="world">World</div>');

$html->find('div', 1)->class = 'bar';

$html->find('div[id=hello]', 0)->innertext = 'foo';

echo $html; // Output: <div id="hello">foo</div><div id="world" class="bar">World</div>





//EXTRACT CONTENT


// Dump contents (without tags) from HTML
echo file_get_html('http://www.google.com/')->plaintext; 




PLAN

custom type firmi
	-najk
	-adidas
	-mikrosof

custom type Firma da receme najk
	-tempirani postovi se brishat samite na 4 saata
	-custom fields
		-adresata za crawl ->mirosoft/sales
		-poleto za crawl ->
			-cena
			-procent
			-biloshto
	-save na post kako afiliejt

GG



------





------

@media screen and (max-width: 708px){
	.embed-wrapper iframe {
	    width: 100%;
	    height: 100%;
	    min-height: 200px;
	}
}
*/

// 	echo "'";
// 	echo $i;
// 	echo "'";
// 	echo '</br>';
// }

$crawl_url = 'https://www.rt.com';

//$title =  


$names = array('snowden','serbia','bulgaria');

//	foreach($names as $name){
//for ($i=0; $i < 8; $i++) { 
// Create DOM from URL or file
//$html = file_get_html('https://blackfriday.dailymail.co.uk/all-deals/sesarch/'.$i.'/');
//	$html = file_get_html('https://www.rt.com/search?q='.$name.'/');


$opts=array('http'=>array('method'=>"GET",'header'=>"Accept-language: en\r\n"."Cookie: odds_type=decimal\r\n",'user_agent'=>'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10.4; en-US; rv:1.9.2.28) Gecko/20120306 Firefox/3.6.28'));
$context=stream_context_create($opts);


$html = file_get_html('https://www.oddschecker.com/football/english/fa-cup/wigan-v-southampton',false,$context);

/*

staveni default auto
	-dvoglasnik part tips and roumors so vote sistem like dislajk (mnogu dislajks peplosuvaat)
	-na sekoj bookmaker se stava oznakata odnosno klasata na elementite
	-betting odds  reg custom postove
	-taxonomii sportovi
	-napravi match postovi od lista donesena od sportot
	-foreach bookmakers od custom post type(default popunuvanje tabelata)
	-popuni odds
	-izbrishi post










Tabela so tabovi calculator

				[Alternative Odds u 1-1, 3+, p1]
							 		1 				x 				2
									best-odd	best-odd 		best-odd			HOMETEAM	50$	[bet now]-->bookmaker bet365	
				bet365				1.2				1.4				1.6					logo
				willhill			1.4				1.4				1.6				DRAW logo		[bet now]
				888					1.4				1.4				1.6				AWAYTEAM		[bet now]
				10bet				1.4				1.4				1.6					Logo

													SURE WINNINGS CALCULATOR   [number]  [calclulate best odds] 



*/


// Find all images 
	// foreach($html->find('#oddsTableContainer') as $element) {
 //       echo $element . '<br>';
	// }
//crawl_matches();

crawl_table();

//}








//treba da se regne u functions da ima endpoint deals types
//moze da se zoba bez problem sea :D
// 
/*

$post_id = '1973';

//coupons origin -> link do 5te sajta
$url = 'http://stephog.ddns.net/cuponation/wp-json/wp/v2/deals/1973';

$request = wp_remote_get($url);
$body = wp_remote_retrieve_body( $request );
var_dump($request);
$data = json_decode( $body );

echo $data->date;
	echo '</br>' ;
echo $data->_cupd_retailer[0];
	//echo '</br>' ;
echo $data->_cupd_expiring_datetime[0];
	echo '</br>' ;
echo $data->_cupd_picked[0];
	echo '</br>' ;
echo $data->_cupd_before_price[0];
	echo '</br>' ;
echo $data->_thumbnail_id[0];
	echo '</br>' ;
echo $data->_cupd_image_alt[0];
	echo '</br>' ;
echo $data->_cupd_current_price[0];
	echo '</br>' ;
echo $data->_cupd_before_price[0];
	echo '</br>' ;
echo $data->deal_hashed_deeplink_id[0];
	echo '</br>' ;
	var_dump($data);
*/



/*

$retailer_args = array('post_type' => 'retailers', 'posts_per_page'=> '6', 'orderby' => 'rand' );
//mesto za edit na opcii
//so slika ili bez
//broj na postovi za display
//




$retailer_query = new WP_Query($retailer_args);
	while ( $retailer_query->have_posts()) : $retailer_query->the_post();
		$the_retailer_id = get_the_ID();
		echo 'FIRMATA';
			$the_deal_query = new WP_Query(array('post_type' => 'deals', 'posts_per_page'=> '1', 'meta_key' => '_cupd_retailer', 'meta_value' => $the_retailer_id ));
			while ( $the_deal_query->have_posts()) : $the_deal_query->the_post();

			echo 'POPUSTOT';
			endwhile;

	echo '</br>';
	endwhile;	
*/

// wp_remote_get()
// wp_remote_head() 
// wp_remote_retrieve_body()









// $retailers_drop_downs = array();
// for ($i=0; $i < 3; $i++) { 
// 	    $retailers_drop_downs[] = array(
// 	         'type' => 'dropdown'.$i,
// 	         'holder' => 'div',
// 	         'class' => '',
// 	         'heading' => __('Retailers'),
// 	         'param_name' => 'retailers_array'.$i,
// 	         //'value' => $retailers_array,
// 	         'description' => __('Select Retailer')
// 	      );
	    
// }

// //$retailers_drop_downs = array_reduce($retailers_drop_downs[0], 'array_merge', array());
// //var_dump($retailers_drop_downs[0]);


// for ($i=0; $i < 21; $i++) { 
// 	echo "'";
// 	echo $i;
// 	echo "'";
// 	echo '</br>';
// }







 ?>

