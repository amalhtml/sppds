<?php
  include("sambungan.php");
  include("urusetia_menu.php");

  if(isset($_POST["submit"])){
      
      $idpenilaian=$_POST["idpenilaian"];
      $sql="delete from penilaian where idpenilaian='$idpenilaian'";
      $result = mysqli_query($sambungan, $sql);
      
      if($result==true){
          $bilrekod=mysqli_affected_rows($sambungan);
          if($bilrekod>0)
             echo"<script>alert('Berjaya Padam')</script>";
    else
        echo"<script>alert('Tidak Berjaya Padam')</script>";
    echo"<script>window.location='penilaian_senarai.php'</script>";
}
      
    else
        echo "<br><center>Ralat: $sql<br>".mysqli_error($sambungan)."</center>";
  }

if(isset($_GET['idpenilaian']))
      $idpenilaian=$_GET['idpenilaian'];
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
    
<h3 class="panjang">PADAM PENILAIAN</h3>
<form class="panjang" action="penilaian_delete.php" method="post">
    
<table>   
    <tr>
       <td>ID Penilaian</td>
       <td><input type="text" name="idpenilaian" value="<?php if(isset($idpenilaian)) echo $idpenilaian;?>"></td>
    </tr>
</table>
    
<button class ="padam" type="submit" name="submit">Padam</button>
</form>
   