<?php 
/**
 * 
 */
class Post
{
	private $text;
	private $title;
	private $ctg;
	private $author;
	function __construct($arg1, $arg2, $arg3, $arg4)
	{
		$this->text  = $arg1;
		$this->title = $arg2;
		$this->ctg   = $arg3;
		$this->author= $arg4;
	}

	public function create()
	{
		require('dbConn.php');
		try {
			$query = $db->prepare('INSERT INTO posts(`title`, `text`, `author`, `category`) VALUES (:title, :ttext, :author, :category)');
			$query->execute(array(':title'=> $this->title, ':ttext' => $this->text, ':author' => $this->author, ':category' => $this->ctg));
		} catch (PDOException $e) {
			echo "Error" . $e->getMessage();
		}
		//header('Location:' . $_SERVER['PHP_SELF']);
	}

	public function test(){
		print_r($this);
	}
}
?>