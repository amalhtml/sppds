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

<h3 class="panjang">TAMBAH PENILAIAN</h3>
<form class="panjang" action="penilaian_insert.php" method="post">
   <table>
    <tr>
       <td>ID Penilaian</td>
       <td><input type="text" name="idpenilaian"></td>
    </tr>
    
       <tr>
       <td>Aspek Penilaian</td>
       <td><input type="text" name="aspek"></td>
    </tr>
       
    <tr>
       <td>Markah Penuh</td>
       <td><input type="text" name="markahpenuh"></td>
    </tr>
    
   </table>
   <button class="tambah" type="submit" name="submit">Tambah</button>
</form>
    
 <link rel="stylesheet" href="popup.css">
    
    <div class="success" id="berjaya" style="display:none;">
    <span class="closebtn" onclick=" this.parentElement.style.display = 'none';">&times;</span>BERJAYA TAMBAH PENILAIAN</div>
        
         <div class="failed" id="tidak" style="display:none;">
    <span class="closebtn" onclick=" this.parentElement.style.display = 'none';">&times;</span>TIDAK BERJAYA TAMBAH PENILAIAN
    <?php echo "$sql<br>".mysqli_error($sambungan)?>
    </div>
    
    
<?php
  include("sambungan.php");


  if (isset($_POST["submit"])){
      $idpenilaian=$_POST["idpenilaian"];
      $aspek=$_POST["aspek"];
      $markahpenuh=$_POST["markahpenuh"];
      
      $sql="insert into penilaian values('$idpenilaian','$aspek','$markahpenuh')";
      
      $result = mysqli_query($sambungan, $sql);
      if ($result == true)
  echo"<script>document.getElementById('berjaya').style.display='block';</script>";
      else
          echo"<script>document.getElementById('tidak').style.display='block';</script>";
          
          
  }

?>