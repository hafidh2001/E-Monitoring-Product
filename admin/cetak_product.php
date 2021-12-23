<?php

require_once __DIR__ . '/vendor/autoload.php';
// MENGHUBUNGKAN KONEKSI DATABASE
require "koneksi_admin.php";
$products = query("SELECT tb_products.*, tb_bio_mhs.* FROM tb_products INNER JOIN tb_bio_mhs ON tb_products.id_mhs = tb_bio_mhs.id_mhs");

$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage('c', 'A4-L');

$html =
'<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Product</title>
</head>
<body>
  <h1> Daftar Product </h1>
      <table id="example"  border="1" cellpadding="10" cellspasing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Tim</th>
            <th>Ketua</th>
            <th>Judul Products</th>
            <th>Deskripsi Produk</th>
          </tr>
        </thead>
      <tbody>';
                      
      $no = 1;
      foreach ($products as $product) {
        $html .= '<tr>
            <th>'. $no++ . '</th>
            <td>' . $product["nama_tim"] . '</td>
            <td>' . $product["nama_depan"] . " " . $product["nama_belakang"] . '</td>
            <td>' . $product["judul_prod"] . '</td>
            <td>' . $product["deskripsi_prod"] . '</td>
            </tr>';
      }
   
$html .=  '</tbody>
</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('product_emon.pdf', 'I');
?>