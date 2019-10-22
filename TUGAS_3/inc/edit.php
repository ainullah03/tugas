<!Doctype html>
<html lang="en">	
	<head>
		<title>
			EDIT
		</title>
		<link rel=stylesheet href="../css/form.css" type="text/css">
	</head>
	<body>
		<div class="wrapper">
				<div class="container">
			<?php
			$d=$_GET["id"];
			$dbc = new PDO('mysql:host=localhost;dbname=puppies', 'root', '');
			$stat = $dbc->prepare("SELECT animals.puppyname, breeds.breedname, animals.description, animals.price, animals.picture FROM animals inner join breeds on animals.breedid=breed where id= $d");
			$stat->execute();
			$a=$stat->fetchAll();

				if (isset($_POST["insert"])){

					$id=$_GET["id"];
					$dbc = new PDO('mysql:host=localhost;dbname=puppies', 'root', '');
					$ekstensi_diperbolehkan	= array('png','jpg');
					$nama = $_FILES['file']['name'];
					$x = explode('.', $nama);
					$ekstensi = strtolower(end($x));
					$ukuran	= $_FILES['file']['size'];
					$file_tmp = $_FILES['file']['tmp_name'];	
		 
					if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
						if($ukuran < 1044070){			
							move_uploaded_file($file_tmp, '../img/'.$nama);
							$statement=$dbc->query("UPDATE `animals` SET `puppyname`='{$_POST['puppyname']}',`breedid`='{$_POST['breedid']}',`description`='{$_POST['description']}',`price`='{$_POST['price']}',`picture`='$nama' WHERE id= $id");
							if($statement){
								echo "<div style='text-align:center;'>Data has been added! <br/>";
								echo'<a href="../index.php">Back</a> ';
							}else{
								echo 'GAGAL MENGUPLOAD GAMBAR';
							}
						}else{
							echo 'UKURAN FILE TERLALU BESAR';
						}
					}else{
						echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
					}
						
				}
				else{
			?>
				<form action="./edit.php?id=<?php print_r($_GET["id"]); ?>" method="POST" enctype="multipart/form-data">
					<?php foreach ($a as $key): ?>
					
						<label for="puppyname">Puppy Name</label><br/>
						<input type="text" id="puppyname" name="puppyname" value="<?php print_r($key[0]) ?>" />
					
					
						<label for="breedid">Breed ID</label><br/>
						<select name="breedid" id="breedid">
							<?php
								$dbc = new PDO('mysql:host=localhost;dbname=puppies', 'root', '');
						
								$statement = $dbc->prepare("SELECT * FROM breeds where true");
								$statement->execute();
								foreach ($statement as $row){
									if ($key[1] == $row['breedname']) {
										echo "<option value=".$row['breed']." selected>".$row['breedname']."</option>";	
									}else{
										echo "<option value=".$row['breed'].">".$row['breedname']."</option>";
									}
								}
							?>
						</select>
						<br>
							<label >Description</label><br/>
							<input type="text" id="description" name="description" value="<?php print_r($key[2]) ?>" />
							<label >Price</label><br/>
							<input type="text" id="price" name="price" value="<?php print_r($key[3]) ?>"/>
							<label >PICTURE</label><br/>
							<input type="file" id="file" name="file">
							<button type="submit" name="insert">EDIT DATA</button> 
							<br><a href="../index.php">KEMBALI</a>
						
					<?php endforeach ?>
				</form>
				</div>
					<ul class="bg-bubbles">
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
			</div>
			<?php
			}
			?>
		
	</body>
</html>