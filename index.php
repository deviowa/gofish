<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Go Fish</title>
<!-- 	
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="gofish.js"></script> 
-->
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	
	<?

	$NUM_PLAYERS = 4;
	$NUM_CARDS = 7;

	//create our deck
	$deck = glob('cards/*.png');

	//shuffle the deck
	shuffle($deck);

	//deal cards
	$players = array();
	for($p=0; $p<$NUM_PLAYERS; $p++){
		//create a new player (list/hand of cards)
		$player = array();

		//give player cards from the deck
		for($i=0; $i<$NUM_CARDS; $i++){
			$card = array_pop($deck); // remove card from deck
			array_push($player, $card); // add that card to the players hand
		}

		//add player to the list of players
		array_push($players, $player);
	}




	function render_hand($hand){
		echo "<div class='hand'>";

		foreach($hand as $card){
			echo "
				<a href='select_card.php?card=$card'>
					<img src='$card'>
				</a>
			";
		}
		echo "</div>";
	}


	//generate HTML to show cards
	for($i=0; $i<$NUM_PLAYERS; $i++){
		$player_id = $i + 1;
		echo "<div class='player-section' data-playerid='$i'>";
		echo "<h2> Player $player_id </h2>";
		render_hand($players[$i]);
		echo "</div>";
	}

	echo "<h2>Deck</h2>";
	render_hand($deck);

	?>



</body>
</html>
