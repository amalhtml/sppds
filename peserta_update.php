<?php
  include("sambungan.php");
  include("urusetia_menu.php");

  if (isset($_POST["submit"])) { 
      $nokp = $_POST["nokp"];
      $password = $_POST["password"];
      $namapeserta = $_POST["namapeserta"];
      $telefon = $_POST["telefon"];
      $idhakim = $_POST["idhakim"];
      $idurusetia = $_POST["idurusetia"];
      
    $sql = "update peserta set password = '$password', namapeserta = '$namapeserta', telefon = '$telefon',
            idhakim = '$idhakim', idurusetia = '$idurusetia' where nokp = '$nokp' "; 
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo"<script>alert('Berjaya Kemas Kini')</script>";
    else
        echo"<script>alert('Tidak Berjaya Kemas Kini')</script>";
    echo"<script>window.location='peserta_senarai.php'</script>";
}

  if (isset($_GET['nokp']))
      $nokp = $_GET['nokp'];
        
  $sql = "select * from peserta where nokp = '$nokp' ";
  $result = mysqli_query($sambungan, $sql);
  while($peserta = mysqli_fetch_array($result)) {
      $namapeserta = $peserta['namapeserta'];
      $telefon = $peserta['telefon'];
      $password = $peserta['password'];
      $idhakim = $peserta['idhakim'];
      $idurusetia = $peserta['idurusetia'];
      
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
<h3 class="panjang">KEMASKINI PESERTA</h3>
<form class="panjang" action="peserta_update.php" method="post">
<table>   
    
    <tr>
       <td>No KP</td>
       <td><input readonly type="text" name="nokp" value= "<?php if(isset($nokp)) echo $nokp; ?>" ></td>
    </tr>
    
    <tr>
       <td>Nama Peserta</td>
       <td><input type="text" name="namapeserta" value="<?php if(isset($namapeserta)) echo $namapeserta;?>"></td>
    </tr>
    
    <tr>
       <td>No Telefon</td>
       <td><input type="text" name="telefon" value="<?php if(isset($telefon)) echo $telefon;?>"> </td>
    </tr>
    
     <tr>
       <td>Password</td>
       <td><input type="text" name="password" value="<?php echo $password;?>"></td>
    </tr>
    
    <tr>
       <td>ID Hakim</td>
       <td><input type="text" name="idhakim" value="<?php if(isset($idhakim)) echo $idhakim;?>"></td>
    </tr>
    
    <tr>
       <td>ID Urusetia</td>
       <td><input type="text" name="idurusetia" value="<?php if(isset($idurusetia)) echo $idurusetia;?>"></td>
    </tr>
    
    
</table>
<button class ="update" type="submit" name="submit">Kemas kini</button>
</form> 