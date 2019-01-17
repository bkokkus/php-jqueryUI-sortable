<?php 


try {
			$db = new PDO("mysql:host=localhost;dbname=sortable;charset=utf8","root","");
		} catch (PDOException $e) {
			echo $e->getMessage();
		}



parse_str($_POST["data"], $siralama);

$rank = $siralama["rank"];

foreach ($rank as $key => $id) {
	//echo $id. "=>" . $key . " | ";

	$query = $db->prepare("UPDATE items SET rank=:rank WHERE id=:id");
	$update = $query->execute(array("rank" => $key, "id" => $id));
	
}