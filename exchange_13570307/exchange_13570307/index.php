<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome.css">
	<link rel="stylesheet" type="text/css" href="font-awesome.min.css">
	<style type="text/css">
		p{
			display: inline;
		}
	</style>
</head>
<body>
<?php
	function get_currency($amount, $from, $to) {
	    if($from == 'THB'){
	    	if($to == 'USD'){
	    		$result = $amount * 0.028563;
	    	}else if($to == 'EUR'){
	    		$result = $amount * 0.0269246359;
	    	}
	    }else if($from == 'USD'){
	    	if($to == 'EUR'){
	    		$result = $amount * 0.942640336;
	    	}else if($to == 'THB'){
	    		$result = $amount * 35.010328;
	    	}
	    }else if($from == 'EUR'){
	    	if($to == 'USD'){
	    		$result = $amount * 1.06085;
	    	}else if($to == 'THB'){
	    		$result = $amount * 37.1407065;
	    	}
	    }
	    return $result;
	}

	if (isset($_GET['submit'])) {
		
		$val1 = htmlentities($_GET['from']);
	    $val2 = htmlentities($_GET['to']);
	    $money = htmlentities($_GET['num']);
	    if($val1==$val2){
		    echo "";
		    $result = $money;
		}else{
		   	$result = get_currency($money,$val1, $val2);
		}
	    $moneylast = $money." ".$val1;
	    $resultlast = $result." ".$val2;
	}
?>
<script>
	function myFunction() {
	    document.getElementById("from").innerHTML = "<?php echo $moneylast ?>";
	    document.getElementById("to").innerHTML = "<?php echo $resultlast ?>";
	}
</script>
<div id="BG01">
			<form   method="GET">
				<input class="field" type="text" name="num" placeholder="money"><br><br>
					<div class="exc">
						<select class="cc" name="from">
						  <option value="THB">THB</option>
						  <option value="EUR">EUR</option>
						  <option value="USD">USD</option>
						</select> 

						<select class="cc" name="to">
						  <option value="THB">THB</option>
						  <option value="EUR">EUR</option>
						  <option value="USD">USD</option>
						</select>
				
					<div class="real" style="display: inline;">
						<input class="butto" type="submit" name="submit" value="" onclick="myFunction()"></input>
						<i class="fa fa-sort fa-3x APL"></i>
					</div>
				</div>
			</form>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
		<div class="fontbig">
			<?php  

				if(isset($moneylast)&&isset($resultlast)){
					echo $moneylast."&nbsp;&nbsp; TO&nbsp;&nbsp;&nbsp;".$resultlast;
				}
				
			?>
		</div>


<!-- <p id="from">    0 xxx </p> : <p id="to">    0 xxx </p> -->
</body>
</html>