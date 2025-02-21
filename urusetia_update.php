<?php
  include("sambungan.php");
  include("urusetia_menu.php");

if (isset($_POST["submit"])) {
		$idurusetia = $_POST["idurusetia"];
		$namaurusetia = $_POST["namaurusetia"];
		$password = $_POST["password"];

		$sql = "update urusetia set namaurusetia = '$namaurusetia', password='$password' where idurusetia = '$idurusetia' ";

		$result = mysqli_query($sambungan, $sql);
	    if ($result == true)
        echo"<script>alert('Berjaya Kemas Kini')</script>";
    else
        echo"<script>alert('Tidak Berjaya Kemas Kini')</script>";
    echo"<script>window.location='urusetia_senarai.php'</script>";
}
if (isset($_GET['idurusetia']))
      $idurusetia = $_GET['idurusetia'];
        
$sql = "select * from urusetia where idurusetia = '$idurusetia' ";
$result = mysqli_query($sambungan, $sql);
while($urusetia = mysqli_fetch_array($result)) {
    $password = $urusetia['password'];
    $namaurusetia = $urusetia['namaurusetia'];
      
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
    
<h3 class="panjang">KEMASKINI URUSETIA</h3>


<form class="panjang" action="urusetia_update.php" method="post">
<table>   
    <tr>
       <td>ID Urusetia</td>
       <td><input readonly type="text" name="idurusetia" value= "<?php if(isset($idurusetia)) echo $idurusetia; ?>" ></td>
    </tr>
    
    <tr>
       <td>Nama Urusetia</td>
       <td><input type="text" name="namaurusetia" value= "<?php if(isset($namaurusetia)) echo $namaurusetia; ?>" ></td>
    </tr>
    
    <tr>
       <td>Password</td>
       <td><input type="text" name="password" value= "<?php echo $password; ?>" ></td>
    </tr>
</table>
<button class="update" type="submit" name="submit">Kemas kini</button>
</form>