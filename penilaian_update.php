<?php
  include("sambungan.php");
  include("urusetia_menu.php");

  if(isset($_POST["submit"])){
      $idpenilaian=$_POST["idpenilaian"];
      $aspek=$_POST["aspek"];
      $markahpenuh=$_POST["markahpenuh"];
      
    $sql="update penilaian set aspek='$aspek',markahpenuh='$markahpenuh' where idpenilaian ='$idpenilaian' "; 
    $result=mysqli_query($sambungan,$sql);
    if ($result == true)
        echo"<script>alert('Berjaya Kemas Kini')</script>";
    else
        echo"<script>alert('Tidak Berjaya Kemas Kini')</script>";
    echo"<script>window.location='penilaian_senarai.php'</script>";
        
        }

  if(isset($_GET['idpenilaian']))
      $idpenilaian=$_GET['idpenilaian'];
        
  $sql="select * from penilaian where idpenilaian='$idpenilaian'";
  $result = mysqli_query($sambungan, $sql);
  while($nilai=mysqli_fetch_array($result)){
      $aspek=$nilai['aspek'];
      $markahpenuh=$nilai['markahpenuh'];
      
  }
    
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<style>
   .main_box{
           position: absolute;
           margin-left: 600px;  
           }
            
        </style>
<div class="main_box">
    
<h3 class="panjang">KEMASKINI PENILAIAN</h3>
<form class="panjang" action="penilaian_update.php" method="post">
<table>   
    
    <tr>
       <td>ID Penilaian</td>
       <td><input readonly type="text" name="idpenilaian" value="<?php if(isset($idpenilaian)) echo $idpenilaian;?>"></td>
    </tr>
    
    <tr>
       <td>Aspek Penilaian</td>
       <td><input type="text" name="aspek" value="<?php if(isset($aspek)) echo $aspek;?>"></td>
    </tr>
    
    <tr>
       <td>Markah Penuh</td>
       <td><input type="text" name="markahpenuh" value="<?php if(isset($markahpenuh)) echo $markahpenuh;?>"></td>
    </tr>
</table>
<button class ="update" type="submit" name="submit">Kemas kini</button>
</form>     