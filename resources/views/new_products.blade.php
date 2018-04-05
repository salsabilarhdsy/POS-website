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
              <li><a href="/listorders"><i class="fa fa-list-ul"></i> Data Penjualan</a></li>
              <li class="active"><a href="/newproduct"><i class="fa fa-cubes"></i> Tambah Barang</a></li>
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
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form-horizontal" id="form_transaksi" role="form" action="/newproduct_proses" method="POST">
            @csrf
            <div class="col-md-8">
                     <div class="form-group">
                        <label class="control-label col-md-3" for="nama_barang">Kategori :</label>
                        <div class="col-md-8">
                            <select class="form-control reset" name="category_id" id="category_id" onchange="showCategory(this.value)">
                                <option value="" >Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <div class="col-md-8">
                            <input class="form-control reset" name="kodeproduk" id="kodeproduk" readonly="readonly" type="hidden">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="nama_barang">Nama Barang :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control reset" name="namaproduk" id="namaproduk">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3" for="nama_barang">Harga(Rp.) :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control reset" name="hargaproduk" id="hargaproduk">
                        </div>
                    </div>

                   <div class="form-group">
                       <div class="col-md-offset-3 col-md-3">
                            <button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
                        </div>
                    </div>

                
                  <!-- </div>
                </div> --><!-- end panel-->
            </div><!-- end col-md-8 -->
            </form>
         

    <!-- Modal selesai -->
    <script type="text/javascript">
        function showCategory(str) 
        {

        if (str == "") {
            $('#kodeproduk').val('');
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
                  document.getElementById("kodeproduk").value = 
                  xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "getCategory/"+str,true);
          xmlhttp.send();
        }
        }
    </script>
  

</body>
</html>