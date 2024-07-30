<!DOCTYPE html>
<html>
<head>
<style>
.bill {
  width: 300px;
  padding: 20px;
  border: 1px solid #ccc;
  font-family: Arial, sans-serif;
}

.brand {
  font-size: 24px;
  font-weight: bold;
}

.address {
  font-size: 12px;
  margin-top: 10px;
}

.shop-details {
  font-size: 12px;
  margin-top: 10px;
}

.bill-details {
  font-size: 12px;
  margin-top: 10px;
}

.table {
  width: 100%;
  margin-top: 10px;
  border-collapse: collapse;
  font-size: 12px;
}

.table th {
  text-align: left;
  background-color: #eee;
  padding: 5px;
}

.table td {
  padding: 5px;
  border-bottom: 1px solid #ccc;
}

.total td {
  font-weight: bold;
}

.net-amount td {
  font-weight: bold;
  background-color: #eee;
}

.flex {
  display: flex;
  align-items: center;
}

.justify-between {
  justify-content: space-between;
}

.payment-details {
  font-size: 12px;
  margin-top: 10px;
}

</style>
</head>
<body>

<div class="bill">
  <div class="brand">
    AMIT CHAMBIAL PVT LTD
  </div>
  <div class="address">
    FLoor 2 Building No 34 India <br> Phone No- 0192083910
  </div>
  <div class="shop-details">
    PAN: AAKPS9298A TIN: 09820163701
  </div>
  <div>RETAIL INVOICE </div>
  <div class="bill-details">
    <div class="flex justify-between">
      <div>BILL NO: 091</div>
      <div>TABLE NO: 091</div>
    </div>
     <div class="flex justify-between">
      <div>BILL DATE: 10/Mar/2022</div>
      <div>TIME: 14:10</div>
    </div>
  </div>
  <table class="table">
    <tr class="header">
    <th>
      Particulars
    </th> <th>
      Rate
    </th> <th>
      Qty
    </th>
       <th>
      Amount
    </th>
    </tr>
    <tr>
      <td>Head and Shoulder</td>
      <td>100</td>
      <td>2</td>
      <td>200</td>
    </tr>
    <tr>
      <td>Britania</td>
      <td>25</td>
      <td>2</td>
      <td>50</td>
    </tr>
    <tr>
      <td>Tomatoes</td>
      <td>40</td>
      <td>1</td>
      <td>40</td>
    </tr>
    <tr>
      <td>Chocolates</td>
      <td>5</td>
      <td>12</td>
      <td>60</td>
    </tr>
    <tr class="total">
      <td></td>
      <td>Total</td>
      <td>17</td>
      <td>350</td>
    </tr>
    <tr>
      <td></td>
      <td>CGST</td>
      <td>5%</td>
      <td>17.5</td>
    </tr>
    <tr>
      <td></td>
      <td>SGST</td>
      <td>5%</td>
      <td>17.5</td>
    </tr>
    <tr>
      <td></td>
      <td>RND-Off</td>
      <td>0</td>
      <td>17.5</td>
    </tr>
    <tr class="net-amount">
      <td></td>
      <td>Net Amnt</td>
      <td></td>
      <td>385</td>
    </tr>
  </table>
  Payment Method:Card<br>
 Transaction ID: 082098082783
  <br>Username: Pradeep [Biller] <br>
  Thank You ! Please visit again
</div>
</body>
</html>
