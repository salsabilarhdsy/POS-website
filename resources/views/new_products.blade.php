@include('header')

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/app.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body{
  background-color: #f2f2f2;
}
.container input[type=text], select, textarea{
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    float: right;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 1%;

  
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 2%;
    margin-left: 10%;
    margin-right: 10%;
}

.col-25 {
    float: left;
    width: 20%;
    padding: 4px;
}

.col-75 {
    float: right;
    width: 80%;
    padding: 4px;
}

.col-75 img{
    width: 200px;
    height: 200px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    margin: 5%;
    width: 60%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}


</style>
</head>
<body>
<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  <form action="/newproduct_proses" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-25">
        <label for="kode">Kode Produk</label>
      </div>
      <div class="col-75">
        <input type="text" id="kodeproduk" name="kodeproduk" placeholder="Kode Produk" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="nama">Nama Produk</label>
      </div>
      <div class="col-75">
        <input type="text" id="namaproduk" name="namaproduk" placeholder="Nama Produk" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="kategori">Kategori</label>
      </div>
       <div class="col-75">
        <input type="text" id="kategori" name="kategori" placeholder="Kategori Produk" >
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="harga">Harga (Rp.)</label>
      </div>
       <div class="col-75">
        <input type="text" id="hargaproduk" name="hargaproduk" placeholder="Harga Produk" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="deskripsi">Deskripsi Produk</label>
      </div>
      <div class="col-75">
        <textarea id="deskripsi" name="deskripsi" placeholder="Write something.." style="height:200px" ></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="images">Gambar Produk</label>
      </div>
       <div class="col-75">
        <input type="text" id="gambarproduk" name="gambarproduk" >
      </div>
    </div>
    <div class="row">
      <div class="col-75">
      <input type="submit" id="submit" value="Tambah Produk">
      </div>
    </div>
  </form>

</div>

</body>
</html>

@include('footer')