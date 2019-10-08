<!--Main file-->
<!Doctype html>
<html lang="id">
	<head>
		<title>Tugas Mandiri 2</title>
		<link rel=stylesheet href="css/style.css" type="text/css">
	</head>
	<body>
		</div>
		<div class="contact-form">
			<!--Form Box-->
			<fieldset>
				<legend>Person Detail</legend>
				<?php
					$errors = array();
					include './validate.php'; //memasukkan file validator eksternal
					if (isset($_POST['surname'])) //kondisi awal; pengecekan file pertama dibuka atau tidak
					{
						//pemanggilan fungsi validasi
						validateAlpha($errors, $_POST, 'surname');
						validateKosong($errors, $_POST, 'surname');
						
						validateEmail($errors, $_POST, 'email');
						validateKosong($errors, $_POST, 'email');
						
						validateAlpha($errors, $_POST, 'firstname');
						validateKosong($errors, $_POST, 'firstname');
						
						validateNum($errors, $_POST, 'pass');
						validateLenChar($errors, $_POST, 'pass');
						validateKosong($errors, $_POST, 'pass');
						
						validateSame($errors, $_POST, 'pass', 'cpass');
						validateKosong($errors, $_POST, 'cpass');
						
						if ($errors)
						{
							// tampilkan kembali form
							include './form.html';
						}
						else
						{
							// tampilkan pesan sukses
							echo "<h2>Success!</h2><blockquote>
							Form submitted successfully. Please check your email 
							to verify your registration.
							</blockquote>";
						}
					}
					else
						// tampilkan kembali form
						include './form.html';
				?>
			</fieldset>
		</div>
	</body>
</html>