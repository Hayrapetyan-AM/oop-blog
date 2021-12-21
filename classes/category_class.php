<?php 
/**
 * 
 */
class category
{
	private $ctg;
	function __construct($argument)
	{
		$this->ctg = $argument;
	}

	public function show()
	{
		require('dbConn.php');
		try{
			$query = $db->prepare('SELECT * FROM posts WHERE category = ?');
			$query->execute([$this->ctg]);
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
}
?>