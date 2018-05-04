<?php

/*
add image

"id":"54a22a0cd443afef088b46db","name":"World Cup"
"id":"54a22a10d443afef088b4719","name":"Friendly Internationals"
"id":"576243ab1d142240108b4575","name":"Premier League"
"id":"576243df1d142240108b471d","name":"Championship"
"id":"54a229fad443afef088b45c9","name":"Bundesliga"
"id":"54a229fcd443afef088b45f0","name":"Serie A"
"id":"54a229f9d443afef088b45bc","name":"Ligue 1"
"id":"576250f41d142264208b4795","name":"Primera Division"





*/


//$categories = '54a229f8d443afef088b45b4';
//54a229f5d443afef088b4588
//$bookmakers = '43';

$number_of_games = '5';


$filter_categories = 'categories='.$categories ;
//$filter_bookmakers = 'bookmakers='.$bookmakers ;
//$filter_from = 'from='.$from ;
//$filter_to = 'to='.$to ;



$url = 'http://api.exaloc.org/v1/pre-match/markets?'.$filter_categories.'&'.$filter_bookmakers;

$url = 'http://api.exaloc.org/v1/pre-match/markets?'.$filter_categories;




?>

<div class="odds-widget">
	<div class="odds-widget-bookmakers">
		<div class="odds-sports-wrap">
			<div class="odds-widget-sports">
				<?php    
if( $categories == '54a22a0cd443afef088b46db'){$league_logo = 'world-cup.png';}
if( $categories == '54a229f8d443afef088b45b4'){$league_logo = 'premier-league.png';}
if( $categories == '54a229fcd443afef088b45f0'){$league_logo = 'serie-a.png';}
if( $categories == '54a229fad443afef088b45c9'){$league_logo = 'bundesliga.png';}



// '54a22a10d443afef088b4719' => 'Friendly Internationals',

// '576243df1d142240108b471d' => 'Championship',


// '54a229f9d443afef088b45bc' => 'Ligue 1',
// '576250f41d142264208b4795' => 'Primera Division',


				?>
<img src="<?php echo get_stylesheet_directory_uri().'/widgets/odds-widget/logos/'.$league_logo; ?>"/>

			</div>
		</div>
	<ul class="odds-widget-bookmakers-links">

<?php 

$bookmakers_id_array = array(
						
						$sport888_id,
						$williamhill_id,
						$betathome_id,
						$bethard_id,
						$bet365_id
					);


						$bookmakers = get_posts(array(
							'post_type' => 'bookmaker',
							'post__in' => $bookmakers_id_array,
							'order'   => 'ASC'
						));



foreach( $bookmakers as $bookmaker ){ 

	$photo = get_field('logo_136x44', $bookmaker->ID);

	?>
	<li>
		<a href="<?php echo get_permalink( $bookmaker->ID ); ?>">
			<div class="odds-widget-bookmakers-links-logo bookmaker-background-wrap-<?php echo $bookmaker->ID; ?>">		 
				<img src="<?php echo $photo['sizes']['hlm_sports_136x44']; ?>" alt="<?php echo $photo['alt']; ?>" />		
			</div>									
		</a>
				<a href="<?php echo the_field( 'default_tracker', $bookmaker->ID); ?>" target="_blank">
					<div class="odds-widget-bookmakers-links-button top-5-review-bet-now">
                    	<?php the_field('bet_now', 'option');  ?>
					</div>
                </a>
	</li>
<?php 

}





 ?>
	</ul>		

	</div>



	<ul>

<?php 

$request = wp_remote_get($url);
$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body, true );






$count = 0;


foreach ($data as $data_part) {
if(++$count > $number_of_games) break;
 ?>
	<li>
		<div class="odds-date">
			<?php 
				$myDateTime = strtotime($data_part['startTime']);
				echo date ('l F d',$myDateTime);
			?>
		</div>
		<div class="odds-game-wrap">
			<div class="odds-game-time">
				<?php echo date ('H i A',$myDateTime); ?>
			</div>
			<div class="odds-game-teams">
				<div class="odds-game-home-team">
					<div class="odds-game-home-team-name">
						<?php echo $data_part['teams'][0]['name']; ?>
					</div>
				</div>
				<div class="odds-game-away-team">
					<div class="odds-game-away-team-name">
						draw
					</div>
				</div>
				<div class="odds-game-away-team">
					<div class="odds-game-away-team-name">
						<?php echo $data_part['teams'][1]['name']; ?>
					</div>
				</div>
			</div>
		</div>

	<div class="odds-widget-bookmakers">
	<ul>

<?php 

	for ($g=0; $g < 10; $g++) { 
//if($data_part['markets'][0]['bookies'][$g]['code'] == 'exaloc'){ $exaloc = $g; }
if($data_part['markets'][0]['bookies'][$g]['code'] == 'sport888'){ $sport888 = $g;}
if($data_part['markets'][0]['bookies'][$g]['code'] == 'williamhill'){ $williamhill = $g; }
if($data_part['markets'][0]['bookies'][$g]['code'] == 'betathome'){ $betathome = $g; }
if($data_part['markets'][0]['bookies'][$g]['code'] == 'bethard'){ $bethard = $g; }
if($data_part['markets'][0]['bookies'][$g]['code'] == 'bet365'){ $bet365 = $g; }

}


$bookmakers_array = array(
						//$exaloc,
						$sport888,
						$williamhill,
						$betathome,
						$bethard,
						$bet365
					);

foreach($bookmakers_array as $item){
	if(!empty($item)){
 ?>



	<li>
					<div class="odds-game-home-team-odd">
						
						<?php

						 echo $data_part['markets'][0]['bookies'][$item]['bets'][0]['odds']; ?>
					</div>
					<div class="odds-game-away-team-odd">
						
						<?php echo $data_part['markets'][0]['bookies'][$item]['bets'][1]['odds']; ?>
					</div>		
					<div class="odds-game-away-team-odd">
						
						<?php echo $data_part['markets'][0]['bookies'][$item]['bets'][2]['odds']; ?>
					</div>		

		
	</li>
<?php } else{ ?>


	<li>
					<div class="odds-game-home-team-odd">
							*
					</div>
					<div class="odds-game-away-team-odd">
							*
					</div>		
					<div class="odds-game-away-team-odd">
							*
					</div>	
		
	</li>



<?php } } ?>


	</ul>		

	</div>

	</li>
<?php 

}





 ?>
	</ul>
</div>
