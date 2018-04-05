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
        <li><a href="/"><i class="fa fa-shopping-cart"></i> Tambah Penjualan</a></li>
        <li class="active"><a href="/listorders"><i class="fa fa-list-ul"></i> Data Penjualan</a></li>
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
          <div class="col-md-12">
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

          <table id="table_transaksi" class="table table-striped 
            table-bordered">
        <thead>
          <tr>
              <th>No Order</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Harga Satuan</th>
              <th>Quantity</th>
              <th>Sub-Total</th>
              <th>Tanggal Order</th>
          </tr>
          @foreach ($data as $item)
          <tr>
          
              <td>{{$item->id}}</td>
              <td>{{$item->product_id}}</td>
              <td>{{$item->product_name}}</td>
              <td>{{$item->product_price}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->subtotal}}</td>
              <td>{{$item->created_at}}</td>
          </tr>
           @endforeach
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </form>
  </div>
  </div>
  </div>
  </body>
  </html>