<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta
	name="viewport"
	content="width=device-width,
			initial-scale=1.0"/>
	<link rel="stylesheet" href="styling.css"
		class="css" />
</head>
<body style="background-color=#1e6b30' > 
	<div class="container">
	<div class="main-content">
		<p class="text">EPHARM</p>
	</div>


	<div class="last-content">

		<!-- <button type="button" class="pay-now-btn">
		Netbanking options
		</button> -->
	</div>
<form method="POST"  action = "checkout.php"
	<div class="card-details">
		<p>Pay using Credit or Debit card</p>

		<div class="card-number">
		<label> Card Number </label>
		<input
			type="text"
			class="card-number-field"
			placeholder="###-###-###"  required/> 
		</div>
		<br />
		<div class="date-number">
		<label> Expiry Date </label>
		<input type="text" class="date-number-field"
				placeholder="DD-MM-YY"  required/>
		</div>

		<div class="cvv-number">
		<label> CVV number </label>
		<input type="text" class="cvv-number-field"
				placeholder="xxx"  required/>
		</div>
		<div class="nameholder-number">
		<label> Card Holder name </label>
		<input
			type="text"
			class="card-name-field"
			placeholder="Enter your Name" required/>
		</div>

		<button type="submit"    
				class="submit-now-btn">
		submit
		</button>
      
	</div>
</form>
	</div>
</body>
</html>