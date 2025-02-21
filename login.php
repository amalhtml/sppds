<?php
  session_start();
 //CONNECT TO DATABASE
  include('sambungan.php');
//GET THE POST VALUES
  if (isset($_POST['submit'])){
      //PAST POST THE VARIABLE
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    
    $jumpa = FALSE;
	if ($jumpa == FALSE) {
        //EXE. THE SQL STATEMENT
        $sql = "SELECT * FROM peserta";
    	$result = mysqli_query($sambungan, $sql);
		while($peserta = mysqli_fetch_array($result))   {
			if ($peserta['nokp'] == $userid && $peserta["password"] == $password) {
				$jumpa = TRUE;
				$_SESSION['idpengguna'] = $peserta['nokp'];
				$_SESSION['nama'] = $peserta['namapeserta'];
				$_SESSION['status'] = 'peserta';
				break;
			}
		}
	}    
  
  if ($jumpa == FALSE) {
      //OPEN MENU HAKIM
        $sql = "SELECT * FROM hakim" ;
        $result = mysqli_query($sambungan, $sql);
        while($hakim = mysqli_fetch_array($result))   {
            if ($hakim['idhakim'] == $userid && $hakim["password"] == $password) {
                $jumpa = TRUE;
                $_SESSION['idpengguna'] = $hakim['idhakim'];
                $_SESSION['nama'] = $hakim['namahakim'];
                $_SESSION['status'] = 'hakim';
                break;
            }
        }
    }
    
    if ($jumpa == FALSE) {
        //OPEN MENU URUSETIA
        $sql = "SELECT * FROM urusetia";
        $result = mysqli_query($sambungan, $sql);
        while($urusetia = mysqli_fetch_array($result))   {
            if ($urusetia['idurusetia'] == $userid && $urusetia['password'] == $password) {
                $jumpa = TRUE;
                $_SESSION['idpengguna'] = $urusetia['idurusetia'];
                $_SESSION['nama'] = $urusetia['namaurusetia'];
                $_SESSION['status'] = 'urusetia';
                break;     
            }
        }
    }
      
    if ($jumpa == TRUE) { 
        //OPEN MENU PESERTA
		if ($_SESSION['status'] == 'peserta')
            header("Location: peserta_home.php");
		else if ($_SESSION['status'] == 'hakim')
			header("Location: hakim_home.php");
		else if ($_SESSION['status'] == 'urusetia')
			header("Location: urusetia_home.php");
    }
    else 
        echo "<script>alert('Kesalahan pada id pengguna atau kata laluan'); 
        window.location='login.php'</script>";
}

?>


<html>
  <link rel="stylesheet" href="button.css">
  <link rel="stylesheet" href="login.css">
  <body>

      <h3 class="pendek">LOG MASUK</h3>
      <form class = "pendek" action="login.php" method="post">
        <table>
          <tr>
            <td><img src="imej/user.png"></td>
            <td><input type="text" name="userid" placeholder="idpengguna"></td>
         </tr>
          
          <tr>
            <td><img src="imej/lock.png"></td>
            <td><input type="password" name="password" placeholder="katalaluan"></td>
            </tr>
            </table>
      <button class ="login" type="submit" name="submit">Log Masuk</button>
      <button class ="signup" type="button" onclick="window.location='signup.php'">Daftar Masuk</button>
    </form>
    </body>
</html> 




    
        