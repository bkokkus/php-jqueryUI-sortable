<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sıralama</title>

	<style type="text/css">
		.sortable {
			margin:0px;
			padding:0px;
			width: 300px;
			list-style: none;
		}

		.sortable li{
			background-color: #f0f0f0;
			padding: 5px 10px;
			margin-bottom: 3px;
			border: 1px dashed #666;
		}

		.li span { position: absolute; margin-left: -1.3em; }

	</style>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	  <script type="text/javascript">
	  		$(document).ready(function() {
	  			$(".sortable").sortable();
	  			//$( ".sortable" ).disableSelection();
	  		
		  		$(".sortable").on("sortupdate", function (event, ui){

				var data = $(this).sortable("serialize");	  	
				
				var url="http://deb/sortable/sort.php";

					  				
				$.post(url,{data:data},function(response){
					  	
					  	alert("işlem başarılıdır.");
					  		
				  	})
					  			
				})	
	  			
	  		})

	  </script>


</head>
<body>
	<?php
		try {
			$db = new PDO("mysql:host=localhost;dbname=sortable;charset=utf8","root","");
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

		$rows = $db->query('SELECT * FROM items ORDER BY rank ASC',PDO::FETCH_ASSOC);			

	?>

	<h3>DragDrop Sortable</h3>

	<ul class="sortable">
		<?php foreach ($rows as $row) { ?>
			
			<li id="rank-<?php echo $row['id']; ?>">
				<?php echo $row['title']; ?>	
				</li>
		<?php } ?>	
	</ul>

</body>
</html>