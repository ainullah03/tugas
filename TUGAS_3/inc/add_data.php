
					<h1>Tambah Data</h1>
				<form action="./tampiladd.php" method="POST" enctype="multipart/form-data">
						<span style='color:red'> <?php if (isset($errors['puppyname'])) echo htmlspecialchars($errors['puppyname'])?> </span><br>
						<input type="text" id="puppyname" name="puppyname" placeholder="Puppy Name" />
						<select name="breedid" id="breedid" style="width: 250px; height: 50px;">
							<?php
								$dbc = new PDO('mysql:host=localhost;dbname=puppies', 'root', '');
						
								$statement = $dbc->prepare("SELECT * FROM breeds where true");
								$statement->execute();
								foreach ($statement as $row){
									echo "<option value=".$row['breed'].">".$row['breedname']."</option>";
								}
							?>
						</select>
						<br>
						<br>

						<span style='color:red'> <?php if (isset($errors['description'])) echo htmlspecialchars($errors['description'])?> </span>
						<input type="text" id="description" name="description" placeholder="Drscription" />
						<span style='color:red'> <?php if (isset($errors['price'])) echo htmlspecialchars($errors['price'])?> </span>
						<input type="text" id="price" name="price" placeholder="Price" />
						<label>Pixcture</label>
						<input type="file" id="file" name="file">
					
						<button type="submit" name="insert"> Tambah</button>
						<br><a href="../index.php">KEMBALI</a>
					
				</form>
		