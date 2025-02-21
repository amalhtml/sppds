<?php
  include("urusetia_menu.php");
   include("sambungan.php");

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

<h3 class ="panjang">TAMBAH URUSETIA</h3>
<form class="panjang" action="urusetia_insert.php" method="post">
   <table>
    
    <tr>
       <td>ID Urusetia</td>
       <td><input type="text" name="idurusetia"></td>
    </tr>
    
    <tr>
       <td>Nama Urusetia</td>
       <td><input type="text" name="namaurusetia"></td>
    </tr>
    
    <tr>
       <td>Kata Laluan</td>
       <td><input type="text" name="password" placeholder="max:8 char"></td>
    </tr>
      
   </table>
   <button class="tambah" type="submit"
    name="submit">Tambah</button>
</form>
    
    <link rel="stylesheet" href="popup.css">
    
    <div class="success" id="berjaya" style="display:none;">
    <span class="closebtn" onclick=" this.parentElement.style.display = 'none';">&times;</span>
              BERJAYA TAMBAH URUSETIA</div>
        
         <div class="failed" id="tidak" style="display:none;">
    <span class="closebtn" onclick=" this.parentElement.style.display = 'none';">&times;</span>
             TIDAK BERJAYA TAMBAH URUSETIA
    <?php echo "$sql<br>".mysqli_error($sambungan)?>
    </div>

    
  <?php
  include("sambungan.php");


  if(isset($_POST["submit"])){
      $idurusetia=$_POST["idurusetia"];
      $password=$_POST["password"];
      $namaurusetia=$_POST["namaurusetia"];
      
      $sql="insert into urusetia values('$idurusetia',
      '$password','$namaurusetia')";
      $result = mysqli_query($sambungan, $sql);
      if($result == true)
          echo"<script>document.getElementById('berjaya').style.display='block';</script>";
      else
          echo"<script>document.getElementById('tidak').style.display='block';</script>";
          
  }
             
             ?>