
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
h1{
    text-align: center;
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
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Members Data!</h1>

<table id="customers">
  <tr>
   <th>No.#</th>
    <th>Full Name</th>
    <th>Baptismal Name</th>
    <th>Rep-F-Name</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Status</th>
  </tr>
  @foreach ($members as $member)
    <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$member->fullName}}</td>
    <td>{{$member->baptismalName}}</td>
    <td>{{$member->repetanceFatherName}}</td>
    <td>{{$member->phone}}</td>
    <td>{{$member->address}}</td>
    <td>{{$member->status}}</td>
    </tr>
    @endforeach 
 
</table>

</body>
</html>


