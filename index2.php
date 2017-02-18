<?php

if (!isset($_REQUEST['id'])) {
	header("location:index.php");
}

?>


<?php
include('header.php');
?>


<?php

		include('connection.php');
		$statement = $db->prepare("SELECT * FROM table_post WHERE post_id=?");
	    $statement->execute(array($_REQUEST['id']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row){
?>

<div class="post">
				<h2><?php echo $row['post_title'];?></h2>
				<div>
				<span class="date">
					<?php

					$post_date = $row['post_date'];
					$day = substr($post_date,8,2);
					$month = substr($post_date,5,2);
					$year = substr($post_date,0,4);
					if($month=='01') {$month="Jan";}
					if($month=='02') {$month="Feb";}
					if($month=='03') {$month="Mar";}
					if($month=='04') {$month="Apr";}
					if($month=='05') {$month="May";}
					if($month=='06') {$month="Jun";}
					if($month=='07') {$month="Jul";}
					if($month=='08') {$month="Aug";}
					if($month=='09') {$month="Sep";}
					if($month=='10') {$month="Oct";}
					if($month=='11') {$month="Nov";}
					if($month=='12') {$month="Dec";}
					echo $day.' '.$month.', '.$year;


					?>

				</span>
				<span class="categories">
					Tags:&nbsp;	
					<?php

					$arr = explode(",",$row['tag_id']);
					$count_arr = count(explode(",",$row['tag_id']));
					$k=0;
					for($j=0;$j<$count_arr;$j++)
					{
										
					$statement1 = $db->prepare("SELECT * FROM table_tag WHERE tag_id=?");
					$statement1->execute(array($arr[$j]));
				    $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
					foreach($result1 as $row1)
					{
					$arr[$k] = $row1['tag_name'];
					}
					$k++;
					}
					$tag_names = implode(",",$arr);
					echo $tag_names;
					?>
				</span>
				</div>
				<div class="description">
				<p>
				<a class="fancybox" href="uploads/<?php echo $row['post_image']; ?>" title=""><img src="uploads/<?php echo $row['post_image'];?>" style=" margin-left: 100px" alt="" width="239"/></a>
				<div style="clear: both;"></div>
				<?php echo $row['post_description']; ?>
				</p>
				</div>
				<p><img src="images/photo1.jpg" alt="" width="511" height="310" /></p>
				<p>Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. Aenean sit amturpis. Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorpermassa, cosectetuer feipsum eget pede. Proin nunc. </p>
				<p><img src="images/photo2.jpg" alt="" width="511" height="310" /></p>
				<p>Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. Aenean sit amturpis. Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorpermassa, cosectetuer feipsum eget pede. Proin nunc. </p>
			</div>

<?php		
}
?>

			<div id="comments">
				<img src="images/title3.gif" alt="" width="216" height="39" /><br />		<div class="inner_copy"><a href="http://www.bestfreetemplates.org/">free templates</a><a href="http://www.bannermoz.com/">banner templates</a></div>
				<div class="comment">
					<div class="avatar">
						<img src="images/avatar1.jpg" alt="" width="80" height="80" /><br />
						<span>Name User</span><br />
						April 15th
					</div>
					<p>Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. Aenean sit amturpis. Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorpermassa, cosectetuer feipsum eget pede. Donec nonummy, tellus er sodales enim, in tincidunmauris in odio. </p>
				</div>
				<div class="comment">
					<div class="avatar">
						<img src="images/avatar2.gif" alt="" width="80" height="80" /><br />
						<span>Name User</span><br />
						April 12th
					</div>
					<p>Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. </p>
				</div>
				<div id="add">
					<img src="images/title4.gif" alt="" width="216" height="47" class="title" /><br />
					<div class="avatar">
						<img src="images/avatar2.gif" alt="" width="80" height="80" /><br />
						<span>Name User</span><br />
						April 12th
					</div>
					<div class="form">
						<form action="#">
							<textarea>Your Message...</textarea><br />
							<input type="text" value="Name" /><br />
							<input type="text" value="E-mail" /><br />
							<input type="text" value="URL (Optional)" /><br />
							<a href="#"><img src="images/button.gif" alt="" width="94" height="27" /></a>
						</form>
					</div>
				</div>
			</div>

<?php

include('footer.php');
?>