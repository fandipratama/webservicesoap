<html> 
	<head> 
	<script type="text/javascript" src="libs/jquery.min.js"></script>
	<script type="text/javascript" src="libs/jquery.form.js"></script>
		<title>Tugas 2</title> 
		<style type="text/css"> 
		.labelfrm { 
			display:block; 
			font-size:small; 
			margin-top:5px; 
		} 
		.error { 
			font-size:small; 
			color:red; 
		} 
		</style> 
	</head> 
	<body> 
		<h1>Data Mahasiswa</h1> 
		<form action="" method="post" id="frm"> 
			<label for="nim" class="labelfrm">NIM: </label> 
			<input type="text" name="nim" id="nim" maxlength="20" class="required" size="15"/> 		 
			<label for="nama" class="labelfrm">NAMA: </label> 
			<input type="text" name="nama" id="nama" size="30" class="required"/> 
 
			<label for="alamat" class="labelfrm">ALAMAT: </label> 
			<textarea name="alamat" id="alamat" cols="40" rows="4" class="required"></textarea> 
 
 			<label for="prodi" class="labelfrm">prodi: </label> 
			<input type="text" name="prodi" id="prodi" maxlength="30" class="required" size="15"/> 	

			<input type="submit" name="Input" value="Input" id="input"/> 
		</form> 
	</body> 

</html>
<?php
//header("Content-type text/xml");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akademik";
$sambung=mysql_connect($servername,$username,$password);
   mysql_select_db($dbname,$sambung);
  
if (isset($_POST['Input'])) {
	$nim  	= strip_tags($_POST['nim']);
	$nama  	= strip_tags($_POST['nama']);
	$alamat = strip_tags($_POST['alamat']);
	$prodi = strip_tags($_POST['prodi']);
 
	//input ke db
	$query = sprintf("INSERT INTO mahasiswa VALUES('%s', '%s', '%s', '%s')", 
			mysql_escape_string($nim), 
			mysql_escape_string($nama), 
			mysql_escape_string($alamat),
			mysql_escape_string($prodi)
		);
	$sql = mysql_query($query);
	$pesan = "";
	if ($sql) {
		$pesan = "Data berhasil disimpan";
		header("location:clientmhsw.php?id=$nim");
	} else {
		$pesan = "Data gagal disimpan ";
		$pesan .= mysql_error();
	}
	$response = array('pesan'=>$pesan, 'data'=>$_POST);
}
?>