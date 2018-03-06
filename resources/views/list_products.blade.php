@include('header')
<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 80%;
    margin: 5%;

}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: black;
    opacity: 0.8;
    color: white;
}
.button {
  background-color: #f4511e;
  border: none;
  color: white;
  padding: 5px 6px;
  text-align: center;
  font-size: 16px;
  margin: 2px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
  border-radius: 2px;
}

.button:hover {opacity: 1}
</style>
</head>
<body>

<table>
  <tr>
    <th>Name</th>
    <th>Price</th>
    <th>Action</th>
  </tr>
@foreach($data as $item)
   <tr>
    <td>{{$item->name}}</td>
    <td>Rp. {{$item->price}}</td>
    <td><a href="/editproduct/{{$item->id}}"><button class="button">Edit</button></a><a href="/deleteproduct_proses/{{$item->id}}"><button class="button">Delete</button></a></td>
</tr>
@endforeach
</table>


</body>
</html>
@include('footer')