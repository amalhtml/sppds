<?php
  include("sambungan.php");
  include("urusetia_menu.php");
  if(isset($_POST["submit"])){
      $idhakim=$_POST["idhakim"];
      $password=$_POST["password"];
      $namahakim=$_POST["namahakim"];
      
    $sql="update hakim set password='$password',namahakim='$namahakim' where idhakim ='$idhakim' "; 
    $result=mysqli_query($sambungan,$sql);
    if ($result == true)
        echo"<script>alert('Berjaya Kemas Kini')</script>";
    else
        echo"<script>alert('Tidak Berjaya Kemas Kini')</script>";
    echo"<script>window.location='hakim_senarai.php'</script>";
}


  if(isset($_GET['idhakim']))
      $idhakim=$_GET['idhakim'];
        
  $sql="select * from hakim where idhakim='$idhakim'";
  $result = mysqli_query($sambungan, $sql);
  while($hakim=mysqli_fetch_array($result)){
      $password=$hakim['password'];
      $namahakim=$hakim['namahakim'];
      
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
    
<h3 class="panjang">KEMASKINI HAKIM</h3>
<form class="panjang" action="hakim_update.php" method="post">
<table>   
    
    <tr>
       <td>ID Hakim</td>
       <td><input type="text" name="idhakim" value="<?php if(isset($idhakim)) echo $idhakim;?>"></td>
    </tr>
    
    <tr>
       <td>Password</td>
       <td><input readonly type="text" name="password" value="<?php echo $password;?>"></td>
    </tr>
    
    <tr>
       <td>Nama Hakim</td>
       <td><input type="text" name="namahakim" value="<?php if(isset($namahakim)) echo $namahakim;?>"></td>
    </tr>
</table>
<button class ="update" type="submit" name="submit">Kemas kini</button>
</form>     