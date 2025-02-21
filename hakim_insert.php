<?php
  include("sambungan.php");
  include("urusetia_menu.php");

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

<h3 class="panjang">TAMBAH HAKIM</h3>
<form class="panjang" action="hakim_insert.php" method="post">
   <table>
    <tr>
       <td>ID Hakim</td>
       <td><input type="text" name="idhakim"></td>
    </tr>
    
       <tr>
       <td>Kata Laluan</td>
       <td><input type="text" name="password"></td>
    </tr>
       
    <tr>
       <td>Nama Hakim</td>
       <td><input type="text" name="namahakim"></td>
    </tr>
    
   </table>
   <button class="tambah" type="submit" name="submit">Tambah</button>
</form>

 <link rel="stylesheet" href="popup.css">
    
    <div class="success" id="berjaya" style="display:none;">
    <span class="closebtn" onclick=" this.parentElement.style.display = 'none';">&times;</span>
        BERJAYA TAMBAH HAKIM</div>
        
         <div class="failed" id="tidak" style="display:none;">
    <span class="closebtn" onclick=" this.parentElement.style.display = 'none';">&times;</span>
             TIDAK BERJAYA TAMBAH HAKIM
    <?php echo "$sql<br>".mysqli_error($sambungan)?>
    </div>
   
    
 <?php
  include("sambungan.php");

  if(isset($_POST["submit"])){
      $idhakim=$_POST["idhakim"];
      $password=$_POST["password"];
      $namahakim=$_POST["namahakim"];
      
      $sql="insert into hakim values('$idhakim','$password','$namahakim')";
      
      $result = mysqli_query($sambungan, $sql);
      if($result == true)
         if($result == true)
          echo"<script>document.getElementById('berjaya').style.display='block';</script>";
      else
          echo"<script>document.getElementById('tidak').style.display='block';</script>";
          
  }

?>