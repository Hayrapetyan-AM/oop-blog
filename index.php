<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<style>
body{
		background-color: #000000;
	}
	.showed{
		overflow: hidden;
		max-height: 100px;
	}
</style>
<body class="text-white">

	<?php
			require_once __DIR__ . '/header.php';
			require_once('classes/category_class.php');

			if (isset($_GET['ctg'])) 
			{
				$ctg = $_GET['ctg'];
				$ctg_list = new category($ctg);
				$ctg_list->show();
			}
	 ?>
	

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</html>