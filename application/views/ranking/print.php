<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse; 
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
<h1 style="text-align: center;">Data Siswa</h1>
<table border="1" width="100%">
<tr>
	<th>Produk</th>
	<th>Nilai</th>
</tr>
<!-- <tr>
        <td><?php echo $a1; ?></td>
        <td><?php echo $n1; ?></td>
        </tr>
 -->        <tr>
        <td>asd</td>
        <td>ubur</td>
        </tr>
</table>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Hasil Perangkingan.pdf', 'D');
?>