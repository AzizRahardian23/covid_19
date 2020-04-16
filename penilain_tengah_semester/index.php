    <?php 
        session_start();
        if (isset($_POST['Mulai'])) {
            $_SESSION['nama'] = $_POST['nama'];
             $_SESSION['umur'] = $_POST['umur'];
              $_SESSION['jk'] = $_POST['jk'];
               $_SESSION['alamat'] = $_POST['alamat'];
            echo "<script>alert('selamt datang...');
        document.location.href = 'soal.php';</script>";
    }
    ?>
<!DOCTYPE html>
<html>
	<head>
		<title>pemeriksaan covid smk wikrama</title>
        <meta charset= "utf-9">
        <link rel="stylesheet" href="style.css">
	</head>
	<form method="post">
		<body>

        <div class="login-box1">
        <h2>pemeriksaan covid 19</h2>
        </div>
            <div class="login-box">
			    <h1>masukan data diri </h1>
                <div class="textbox">

                    <input type="text" name="nama" required placeholder="nama">
                </div>
                <div class ="textbox">
                    
                    <input type="text" name="umur" required placeholder="umur">
                </div>
                <div class="textbox"> 
                    <input type="text" name="jk" required placeholder="jenis kelamin ">
                </div>
                <div class="textbox"> 
                    <input type="text" name="alamat " required placeholder="alamat">
                </div>
                
			    <input  align="center" type="submit" name="Mulai" value="Mulai"></td>
            </div>
		</body>
	</form>
</html>


