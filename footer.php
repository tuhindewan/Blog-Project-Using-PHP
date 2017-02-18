</div>
		<div id="sidebar">
		    <div id="search">
				<input type="text" value="Search"> <a href="#"><img src="images/go.gif" alt="" width="26" height="26" /></a>																																																																										<div class="inner_copy"><a href="http://www.bestfreetemplates.info/flash.php">free flash templates</a><a href="http://www.beautifullife.info/web-design/15-best-free-website-builders/">best free web builders</a></div>
			</div>
			<div class="list">
				<img src="images/title1.gif" alt="" width="186" height="36" />
				<ul>

				<?php
				include 'connection.php';

				$statement = $db->prepare("SELECT * FROM table_category ORDER BY Cat_name ASC");
			    $statement->execute();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row){ 

					?>

					<li><a href="#"><?php echo $row ['Cat_name'];?></a></li>

				<?php
				}

				?>

				</ul>
				<img src="images/title2.gif" alt="" width="180" height="34" />
				<ul>
					<li><a href="#">January</a></li>
					<li><a href="#">July</a></li>
					<li><a href="#">February</a></li>
					<li><a href="#">August</a></li>
					<li><a href="#">March</a></li>
					<li><a href="#">September</a></li>
					<li><a href="#">April</a></li>
					<li><a href="#">October</a></li>
					<li><a href="#">May</a></li>
					<li><a href="#">November</a></li>
					<li><a href="#">June</a></li>
					<li><a href="#">December</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="footer">
		<p>
			<?php
			include 'connection.php';

		$statement = $db->prepare("SELECT * FROM table_footer WHERE id=1");
	    $statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row){

			echo $row['description'];
		}

		?>
		</p>																								<
	</div>
</body>
</html>
