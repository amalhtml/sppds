<?php
  include("sambungan.php");
  include("urusetia_menu.php");

?>
    
<link rel="stylesheet" href="senarai.css">

    
<table>
     <caption>SENARAI NAMA PESERTA</caption>
    <tr>
        <th>No KP</th>
        <th>Nama Peserta </th>
        <th>Kata Laluan</th>
        <th>No Tel</th>
        <th>ID Hakim</th>
        <th colspan="2">Tindakan</th>
    </tr>

<?php
  $sql="select * from peserta";
  $result=mysqli_query($sambungan,$sql);
  while($peserta=mysqli_fetch_array($result)){
      echo"<tr><td>$peserta[nokp]</td>
      <td class='nama'>$peserta[namapeserta]</td>
      <td>$peserta[password]</td>
      <td>$peserta[telefon]</td>
      <td>$peserta[idhakim]</td>
      <td><a href='peserta_update.php?nokp=$peserta[nokp]'>kemas kini</a></td>
      <td><a href='peserta_delete.php?nokp=$peserta[nokp]'>padam</a></td>
      </tr>";
  } //tamat while
        
?>
</table>