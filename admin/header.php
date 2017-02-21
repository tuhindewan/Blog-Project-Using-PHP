<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Sample Blog PHP</title>
	<link rel="stylesheet"  href="../style-admin.css">
	<script type="text/javascript">
		function confirmDelete() {
			return confirm("Do you sure want to delete this data");
		}
	</script>
<script type="text/javascript" src="../jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="../fancybox/jquery.fancybox.css" type="text/css" />
<script type="text/javascript" src="../fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body>

<div class="wrapper">
	<div class="header">
		<h1>Admin Panel Dashboard</h1>
	</div>
	<div class="container">
		<div class="sidebar">
			<h2>Page Options</h2>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="change-footer-text.php">Change Footer Text</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>

			<h2>Blog Options</h2>
			<ul>
				<li><a href="add-post.php">Add Post</a></li>
				<li><a href="view-post.php">View Post</a></li>
				<li><a href="manage-catgory.php">Manage Catagory</a></li>
				<li><a href="manage-tags.php">Manage tags</a></li>
			</ul>
			<h2>Comment Section</h2>
			<ul>
				<li><a href="comment-approve.php">View Comments</a></li>
			</ul>
	</div>
		