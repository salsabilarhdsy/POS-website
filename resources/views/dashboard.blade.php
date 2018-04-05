<!DOCTYPE html>
<html lang="en">
<head>
	<title>Koperasi Siswa</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="assets/bootstrap-3.3.5/css/bootstrap.min.css">
  	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  	<link rel="stylesheet" href="assets/datatables/css/dataTables.bootstrap.css">
  	<script src="assets/jquery-2.1.4.min.js"></script>
  	<script src="assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>
	<script src="assets/datatables/js/jquery.dataTables.min.js"></script>
	<script src="assets/datatables/js/dataTables.bootstrap.js"></script>
  	<script src="assets/maskMoney/jquery.maskMoney.min.js"></script>
  	<style type="text/css">
	  	#header,#footer{
	  		background-color: #337ab7;
	  		color: #fff;
	  		text-align: left;
	  		font-family: all;
	  	}
	  	#header{
	  		margin-bottom: 30px;
	  	}
	  	#header h1{
	  		margin: 0;
	  		padding: 15px;
	  		font-family: sans-serif;
	  	}
	  	#footer{
	  		padding: 5px;
	  		text-align: center;
	  		margin-top: 5%;
	  	}
	  	.btn{
			border-radius: 2px;
		}
		.btn-kecil{
			padding: 0 6px 0 6px;
		}
		.form-control[disabled], .form-control[readonly], 
		fieldset[disabled] .form-control{
			background-color: #EBF2F8;
		}
		.besar{
			font-size: 20px;
			font-weight: 300;
		}
		table th,table td{
			text-align: center;
		}
		form{
			margin-top: 20px;
		}
		.mb{
			margin-bottom: 30px;
		}
		.nav ul li{
			list-style: none;
		}
		.nav ul{
			padding-left: 20px;
			
		}
		.nav ul li a{
			text-decoration: none;
			display: block;
			padding: 4px;
			margin: 3px;
		}
		.nav ul li a:hover{
			text-decoration: none;
			color: #fff;
			background-color: #337ab7;
			border-radius: 2px;
		}
		.nav>li>a:hover{
			background-color: #337ab7;
			color: #fff;
		}
		.nav ul .active{
			background-color: #337ab7;
			border-radius: 2px;
		}
		.nav ul .active a{
			color: #fff;
		}
		.nav li a:active,.nav li a:focus{
			background-color: #337ab7;
			border-radius: 2px;
			color: #fff;
		}
		.logout{
			color: white;
			float: right;
			margin-top: -3%;
			margin-right: 1%;
			text-decoration-style: none;
			font-size: 16px;
		}
  	</style>
</head>
<body>
<div id="header">
<h1>Koperasi Siswa</h1>
<a href="{{ route('logout') }}" class="logout">LOGOUT</a> 
</div><!-- end header -->
	<div class="col-md-3">
		<div class="panel panel-default">
		  <div class="panel-body">
			<ul class="nav nav-pills nav-stacked">
			  <li class="active"><a href=""><i class="fa fa-shopping-cart"></i> Tambah Penjualan</a></li>
			  <li><a href="/listorders"><i class="fa fa-list-ul"></i> Data Penjualan</a></li>
			  <li><a href="/newproduct"><i class="fa fa-cubes"></i> Tambah Barang</a></li>
			  <li><a href="/ListProducts"><i class="fa fa-list-ul"></i> Data Barang</a></li>
			  <li><a href="/newcategory"><i class="fa fa-cubes"></i> Tambah Kategori</a></li>
              <li><a href="/ListCategory"><i class="fa fa-list-ul"></i> Data Kategori</a></li>
			</ul>
		  </div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">
		 <div class="panel-body">
		 	<form class="form-horizontal" id="form_transaksi" role="form">
	      	<div class="col-md-8">
			    <!-- <div class="panel panel-default">
				  <div class="panel-body"> -->
	      		<!-- <div class="form-group">
			      <label class="control-label col-md-4" 
			      	for="tgl_transaksi">Tgl.Transaksi :</label>
			      <div class="col-md-5">
			        <input type="text" class="form-control" 
			        	name="tgl_transaksi" value="<?= date('d-m-Y') ?>" 
			        	readonly="readonly">
			      </div>
			    </div> -->
			    <div class="form-group">
			      <label class="control-label col-md-3" for="name">Nama Barang :</label>
			      <div class="col-md-5">
			         <input list="list_barang" class="form-control reset" placeholder="Isi nama..." name="nama_barang" id="nama_barang" autocomplete="off" onchange="showBarang(this.value)">
	                  <datalist id="list_barang">
	                  	@foreach ($products as $product)
	                  		<option value="{{$product->name}}">{{$product->no_product}}</option>
	                  	@endforeach
	                  </datalist>
			      </div>
			    </div>

			    <div id="barang">
			    	<div class="form-group">
			    	<div class="col-md-8">
				    	<input type="hidden" class="form-control reset" name="no_product" id="no_product" readonly="readonly" >
					</div>
					</div>

				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga_barang">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="harga_barang" id="harga_barang" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	autocomplete="off" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)" id="qty" min="1" 
				        	name="qty" placeholder="Isi qty...">
				      </div>
				    </div>
			    </div><!-- end id barang -->
			    <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="sub_total">Sub-Total (Rp):</label>
			      <div class="col-md-8">
			        <input type="text" class="form-control reset" 
			        	name="sub_total" id="sub_total" 
			        	readonly="readonly">
			      </div>
			    </div>
			    <div class="form-group">
			    	<div class="col-md-offset-3 col-md-3">
			      		<button type="button" class="btn btn-primary" 
			      		id="tambah" onclick="addbarang()" disabled="disabled">
			      		  <i class="fa fa-cart-plus"></i> Tambah</button>
			    	</div>
			    </div>
			      <!-- </div>
			    </div> --><!-- end panel-->
	      	</div><!-- end col-md-8 -->
	      	</form>
	      	<form id="save_order" method="POST" action="simpanOrder">
	      	@csrf
	      	<div class="col-md-4 mb">
				<div class="col-md-12">
				  	<div class="form-group">
				      <label for="total" class="besar">Total (Rp) :</label>
				      	<input type="text" class="form-control input-lg" 
			        	name="total" id="total" placeholder="0"
			        	readonly="readonly">
				    </div>
				    <div class="form-group">
				      <label for="bayar" class="besar">Bayar (Rp) :</label>
				        <input type="text" class="form-control input-lg uang" 
				        	name="bayar" placeholder="0" autocomplete="off"
				        	id="bayar" onkeyup="showKembali(this.value)">
				    </div>
				    <div class="form-group">
				      <label for="kembali" class="besar">Kembali (Rp) :</label>
				      	<input type="text" class="form-control input-lg" 
			        	name="kembali" id="kembali" placeholder="0"
			        	readonly="readonly">
				    </div>
				</div>
	      	</div><!-- end col-md-4 -->
	      	
	      	
	      	<table id="table_transaksi" class="table table-striped 
	      		table-bordered">
				<thead>
				 	<tr>
					   	<th>Kode Barang</th>
					   	<th>Nama Barang</th>
					   	<th>Harga</th>
					   	<th>Quantity</th>
					   	<th>Sub-Total</th>
				 	</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div class="col-md-offset-8" style="margin-top:20px">
				<button type="submit" class="btn btn-primary btn-lg" 
				id="selesai" disabled="disabled">
				Selesai <i class="fa fa-angle-double-right"></i></button>
			</div>
	      </div>
	    </div>
	</div><!-- end col-md-9 -->
	</form>
	
	<div class="col-md-12" id="footer">
		<small>Copyright <?= date('Y') ?>, All Right Reserved.</small>
	</div>

	<!-- Modal selesai -->
<script type="text/javascript">
	function showBarang(str) 
	{

	    if (str == "") {
	    	$('#id_product').val('');
	    	$('#no_product').val('');
	        $('#nama_barang').val('');
	        $('#harga_barang').val('');
	        $('#qty').val('');
	        $('#sub_total').val('');
	        $('#reset').hide();
	        return;
	    } else { 
	      if (window.XMLHttpRequest) {
	          // code for IE7+, Firefox, Chrome, Opera, Safari
	           xmlhttp = new XMLHttpRequest();
	      } else {
	          // code for IE6, IE5
	          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	      }
	      xmlhttp.onreadystatechange = function() {
	           if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	              document.getElementById("barang").innerHTML = 
	              xmlhttp.responseText;
	          }
	      }
	      xmlhttp.open("GET", "getBarang/"+str,true);
	      xmlhttp.send();
	    }
	}

	function subTotal(qty)
	{
		var harga = $('#harga_barang').val();
		if (harga >0 ){
		$('#sub_total').val(harga*qty);
		$('#tambah').prop("disabled", false);}
	}

	function convertToRupiah(angka)
	{

	    var rupiah = '';    
	    var angkarev = angka.toString().split('').reverse().join('');
	    
	    for(var i = 0; i < angkarev.length; i++) 
	      if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	    
	    return rupiah.split('',rupiah.length-1).reverse().join('');
	
	}


  	function addbarang(){ 
	
  	var no_product = $("#no_product").val();
  	var namabarang = $("#nama_barang").val();
  	var hargabarang = $("#harga_barang").val();
  	var qty = $("#qty").val();
  	var subtotal = $("#sub_total").val();


	$("#table_transaksi tbody").append("<tr><td><input type='hidden' name='id_input[]' value='"+ no_product +"'>"+ no_product +"</td><td><input type='hidden' name='name_input[]' value='"+ namabarang +"'>"+ namabarang +"</td><td><input type='hidden' name='price_input[]' value='"+ hargabarang +"'>"+ hargabarang +"</td><td><input type='hidden' name='quantity_input[]' value='"+ qty +"'>"+ qty +"</td><td><input type='hidden' name='subtotal_input[]' value='"+ subtotal +"'>"+ subtotal +"</td></tr>");
	showTotal();
    showKembali($('#bayar').val());
          //mereset semua value setelah btn tambah ditekan
    $('.reset').val('');
    $('#tambah').prop("disabled", true)
	}

	function showTotal()
    {

    	var total = $('#total').val();

    	var sub_total = $('#sub_total').val();

    	$('#total').val(Number(total)+Number(sub_total));

  	}

  	//maskMoney
	$('.uang').maskMoney({
		thousands:'.', 
		decimal:',', 
		precision:0
	});

	function showKembali(str)
  	{
	    var total = $('#total').val().replace(".", "").replace(".", "");
	    var bayar = str.replace(".", "").replace(".", "");
	    var kembali = bayar-total;

	    $('#kembali').val(convertToRupiah(kembali));

	    if (total > 0 & kembali >= 0) {
	      $('#selesai').removeAttr("disabled");
	    }else{
	      $('#selesai').attr("disabled","disabled");
	    };

	    if (total == '0') {
	      $('#selesai').attr("disabled","disabled");
	    };
  	}


</script>

</body>
</html>

 