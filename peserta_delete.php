<?php
  include("sambungan.php");
  include("urusetia_menu.php");

  if(isset($_POST["submit"])){
      
      $nokp=$_POST["nokp"];
      $sql="delete from peserta where nokp='$nokp'";
      $result = mysqli_query($sambungan, $sql);
      
      if($result==true){
          $bilrekod=mysqli_affected_rows($sambungan);
          if($bilrekod>0)
             echo"<script>alert('Berjaya Padam')</script>";
    else
        echo"<script>alert('Tidak Berjaya Padam')</script>";
    echo"<script>window.location='peserta_senarai.php'</script>";
}
      
    else
        echo "<br><center>Ralat: $sql<br>".mysqli_error($sambungan)."</center>";
  }

if(isset($_GET['nokp']))
      $nokp=$_GET['nokp'];
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
    
<h3 class="panjang">PADAM PESERTA</h3>
<form class="panjang" action="peserta_delete.php" method="post">
    
<table>   
    <tr>
       <td>No KP</td>
       <td><input type="text" name="nokp" value="<?php if(isset($nokp)) echo $nokp;?>"></td>
    </tr>
</table>
    
<button class ="padam" type="submit" name="submit">Padam</button>
</form>     
   