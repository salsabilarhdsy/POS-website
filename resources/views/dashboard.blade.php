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
			  <li><a href="#"><i class="fa fa-list-ul"></i> List Data Penjualan</a></li>
			  <li><a href="/newproduct"><i class="fa fa-cubes"></i> Tambah Barang</a></li>
			  <li><a href="/ListProducts"><i class="fa fa-list-ul"></i> List Data Barang</a></li>
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
			      <label class="control-label col-md-3" 
			      	for="id_barang">Kode Produk :</label>
			      <div class="col-md-5">
			        <input list="list_barang" class="form-control reset" 
			        	placeholder="Isi kode produk" name="no_product" id="no_product" 
			        	autocomplete="off" onchange="showBarang(this.value)">

	                  <datalist id="list_barang">
	                  	@foreach ($data as $item)
	                  		<option value="{{$item->id}}">{{$item->name}}</option>
	                  	@endforeach
	                  </datalist>

			      </div>
			      <div class="col-md-1">
			      	<a href="javascript:;" class="btn btn-primary" 
			      		data-toggle="modal" 
			      		data-target="#modal-cari-barang">
			      		<i class="fa fa-search"></i></a>
		          </div>
			    </div>
			    <div id="barang">
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="nama_barang">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="name" id="name" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga_barang">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="price" id="price" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	autocomplete="off" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)" id="qty" min="0" 
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
			      		id="tambah" onclick="addbarang()">
			      		  <i class="fa fa-cart-plus"></i> Tambah</button>
			    	</div>
			    </div>
			      <!-- </div>
			    </div> --><!-- end panel-->
	      	</div><!-- end col-md-8 -->
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
	      	</form>

	      	<table id="table_transaksi" class="table table-striped 
	      		table-bordered">
				<thead>
				 	<tr>
					   	<th>No</th>
					   	<th>Id Barang</th>
					   	<th>Nama Barang</th>
					   	<th>Harga</th>
					   	<th>Quantity</th>
					   	<th>Sub-Total</th>
					   	<th>Aksi</th>
				 	</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div class="col-md-offset-8" style="margin-top:20px">
				<button type="button" class="btn btn-primary btn-lg" 
				id="selesai" disabled="disabled" 
				onclick="alert('Belum ada action untuk save pejualan')">
				Selesai <i class="fa fa-angle-double-right"></i></button>
			</div>
	      </div>
	    </div>
	</div><!-- end col-md-9 -->
	<div class="col-md-12" id="footer">
		<small>Copyright <?= date('Y') ?>, All Right Reserved.</small>
	</div>

	<!-- Modal selesai -->
  <div class="modal fade" id="modal-cari-barang" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal cari barang dengan AJAX</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
          	<div class="form-group has-primary has-feedback">
            	<input type="text" class="form-control input-lg" placeholder="Search for...">
            	<span class="glyphicon glyphicon-search form-control-feedback"></span>
          	</div>
          	<table class="table">
          		<thead>
          			<tr>
          				<th>asd</th>
          				<th>asd</th>
          				<th>asd</th>
          				<th>asd</th>
          				<th>asd</th>
          				<th>asd</th>
          			</tr>
          		</thead>
          	</table>
		  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        </div>
      </div>
      
    </div>
  </div>

	
</body>
</html>