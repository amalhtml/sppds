<?php
  include("sambungan.php");
  include("hakim_menu.php");
  $nokp=$_POST["nokp"];
  $jumlah_markah=$_POST["jumlah_markah"];

  $sql="select * from penilaian";
  $data=mysqli_query($sambungan,$sql);

  while($penilaian=mysqli_fetch_array($data)){
      $markah=$_POST["$penilaian[idpenilaian]"];
      $idpenilaian=$penilaian['idpenilaian'];
      $sql="insert into keputusan values('$nokp','$idpenilaian','$markah','$jumlah_markah')";
      $result=mysqli_query($sambungan,$sql);
      
      if ($result == true)
        echo"<script>alert('Berjaya Tambah')</script>";
    else
        echo"<script>alert('Tidak Berjaya Tambah')</script>";
    echo"<script>window.location='hakim_peserta.php'</script>";
}// tamat while



?>

<html>
<head>
    <style>
    
        body{
            background-image: url(imej/background2.png);
            background-repeat: no-repeat;
            background-size: cover;
    
        }
   
    </style>
    </head>
           </html>

