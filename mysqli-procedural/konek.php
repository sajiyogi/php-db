<?php
$servername="localhost";
$username= "root";
$password="";
$dbname ="latihan";

//craete connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn) {
	die("connection gagal: " . mysqli_connect_error());
}
$sql = "SELECT NIM, Nama, Alamat FROM mahasiswa";
$result = mysqli_query($conn, $sql);
// if(mysqli_num_rows($result) > 0){
// 	//output data dari setiap row
// 	while ( $row = mysqli_fetch_assoc($result)) {
// 		echo "".$row["negara"];
// 		echo " mempunyai ".$row["champion"];
// 		echo " wakil di liga champion<br>";
// 	}
} 
// else {
// 	echo "0 result";
// }
mysqli_close($conn);
?> 