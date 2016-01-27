<?php include ('header.php'); 
		error_reporting();
		require 'includes/connection.php';
		$result = $db->query("SELECT * FROM people");
		$immediate = $db->query("SELECT * FROM people WHERE relation_type = 'immediate'");
		$distant = $db->query("SELECT * FROM people WHERE relation_type = 'distant'");
		$row_count = $result->num_rows;

		$all_results = $result->fetch_all();

/*		$immediate = array_map(function($item){
			if($item[4] == "immediate"){
				return $item;
			}
		}, $all_results);

		$distant = array_map(function($item){
			if($item[4] == "distant"){
				return $item;
			}
		}, $all_results);

		$friends = array_map(function($item){
			if($item[4] == "friends"){
				return $item;
			}
		}, $all_results);

		$immediate = array_filter($immediate, function($item){
			if(!is_null($item)){
				return $item;
			}
		});

		$friends = array_filter($friends, function($item){
			if(!is_null($item)){
				return $item;
			}
		});

		$distant = array_filter($distant, function($item){
			if(!is_null($item)){
				return $item;
			}
		});*/

		// echo print_r($immediate);
		// print_r($distant);
		// echo $row_count;
?>

<section id="people_page" class="pages">
	<aside>
		<div class="aside">
			<div class="heading">My People</div>
			<ul>
				<li class="outter_list">Family</li>
				<li class="inner_list"><ul>
					<li><a href="#immediate_family">Immediate</a></li>
					<li><a href="#distant_family">Distant</a></li>
				</ul></li>
				<li class="outter_list">Friends</li>
				<li class="inner_list"><ul>
					<li><a href="#friends">Close</a></li>
					<li><a href="#friends">General</a></li>
				</ul></li>
			</ul>
		</div>
	</aside>
	<main>
		<h1 id="immediate_family">Immediate Family</h1>
		<?php 
		for ($i = 0; $i < $immediate->num_rows; $i++) {
			$rows = $immediate->fetch_object(); ?>
		<div class="immediate_row">
			<img src="images/profile-pic.jpg" alt="profile pic" />
			<div class="content">
				<div class="name"><span><?= $rows->name ?></span> (<?= $rows->relation ?>)</div>
				<article><?= $rows->description ?></article>
			</div>
		</div>
		<?php } ?>

		<h2 id="distant_family">Distant Family</h2>
		<?php for ($r = 0; $r < 2; $r++) { ?>
		<div class="distant_row">
			<?php for ($i = 0; $i < 2; $i++) {
			$rows = $distant->fetch_object(); ?>
			<div class="distant_col">
				<div class="name"><?= $rows->name ?> <span>(<?= $rows->relation ?>)</span></div>
				<img src="images/profile-pic.jpg" alt="profile pic" />
				<div class="content">
					<article><?= $rows->description ?></article>
				</div>
			</div>
			<?php } ?>
		</div> <!-- end distant row -->
		<?php } ?>

		<div class="showmore_distant show_distant">Show More</div>
		<div class="showless_distant show_distant">Show Less</div>
		<div class="more_distant">
			<?php for ($r = 0; $r < floor($distant->num_rows/2-2); $r++) { ?>
			<div class="distant_row">
				<?php for ($i = 0; $i < 2; $i++) {
				$rows = $distant->fetch_object(); ?>
				<div class="distant_col">
					<div class="name"><?= $rows->name ?> <span>(<?= $rows->relation ?>)</span></div>
					<img src="images/profile-pic.jpg" alt="profile pic" />
					<div class="content">
						<article><?= $rows->description ?></article>
					</div>
				</div>
				<?php } ?>
			</div> <!-- end distant row -->
			<?php } ?>
		</div>

		<h3 id="friends">Friends</h3>
		<?php for ($r=0; $r<3; $r++) { ?>
		<div class="friends_row">
			<?php for ($i=0; $i<3; $i++) { ?>
			<div class="friends_col">
				<div class="name">Justin Tanacredi</div>
				<img src="images/profile-pic.jpg" alt="profile pic" />
				<p>Justin is the man. He knows how to code many things. You should check out his website where he talks about how he can do many things. Oh and he plays peach.</p>
			</div>
			<?php } ?>
		</div> <!-- end friends row -->
		<?php } ?>
	</main>
</section>

<?php include ('footer.php'); ?>