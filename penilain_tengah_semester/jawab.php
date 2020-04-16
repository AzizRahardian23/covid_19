<?php
session_start();
// koneksi ke mysqli
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_soal";
// Create connection
$koneksi = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$koneksi) {
die("Connection failed: " . mysqli_connect_error());
}

       if(isset($_POST['submit'])){
            $pilihan=$_POST["pilihan"];
            $id_soal=$_POST["id"];
            $jumlah=$_POST['jumlah'];
            
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            $alami=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
                
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $query=mysqli_query($koneksi, "select * from tbl_soal where id_soal='$nomor' and knc_jawaban='$jawaban'");
                    
                    $cek=mysqli_num_rows($query);
                ?>   
                                   <?php
                    if($cek){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                    
                } 
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */
                
                $result=mysqli_query($koneksi, "select * from tbl_soal WHERE aktif='Y'");
                $jumlah_soal=mysqli_num_rows($result);
                $score = 100/$jumlah_soal*$benar;
                $hasil = number_format($score,1);
                 ?>
                 

                <?php
            }
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jawaban</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <table><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></table>
        <table class="body" align="center" border="0" width="100%">
            <tr>
            <td align="center"> <h1>Data diri </h1></td>
            </tr>
            <tr>
                <td align="center "><?php echo "Nama : ".$_SESSION['nama']; ?></td>
            </tr>
            <tr>
                <td align="center "><?php echo "Umur : ".$_SESSION['umur']; ?></td>
            </tr>
            <tr>
                <td align="center "><?php echo "Jenis Kelamin  : ".$_SESSION['jk']; ?></td>
            </tr>
            <tr>
                <td align="center "><?php echo "Alamat : ".$_SESSION['alamat']; ?></td>
            </tr>
        </table> 
            
        <div class="btn" align="center">
               <?php
            echo "
                <tr>
                <td>Resiko anda terhadap covid-19</td>
                <td>:  </td>
                </tr>
                </table>
                </div>";
        ?>

    </div>
    <div class="btn" align="center" >
    <?php 
    
                    $salah ;
                    if($salah < 8){
                    echo "rendah";
                    }elseif($salah < 15){
                    echo "sedang";
                    }else{
                    echo "tinggi";
                        }
                    
            ?>
            </div>
    
          
        <div class="bbtn" align="center" >
            <a href="logout.php"><h1>Mulai Lagi Yuk</h1></a>
        </div>
        
</body>
</html>