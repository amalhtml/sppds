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

<h3 class ="panjang">TAMBAH PESERTA</h3>
<form class="panjang" action="peserta_insert.php" method="post">
   <table>
    <tr>
       <td class="warna">No KP</td>
       <td><input required type="text" name="nokp" placeholder="666666224444" pattern="[0-9]{12}" 
                  oninvalid="this.setCustomValidity('Sila masukkan 12 nombor')" oninput="this.setCustomValidity('')"></td>
    </tr>
       
    <tr>
       <td class="warna">Nama Peserta</td>
       <td><input type="text" name="namapeserta"></td>
    </tr>
       
     <tr>
       <td class="warna">No Telefon</td>
       <td><input type="text" name="telefon"></td>
    </tr>
       
    <tr>
       <td class="warna">Kata Laluan</td>
       <td><input type="text" name="password"></td>
    </tr>
    
    <tr>
       <td class="warna">Nama Hakim</td>
       <td><select name="idhakim">
        <?php
           $sql="select * from hakim ";
           $data=mysqli_query($sambungan,$sql);
           while($hakim=mysqli_fetch_array($data)){
               echo"<option value='$hakim[idhakim]'>$hakim[namahakim]</option>";
           }
           ?>
           </select>
        </td>
    </tr>
     
    <tr>
       <td class="warna">Nama Urusetia </td>
       <td> <select name="idurusetia">
        <?php
           $sql="select * from urusetia";
           $data=mysqli_query($sambungan,$sql);
           while($urusetia=mysqli_fetch_array($data)){
            echo"<option value='$urusetia[idurusetia]'>$urusetia[namaurusetia]</option>";
           }
           ?>
           </select>
        </td>
       </tr>
       
   </table>
   <button class="tambah" type="submit" name="submit">Tambah</button>
</form>

<br>
<center>
  <button class="biru" onclick="tukar_warna(0)">Biru</button>
  <button class="hijau" onclick="tukar_warna(1)">Hijau</button>
  <button class="merah" onclick="tukar_warna(2)">Merah</button>
  <button class="hitam" onclick="tukar_warna(3)">Hitam</button>
</center>

<script>
  function tukar_warna(n) {

    var warna=["Blue","Green","Red","Black"];
    var teks= document.getElementsByClassName("warna");
    for(var i=0;i<teks.length;i++)
        teks[i].style.color=warna[n];

   }
</script>


    <link rel="stylesheet" href="popup.css">
    
    <div class="success1" id="berjaya" style="display:none;">
    <span class="closebtn" onclick=" this.parentElement.style.display = 'none';">&times;</span>
        BERJAYA TAMBAH PESERTA</div>
        
         <div class="failed1" id="tidak" style="display:none;">
    <span class="closebtn" onclick=" this.parentElement.style.display = 'none';">&times;</span>
             TIDAK BERJAYA TAMBAH PESERTA
    <?php echo "$sql<br>".mysqli_error($sambungan)?>
    </div>
    
<?php
  include("sambungan.php");

  if (isset($_POST["submit"])){
      $nokp=$_POST["nokp"];
      $password=$_POST["password"];
      $namapeserta=$_POST["namapeserta"];
      $telefon=$_POST["telefon"];
      $idhakim=$_POST["idhakim"];
      $idurusetia=$_POST["idurusetia"];
      $sql="insert into peserta values('$nokp','$password','$namapeserta','$telefon','$idhakim','$idurusetia')";
      
      $result=mysqli_query($sambungan,$sql);
      if($result == true)
         echo"<script>document.getElementById('berjaya').style.display='block';</script>";
      else
          echo"<script>document.getElementById('tidak').style.display='block';</script>";
          
  }
?>

