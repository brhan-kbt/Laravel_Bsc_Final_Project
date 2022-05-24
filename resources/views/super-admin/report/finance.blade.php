
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
.centerData{
      display: flex;
      align-items: center;
      justify-content: center;
      background: gray;
      padding: 10px;
}
.ETB{
  color: linear-gradient(45deg, rgba(255,0,0,1) 29%, rgba(246,255,0,1) 62%, rgba(0,255,11,1) 91%);
}
</style>
</head>
<body>

    <h1>Total Finance Data Report!</h1>
  <div class="centerData">
    <h4>From tithe:{{$tithes->sum('amount')}} <span class="ETB">ETB</span> </h4>
    <h4>From Offering:{{$offerings->sum('amount')}} <span class="ETB">ETB</span></h4>
    <h4>From Service Payment:{{$servicePayments->sum('amount')}} <span class="ETB">ETB</span></h4>
    <h4>From Promise:{{$promises->sum('promisedAmount')}} <span class="ETB">ETB</span></h4>
    <h2>Total Income of this Year: {{$tithes->sum('amount') + $offerings->sum('amount') + $servicePayments->sum('amount') + $promises->sum('promisedAmount')}} <span class="ETB">ETB</span></h2>
  </div>
   
  <h1>Details Below!</h1>
<h2>1. Tithes Data</h2>

<table id="customers">
  <tr>
    <th>No.#</th>
    <th>Member Name</th>
    <th>Phone</th>
    <th>Date</th>
    <th>Amount</th>
  </tr>
    @foreach ($tithes as $tithe)
    <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$tithe->memberName}}</td>
    <td>{{$tithe->phone}}</td>
    <td>{{$tithe->date}}</td>
    <td>{{$tithe->amount}}</td>
    </tr>
    @endforeach 
</table>


<h2>2. Offering Data</h2>

<table id="customers">
  <tr>
    <th>No.#</th>
    <th>Member Name</th>
    <th>Phone</th>
    <th>Date</th>
    <th>Amount</th>
    <th>Reason</th>
  </tr>
    @foreach ($offerings as $offering)
    <tr>
        <td>{{$loop->iteration}}</td>
    <td>{{$offering->memberName}}</td>
    <td>{{$offering->phone}}</td>
    <td>{{$offering->date}}</td>
    <td>{{$offering->amount}}</td>
    <td>{{$offering->reason}}</td>
    </tr>
    @endforeach 
</table>



<h2>3. Promises Data Report!</h2>

<table id="customers">
  <tr>
    <th>No.#</th>
    <th>Member Name</th>
    <th>Promised Amount</th>
    <th>Paid Amount</th>
    <th>Balance</th>
    <th>Promised Date</th>
    <th>Reason</th>
  </tr>
    @foreach ($promises as $promise)
    <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$promise->memberName}}</td>
    <td>{{$promise->promisedAmount}}</td>
    <td>{{$promise->paidAmount}}</td>
    <td>{{$promise->balance}}</td>
    <td>{{$promise->promisedDate}}</td>
    <td>{{$promise->reason}}</td>
    </tr>
    @endforeach 
</table>


<h2>4. Service Payment Data</h2>

<table id="customers">
  <tr>
    <th>No.#</th>
    <th>Member Name</th>
    <th>Phone</th>
    <th>Date</th>
    <th>Amount</th>
    <th>Reason</th>
  </tr>
    @foreach ($servicePayments as $servicePayment)
    <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$servicePayment->memberName}}</td>
    <td>{{$servicePayment->phone}}</td>
    <td>{{$servicePayment->paidDate}}</td>
    <td>{{$servicePayment->amount}}</td>
    <td>{{$servicePayment->reason}}</td>
    </tr>
    @endforeach 
</table>

</body>
</html>


