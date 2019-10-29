<!DOCTYPE html>
<html lang="en">
	<head>
		<title>profil</title>
		<link rel="stylesheet" href="./profil.css">
	</head>
	<body>
	<div class="our-team">
		<div class="picture">
          <img class="img-fluid" alt="d" src='image/anime.JPG'>
        </div>
        <div class="team-content">
			<h2><b>Data Mahasiswa</b></h2>
			<p><b>Nama Lengkap	:</b> AINULLAH</p>
			<p><b>NIM			:</b> 160411100136</p>
			<p><b>Program studi	:</b> Teknik Informatika</p>
			<p><b>Fakultas		:</b> Teknik</p>
			<p><b>Universitas	:</b> Universitas Trunojoyo Madura</p>
		</div>
		<ul class="social">
			<?php
				session_start();
				if (isset($_SESSION['login'])) {?>
					<li><a href="logout.php" aria-hidden="true">Halaman Logout</a></li>
				<?php }
				else{ ?>
					<li><a href="login.php" aria-hidden="true">Halaman Login</a></li>
				<?php }
			?>
          	
			<li><a href="private1.php" aria-hidden="true">Detil Data 1</a></li>
			<li><a href="private2.php" aria-hidden="true">Detil Data 2</a></li>
        </ul>
	</div>
	</body>
</html>