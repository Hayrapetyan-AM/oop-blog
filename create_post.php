<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Post</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<style>
body{
		background-color: #000000;
	}
	/*.f{
		border: 5px solid green;
	}*/
</style>
<body class="text-white">

<div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2>Welcome dear admin!</h2>
          <p>Here you can add some really interesting posts to your website!</p>
          <!-- <button class="btn btn-outline-light" type="button">Example button</button> -->
</div>

<div class="f w-50 text-center m-auto mt-5">
	<h1 class="mb-5">Do your work properly!</h1>
	<form method="post">

		<div class="row mb-2">
			<div class="col">
				<label for="title">Title</label>
			</div>
			<div class="col">
				<input type="text" class="form-control" name="title" id="title">
			</div>
		</div>

		<div class="row mb-2">
			<div class="col">
				<label for="text">Text</label>
			</div>
			<div class="col">
				<textarea name="text" id="" cols="10" rows="1" class="form-control "></textarea>
			</div>
		</div>

		<div class="row mb-5">
			<div class="col">
				<label for="ctg">Category</label>
			</div>
			<div class="col">
				<select class="form-select" id="ctg" name="ctg">
				  <option selected></option>
				  <option value="PHP">PHP</option>
				  <option value="Information Security">Information Security</option>
				  <option value="English">English</option>
				</select>
			</div>
		</div>


		<div class="row">
			<div class="col">
				<label for="btn">-></label>
			</div>
			<div class="col">
				<button type="submit" name="btn" id="btn" class="form-control btn btn-success">add</button>
			</div>
		</div>
	</form>
</div>
<?php 
if (isset($_POST['btn'])) {
	
	require_once('classes/Post.php');
	$text = $_POST['text']; $title = $_POST['title']; $ctg = $_POST['ctg'];
	$author = "admin";
	$post = new Post($text, $title, $ctg, $author);
	$post->create();
}
?>
</body>
<script  type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>