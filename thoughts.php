<!DOCTYPE html>
<html lang="en">
  <head>
		<title>Thought Cloud</title>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

	  <!-- Bootstrap -->
	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	  <!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <![endif]-->
		<style>
			/* Sunnia did CSS */
			body {
	      font-family: 'Open Sans', sans-serif;
	      background: #003;
	      color: #da5;
			}
	    h1 {
	      text-align: center;
	    }
	    li {
	    	font-size: 150%;
	    }
	    a:link, a:visited, a:active, a:hover {
	      color: #000;
	    }
	    .jumbotron {
	    	background: none;
	    	padding-top: 0px;
	    	padding-bottom: 0px;
	    	margin-top: 0px;
	    	margin-bottom: 0px;
	    	overflow-x: hidden;
	    }
	    #form textarea {
	    	font-size: 200%;
	    }
		</style>
  </head>
  <body>
  	<!--
  	-->

		<div class='jumbotron'>
			<h1>Welcome to the Thought Cloud</h1>
		</div>
		<div class='container'>

			<div class='row'>
				<div class='col-md-2'></div>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
					<div class='col-md-8'>
						<label>.</label><br>
						<textarea class="form-control input-lg" rows="2" name="thought2" placeholder="Text input" size='50px'
							onKeyDown="limitText(this.form.thought2,this.form.countdown,140);" 
							onKeyUp="limitText(this.form.thought2,this.form.countdown,140);"></textarea>
						<!--<font size="1">(Maximum characters: 140)<br>You have 
							<input readonly type="text" name="countdown" size="3" value="140"> characters left.</font>-->
					</div>
					<div class='col-md-1'>
						<div class="form-group">
							<label>.</label><br>
					    <input class="btn btn-default" type="submit" value="Submit"></input>
					  </div>
					</div>
				</form>
			</div> <!--end div row of form-->

			<div class='row'>
				<div class='col-md-3 col-xs-3'></div>
				<div class='col-md-6 col-xs-6' style="max-height:420px;overflow-y:auto;">
					<?php
						// The following loads the Pear MDB2 class and our functions
						require_once("MDB2.php");
						require_once("/home/cs304/public_html/php/MDB2-functions.php");
						require_once('wmdb-dsn.inc');
						$dbh = db_connect($wmdb_dsn);
						
						if ( isset($_POST['thought2']) ) {
							$entry = strip_tags( trim( $_POST['thought2'] ) );

							if ( empty($entry) ) {
								// CASE 1A
								// Does nothing. (Avoids blank input.)
								echo "blank input";

							} elseif ( (strpos($entry,'#') == true) /*&& (strpos($entry,'# ') !== true)*/ ) {
								// CASE 2A
								echo '<p>hashtag';
								echo "<p>$entry";

								preg_match_all("/(#\w+)/", $entry, $matches2);
								foreach ($matches2[1] as $value2) {
									echo "<p>$value2";
								}
							} else {
								echo "<p>isn't working<br>$entry";
							}
						}
					?>
				</div>
			</div>
			
			
		</div>
		<div>
			<p align="center">&copy; Amanda Foun, Priscilla Lee, and Sunnia Ye</p>
		</div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script language="javascript" type="text/javascript">
			function limitText(limitField, limitCount, limitNum) {
				if (limitField.value.length > limitNum) {
					limitField.value = limitField.value.substring(0, limitNum);
				} else {
					limitCount.value = limitNum - limitField.value.length;
				}
			}
		</script>
  </body>
</html>