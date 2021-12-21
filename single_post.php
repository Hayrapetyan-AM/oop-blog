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
	/*.showed{
		overflow: hidden;
		max-height: 100px;
	}*/
</style>
<body class="text-white">

	<?php
			require_once __DIR__ . '/header.php';
			require_once('classes/Post.php');

			if (isset($_GET['id'])) 
			{
				$id = $_GET['id'];
				require('classes/dbConn.php');
					try{
						$query = $db->prepare('SELECT * FROM posts WHERE id = ?');
						$query->execute([$id]);
					}catch(PDOException $e){
						echo "Error ". $e->getMessage();
					}
					while ($row = $query->fetch(PDO::FETCH_OBJ)) 
					{
						?>
							<div class="alert alert-warning m-auto w-50 mt-5">
								<h5><a href="single_post.php?id=<?=$row->id ?>" class="text-decoration-none text-dark"><?php echo $row->title?></a></h5>
								<hr>
								<p class="showed"><?php echo $row->text ?></p>
								<hr>
								<p class="text-right text-muted">Posted by <kbd> <?php echo $row->author ?></kbd></p>
							</div>
						<?
					}
			}
	 ?>
	

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</html>