<?php  

// MENGHUBUNGKAN KONEKSI DATABASE
	require "koneksi_admin.php";

// MENGHUBUNGKAN KONEKSI COMPOSER
    require "../data/lib-composer/vendor/autoload.php";


// JIKA SUDAH LOGIN MASUKKAN KEDALAM SHOWDATA
	if ( !isset($_SESSION["masuk"]) ) {
    	header('location: admin_login.php');
    	exit;
  	} 

?>

<?php
	//tangkap id yang di tekan
	$id = $_GET["id_product"];

	if ( delete_product($id) > 0 ) {
		echo " 
			<script>
				alert ('data berhasil dihapus !');
				document.location.href = 'admin_product.php';
			</script>
		";
	} else {
		echo " 
			<script>
				alert ('data gagal dihapus !');
				document.location.href = 'admin_product.php';
			</script>
		";
	}

?>