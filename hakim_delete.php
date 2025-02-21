<?php
  include("sambungan.php");
  include("urusetia_menu.php");

  if(isset($_POST["submit"])){
      
      $idhakim=$_POST["idhakim"];
      $sql="delete from hakim where idhakim='$idhakim'";
      $result = mysqli_query($sambungan, $sql);
      
      if($result==true){
          $bilrekod=mysqli_affected_rows($sambungan);
          if($bilrekod>0)
             echo"<script>alert('Berjaya Padam')</script>";
    else
        echo"<script>alert('Tidak Berjaya Padam')</script>";
    echo"<script>window.location='hakim_senarai.php'</script>";
}
    else
        echo "<br><center>Ralat: $sql<br>".mysqli_error($sambungan)."</center>";
  }

if(isset($_GET['idhakim']))
      $idhakim=$_GET['idhakim'];
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
    
<h3 class="panjang">PADAM HAKIM</h3>
<form class="panjang" action="hakim_delete.php" method="post">
    
<table>   
    <tr>
       <td>ID Hakim</td>
       <td><input type="text" name="idhakim" value="<?php if(isset($idhakim)) echo $idhakim;?>"></td>
    </tr>
</table>
    
<button class ="padam" type="submit" name="submit">Padam</button>
</form>     