<?php
  include('sambungan.php');
  include("urusetia_menu.php");
  

?>
    
<link rel="stylesheet" href="senarai.css">
    
<table>
     <caption>SENARAI NAMA URUSETIA</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kata laluan</th>
        <th colspan="2">Tindakan</th>
    </tr>

<?php
  $sql="select * from urusetia";
  $result=mysqli_query($sambungan,$sql);
  while($urusetia=mysqli_fetch_array($result)){
      echo"<tr><td>$urusetia[idurusetia]</td>
      <td>$urusetia[namaurusetia]</td>
      <td>$urusetia[password]</td>
      <td><a href='urusetia_update.php?idurusetia=$urusetia[idurusetia]'>kemas kini</a></td>
      <td><a href='urusetia_delete.php?idurusetia=$urusetia[idurusetia]'>padam</a></td>
      </tr>";
  }
        
?>
</table>

    