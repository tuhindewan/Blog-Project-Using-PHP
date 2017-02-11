<?php
ob_start();
session_start();
if($_SESSION['name']!='coderhousebd')
{
	header('location: login.php');
}
?>

<?php
include('header.php');

?>
		<div class="content">
			<h2>Add New Category</h2>
			<form action="">
				<table class="">
					<tr>
						<td>Category Name</td>
						
					</tr>
					<tr>
						<td><input class="short" type="text" name="" value=""></td>
					</tr>
					<tr>
						
						<td><input type="submit" value="SAVE" name=""></td>
					</tr>
				</table>
			</form>

			<h2>View All Categories</h2>
			<table class="table2" width="100%">

			<tr>
				<th width="5%">Serial</th>
				<th width="75%">Category Name</th>
				<th width="15%">Action</th>
			</tr>

			<tr>
				<td>1</td>
				<td>Technology</td>
				<td><a class="fancybox" href="#inline1" >Edit</a>
				<div id="inline1" style="width: 400px; display: none;">
					<h3>Edit Data</h3>
					<p>
						<form action="" method="post"> 
							<table>
								<tr>
									<td>Catagory Name:</td>
								</tr>
								<tr>
									<td><input type="text" value="Technology" name=""></td>
								</tr>
								<tr>
									<td><input type="submit" value="UPDATE" name=""></td>
								</tr>
							</table>
						</form>
					</p>
				</div>
				&nbsp;|&nbsp;
				 <a onclick="return confirmDelete();" href="">Delete</a> </td>
			</tr>
			<tr>
				<td>2</td>
				<td>Computer</td>
				<td><a href="">Edit</a>&nbsp;|&nbsp;<a href="">Delete</a> </td>
			</tr>
			<tr>
				<td>3</td>
				<td>Business</td>
				<td><a href="">Edit</a>&nbsp;|&nbsp;<a href="">Delete</a> </td>
			</tr>
			<tr>
				<td>4</td>
				<td>Sports</td>
				<td><a href="">Edit</a>&nbsp;|&nbsp;<a href="">Delete</a> </td>
			</tr>
			<tr>
				<td>5</td>
				<td>Bangladesh</td>
				<td><a href="">Edit</a>&nbsp;|&nbsp;<a href="">Delete</a> </td>
			</tr>
			</table>
			
		</div>

<?php
include('footer.php');

?>