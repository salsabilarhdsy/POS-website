<!DOCTYPE html>
<html>
	<head>
		<title>Koperasi Sekolah</title>
<style>
thead{
	width: 20px;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 23%;
    text-align: left;
}

td, th {
    padding: 5px;
}

</style>
	</head>
<body><thead>
<h1>KOPERASI SISWA</h1>
<p>Tanggal transaksi : {{$data['created_at']}}</p>
<p>Kode Transaksi : {{$data['order_id']}}</p>
</thead>
<table>
	<tr>=====================================
		<th>Deskripsi</th>
		<th>Harga</th>
		<th>Quantity</th>
		<th>Subtotal</th>
	</tr>
	@foreach ($listproducts as $listproduct)
	<tr>
		<td>{{ $listproduct->product_name }}</td>
		<td>{{ $listproduct->product_price }}</td>
		<td><center>{{ $listproduct->quantity }}</center></td>
		<td>{{ $listproduct->subtotal }}</td>
	</tr>
	@endforeach
</table>
<table>
	<tr>=====================================
		<td></td>
		<td></td>
		<td><th>Total :</th></td>
		<td>{{$data['total']}}</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><th>Bayar :</th></td>
		<td>{{$data['bayar']}}</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><th>Kembali :</th></td>
		<td>{{$data['kembali']}}</td>
	</tr>
</table>=====================================
	<h3>TERIMA KASIH</h3>
</body>

<script type="text/javascript">
window.onload = function(){
	window.print();
	window.location.replace("/");
}
</script>
</html>