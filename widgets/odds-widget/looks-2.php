<?php






$categories = '54a22a24d443afef088b4836';
$bookmakers = '43';




$filter_categories = 'categories='.$categories ;
$filter_bookmakers = 'bookmakers='.$bookmakers ;
//$filter_from = 'from='.$from ;
//$filter_to = 'to='.$to ;



$url = 'http://api.exaloc.org/v1/pre-match/markets?'.$filter_categories.'&'.$filter_bookmakers;



//coupons origin -> link do 5te sajta
// $url = 'http://api.exaloc.org/v1/pre-match/markets?categories=54a229fad443afef088b45c9,54a229f8d443afef088b45b1&bookmakers=14&to=2018-03-20';
//$url = 'http://api.exaloc.org/v1/pre-match/bookmakers';
$url = 'http://api.exaloc.org/v1/pre-match/categories';










$request = wp_remote_get($url);
$body = wp_remote_retrieve_body( $request );
//var_dump($request);
$data = json_decode( $body, true );

// $count =  count((array)$data);
// echo $count;
// echo $data[0]->id;

//var_dump($data);

// echo $data[0]->id;

for ($i=0; $i < $count; $i++) { 
	// echo 'ID:';
	// echo $data[$i]->id;
	// echo '</br>';

	// echo 'startTime:';
	// echo $data[$i]->startTime;
	// echo '</br>';

	// echo 'markets:';
	// echo $data[$i]->markets;
	// echo '</br>';

	// echo 'teams:';
	// echo $data[$i]->teams;
	// echo '</br>';


}


// foreach ($data as $data_part) {
// var_dump($data_part);
// $count =  count((array)$data_part['sub']);
// for ($i=0; $i < $count; $i++) { 
// 	echo 'ID:';
// 	echo $data_part['sub'][$i]['id'];
// 	echo '</br>';

// 	echo 'Name:';
// 	echo $data_part['sub'][$i]['name'];
// 	echo '</br>';


// 	// echo 'startTime:';
// 	// echo $data_part[$i]->startTime;
// 	// echo '</br>';

// 	// echo 'markets:';
// 	// echo $data_part[$i]->markets;
// 	// echo '</br>';

// 	// echo 'teams:';
// 	// echo $data_part[$i]->teams;
// 	// echo '</br>';


// }
// 	# code...
// }

?>

<div class="odds-widget">
	<div class="odds-widget-bookmakers">
		<div class="odds-sports-wrap">
			<div class="odds-widget-sports">
<!-- Sports -->
<?php $url = 'http://api.exaloc.org/v1/pre-match/categories'; 

$request = wp_remote_get($url);
$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body, true );

$options = array();

foreach ($data as $data_part) {
//var_dump($data_part);
$count =  count((array)$data_part['sub']);
	for ($i=0; $i < $count; $i++) { 
		$options[$data_part['sub'][$i]['id']] = $data_part['sub'][$i]['name'];
	}

}

?>


<p>
	
	<select class="widefat" >
		<?php 
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>'><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>
			</div>
			<div class="odds-widget-spread">
				SPREAD
			</div>
		</div>
	<ul>

<?php 

for ($i=0; $i < 10; $i++) { ?>
	<li>
		<div class="bookmaker-logo">
			<img src="http://hlm-sports-betting.local/wp-content/uploads/2018/03/betathome-136x44.gif" alt="">
		</div>
<div class="top-5-review-bet-now">
                    		Bet
						</div>
	</li>
<?php 

}





 ?>
	</ul>		

	</div>



	<ul>

<?php 

$url = 'http://api.exaloc.org/v1/pre-match/markets?categories=54a229fad443afef088b45c9'; 

$request = wp_remote_get($url);
$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body, true );









foreach ($data as $data_part) {
// var_dump($data_part['markets'][0]['bookies']);
 ?>
	<li>
		<div class="odds-date">
			<?php echo $data_part['startTime']; 
			echo '</br>';
$myDateTime = strtotime($data_part['startTime']);
			echo $myDateTime; 
echo date ('H:i',$myDateTime);

			
			echo date("l");
			?>
		</div>
		<div class="odds-game-wrap">
			<div class="odds-game-time">
				<?php echo $data_part['startTime']; ?>
			</div>
			<div class="odds-game-teams">
				<div class="odds-game-home-team">
					<div class="odds-game-home-team-id">
						101
					</div>
					<div class="odds-game-home-team-name">
						<?php echo $data_part['teams'][0]['name']; ?>
					</div>
				</div>

				<div class="odds-game-away-team">
					<div class="odds-game-away-team-id">
						101
					</div>
					<div class="odds-game-away-team-name">
						<?php echo $data_part['teams'][1]['name']; ?>
					</div>
				</div>
			</div>
		</div>

	<div class="odds-widget-bookmakers">
	<ul>

<?php 

$count =  count((array)$data_part['markets'][0]['bookies']);
	for ($g=0; $g < $count; $g++) { 
		echo $data_part['markets'][0]['bookies'][$g]['name'];
	}
	



for ($s=0; $s < 10; $s++) { ?>
	<li>
					<div class="odds-game-home-team-odd">
						101
					</div>
					<div class="odds-game-away-team-odd">
						101
					</div>		
	</li>
<?php 

}





 ?>
	</ul>		

	</div>

	</li>
<?php 

}





 ?>
	</ul>
</div>
