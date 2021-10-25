<?php
	
class Verse {
	public function construct($id,$book_id,$chapter,$text){
		$this->id = $id;
		$this->book_id = $book_id;
		$this->chapter = $chapter;
		$this->body = $text;
	}
}
	$db = json_decode(file_get_contents("./bible/bible-books-index.json"));

	$verses = explode("\n",file_get_contents("./bible/kjv-verses.txt"));
	$vi = 0;
	$v = new \stdclass;
	$db->verses = [];

	foreach($db->books as $book){
		$bk = $book->id;
		$chapter = 1;
		foreach($book->chapter_verses as $cv){
			$i = 1;
			while($i <= $cv){
				$ver = new stdclass;
				$ver->id = 9 . str_pad($bk ,2,"0", STR_PAD_LEFT).str_pad($chapter ,3,"0", STR_PAD_LEFT) . str_pad($i ,3,"0", STR_PAD_LEFT);
				$ver->id = (int) $ver->id;
				$ver->book = new stdclass;
				$ver->book->id = $bk;
				$ver->book->name = $book->name;
				$ver->chapter = $chapter;
				$ver->verse = $i;
				$ver->body = $verses[$vi];
				$db->verses[]= $ver;
				$i++;
				$vi++;
			}
			$chapter++;
		}
		
	}

file_put_contents('bible.json', json_encode($db));
die;
	echo '<ol>';
	foreach($db->verses as $dv){
		echo "<li>". $dv->id . " ".htmlspecialchars(substr($dv->body,0,40)) .  $dv->book->name . " " . $dv->chapter . ":". $dv->verse."</li>";
	}
	echo '</ol>';
	//
?>