<!--Main file-->
<!Doctype html>
<html lang="id">
	<head>
		<title>Tugas Mandiri 3</title>
				<link rel=stylesheet href="../css/form.css" type="text/css">
	</head>
	<body>
				<div class="wrapper">
				<div class="container">
				<?php
					$errors = array();
					include './validate.php'; //memasukkan file validator eksternal
					if (isset($_POST['insert'])) //kondisi awal; pengecekan file pertama dibuka atau tidak
					{
						$dbc = new PDO('mysql:host=localhost;dbname=puppies', 'root', '');
						$ekstensi_diperbolehkan	= array('png','jpg');
						$nama = $_FILES['file']['name'];
						$x = explode('.', $nama);
						$ekstensi = strtolower(end($x));
						$ukuran	= $_FILES['file']['size'];
						$file_tmp = $_FILES['file']['tmp_name'];	
						validateKosong($errors, $_POST, 'puppyname');
						validateKosong($errors, $_POST, 'description');
						validateNum($errors, $_POST, 'price');
						validateKosong($errors, $_POST, 'price');
						if ($errors)
						{
							// tampilkan kembali form
							include './add_data.php';
						}
						else
						{
						if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
							if($ukuran < 1044070){			
								move_uploaded_file($file_tmp, '../img/'.$nama);
								$statement = $dbc->query("INSERT INTO animals VALUES (null, '{$_POST['puppyname']}', '{$_POST['breedid']}', '{$_POST['description']}', '{$_POST['price']}', '$nama')");
								if($statement){
									echo "<div style='text-align:center;'>Data has been added! <br/>";
									echo'<a href="../index.php">Back</a> ';
								}else{
									echo 'GAGAL MENGUPLOAD GAMBAR';
								}
							}else{
								echo "<h1>GAGAL Tambah Data</h1>";?>
								<a href="tampiladd.php">KEMBALI</>
								<?php
							}
						}else{
							echo "<h1>GAGAL Tambah Data</h1>";?>
							<a href="tampiladd.php">KEMBALI</>
							<?php
						}

					}
				}
					else
						// tampilkan kembali form
						include './add_data.php';
				?>
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
	</body>
</html>