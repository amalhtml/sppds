<?php
  include("sambungan.php"); 
  if(isset($_POST['nokp'])) {    
    $nokp = $_POST["nokp"];
    $password = $_POST["password"];
    $namapeserta = $_POST["namapeserta"];
    $telefon = $_POST["no_tel"];
    $idhakim = $_POST["idhakim"];
	$idurusetia = $_POST["idurusetia"];
      
    $sql = "insert into peserta values('$nokp', '$password', '$namapeserta', '$telefon', '$idhakim', 
            '$idurusetia')";
    $result = mysqli_query($sambungan, $sql);

    if ($result)
        echo"<script>alert('Berjaya Daftar Masuk')</script>";
    else 
       echo"<script>alert('Tidak Berjaya Daftar Masuk')</script>" ;
    echo "<script>window.location='login.php'</script>";
}

?>

<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="button.css">
<body>
      <h3 class="panjang">DAFTAR MASUK</h3>
      <form class="panjang" action="signup.php" method="post">
        <table>
        <tr>
            <td>No KP</td>
       <td><input required type="text" name="nokp" placeholder="666666224444" pattern="[0-9]{12}" 
                  oninvalid="this.setCustomValidity('Sila masukkan 12 nombor')" 
                  oninput="this.setCustomValidity('')"></td>
    </tr>
          
        <tr>
            <td>Nama Peserta</td>
            <td><input required type="text" name="namapeserta"></td>
        </tr>
               
        <tr>
            <td>No Telefon</td>
            <td><input required type="text" name="no_tel"></td>
        </tr>
        
        <tr>
            <td>Kata Laluan </td>
            <td><input required type="text" name="password"></td>
         </tr>
          
        <tr>
            <td>Nama Hakim</td>
            <td>
                  <select name="idhakim">
            <?php
             $sql = "select * from hakim";
             $data = mysqli_query($sambungan, $sql);
             while ($hakim = mysqli_fetch_array($data))
{
             echo "<option value='$hakim[idhakim]'>$hakim[namahakim]</option>";
                 
             }
          
       ?>
      </select>
    </td>
   </tr>
            
    <tr>
       <td class="warna">Nama Urusetia</td>
       <td> <select name="idurusetia">
        <?php
           $sql = "select * from urusetia";
           $data = mysqli_query($sambungan, $sql);
           while ($urusetia = mysqli_fetch_array($data))
{
            echo "<option value='$urusetia[idurusetia]'>$urusetia[namaurusetia]</option>";
           }
           ?>
           </select>
        </td>
    </tr>
</table>
      <button class="tambah" type="submit">Daftar</button>
      <button class="padam" type="button" onclick="window.location='login.php'">Batal</button>
    </form>
    </body>

<?php

if(mysqli_affected_rows($sambungan)>0)
    echo"<script>document.getElementById('berjaya').style.display='block';</script>";
    
    else
         echo"<script>document.getElementById('tidak').style.display='block';</script>";
        
        mysqli_close($sambungan);
?>



