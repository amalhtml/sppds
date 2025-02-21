<?php
  include("sambungan.php");
  include("urusetia_menu.php");

?>
    
<link rel="stylesheet" href="senarai.css">
    
<table>
     <caption>SENARAI HAKIM</caption>
    <tr>
        <th>ID Hakim</th>
        <th>Nama</th>
        <th>Kata Laluan</th>
        <th colspan="2">Tindakan</th>
    </tr>

<?php
  $sql="select * from hakim";
  $result=mysqli_query($sambungan,$sql);
  while($hakim=mysqli_fetch_array($result)){
      echo"<tr><td>$hakim[idhakim]</td>
      <td>$hakim[namahakim]</td>
      <td>$hakim[password]</td>
      <td><a href='hakim_update.php?idhakim=$hakim[idhakim]'>kemas kini</a></td>
      <td><a href='hakim_delete.php?idhakim=$hakim[idhakim]'>padam</a></td>
      </tr>";
  }
        
?>
</table>