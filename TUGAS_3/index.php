<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>
			Tugas Mingguan 3 - Judul
		</title>
		<link rel=stylesheet href="./css/tampilan.css" type="text/css">
	</head>
	<body>
			<?php
				$dbc = new PDO('mysql:host=localhost;dbname=puppies', 'root', '');
			
				$statement = $dbc->prepare("SELECT animals.id, animals.puppyname, breeds.breedname, animals.description, animals.price, animals.picture FROM animals inner join breeds on animals.breedid=breed where true");
				$statement->execute();
				$a=$statement->fetchAll();
				
				$colName=array("Puppy Name", "Breed Name", "Description", "Price", "Picture","action");
				//print_r($a); ?>

				<table class="container"> <tr>
				<?php
				foreach ($colName as $nama_header){
					echo "<th>$nama_header</th>";
				}
				echo "</tr>";
				
				foreach ($a as $x){ //untuk ngambil baris
					echo "<tr>";
					for ($i=1; $i<6; $i++){ //untuk ngambil index dibuat kolom
						if ($i == 5){
							echo "<td><img src='./img/$x[$i]' alt='Image $x[$i]'></td>";
						}else if ($i == 4){
							echo "<td>$ $x[$i]</td>";
						}
						else{
							echo "<td>$x[$i]</td>";
						}
					}
					?>
					<td><a href="inc/edit.php?id=<?php echo"$x[0]" ?>">EDIT</a></td>
					<?php
					echo "</tr>";
				}
				echo "</table>";
			?>
				<div class="circle1"></div>
				<form action="./inc/tampiladd.php" method="POST">
					<input class="circle2" type="submit" name="tambah" value="Add"/>
				</form>
			
	</body>
</html>