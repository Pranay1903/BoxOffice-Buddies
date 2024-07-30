<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
		}

		.invoice {
			max-width: 800px;
			padding: 20px;
			border: 1px solid #ccc;
			display: flex;
			flex-direction: column;
			align-items: center;
			text-align: center;
		}

		.invoice-header {
			display: flex;
			flex-direction: column;
			align-items: flex-start;
			margin-bottom: 20px;
			width: 100%;
		}

		.invoice-header h1 {
			font-size: 32px;
			margin: 0;
		}

		.invoice-header p {
			font-size: 16px;
			margin: 0;
			text-align: left;
			margin-top: 5px;
			margin-bottom: 5px;
			font-weight: bold;
		}

		.invoice-date {
			display: flex;
			justify-content: flex-end;
			align-items: center;
			width: 100%;
			margin-bottom: 20px;
		}

		.invoice-date p {
			font-size: 16px;
			margin: 0;
			text-align: right;
		}

		.invoice-body {
			margin-bottom: 20px;
		}

		.invoice-body table {
			width: 100%;
			border-collapse: collapse;
		}

		.invoice-body th,
		.invoice-body td {
			padding: 10px;
			text-align: center;
			border-bottom: 1px solid #ccc;
		}

		.invoice-body th {
			font-weight: bold;
		}

		.invoice-total {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.invoice-total p {
			font-size: 20px;
			font-weight: bold;
			margin: 0;
		}

		.invoice-total button {
			padding: 10px;
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="invoice">
	<div class="invoice-header">
			<h1>Invoice</h1>
			<p>Customer Name: John Doe</p>
		</div>
		<div class="invoice-date">
			<p>Date: April 25, 2023</p>
		</div>
		<div class="invoice-body">
			<table>
				<thead>
					<tr>
						<th>Movie ID Name</th>
						<th>Screen Name</th>
						<th>Seat Qty</th>
						<th>Seat Name</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>The Avengers</td>
						<td>Screen 1</td>
						<td>2</td>
						<td>A1, A2</td>
						<td>$20.00</td>
					</tr>
					<!-- <tr>
						<td>Black Panther</td>
						<td>Screen 2</td>
						<td>3</td>
						<td>B3, B4, B5</td>
						<td>$30.00</td>
					</tr> -->
				</tbody>
			</table>
		</div>
		<div class="invoice-total">
			<p>Total: $50.00</p>
			<button>Pay Now</button>
		</div>
	</div>
</body>
</html>
