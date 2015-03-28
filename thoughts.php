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
						<textarea class="form-control input-lg" rows="2" name="thoughtbox" placeholder="Text input" size='50px'
							onKeyDown="limitText(this.form.thoughtbox,this.form.countdown,140);" 
							onKeyUp="limitText(this.form.thoughtbox,this.form.countdown,140);"></textarea>
						<!--<font size="1">(Maximum characters: 140)<br>You have 
							<input readonly type="text" name="countdown" size="3" value="140"> characters left.</font>-->
					</div>
					<div class='col-md-1'>
						<div class="form-group">
							<label>.</label><br>
					    <input class="btn btn-default" type="submit" value="Submit"></input>
					  </div>
					</div>
					<div class="form-group">
				    <label for="search">Search for</label>
				    <input type="text" class="form-control" id="searchbox" placeholder="Search for">
				  </div>
				  <input class="btn btn-default" type="submit" value="Submit"></input>
				</form>
			</div> <!--end div row of form-->
			<hr>
			<div class='row'>
				<form method='post' action="<?php echo $_SERVER['PHP_SELF'] ?>">
					
				</form>
			</div>

			<div class='row'>
				<div class='col-md-3 col-xs-3'></div>
				<div class='col-md-6 col-xs-6' style="max-height:420px;overflow-y:auto;">
					<?php
						// The following loads the Pear MDB2 class and our functions
						require_once("MDB2.php");
						require_once("/home/cs304/public_html/php/MDB2-functions.php");
						require_once('wmdb-dsn.inc');
						$dbh = db_connect($wmdb_dsn);
						
						if ( isset($_POST['thoughtbox']) ) {
							$entry = strip_tags( trim( $_POST['thoughtbox'] ) );

							if ( empty($entry) ) {
								// CASE 1A
								// Does nothing. (Avoids blank input.)
								echo "<div class='alert alert-danger alert-dismissible' role='alert' style='width:100%'>\n
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>\n
								<strong>Oops! Your entry looks empty.</strong>\n
								</div>\n";

							} elseif ( (strpos($entry,'#') == true) /*&& (strpos($entry,'# ') !== true)*/ ) {
								// CASE 1B
								echo '<p>hashtag';
								echo "<p>$entry";

								preg_match_all("/(#\w+)/", $entry, $matches2);
								foreach ($matches2[1] as $value2) {
									echo "<p>$value2";
								}

								$sql = "INSERT INTO allthoughts(content,uid) values (?,1)";
								$resultset = prepared_statement($dbh,$sql,$entry);
								$list_of_thoughts = $resultset->fetchAll(MDB2_FETCHMODE_ASSOC);
						  	echo $list_of_thoughts;

							} else {
								echo "<div class='alert alert-danger alert-dismissible' role='alert' style='width:100%'>\n
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>\n
								<strong>Uh-oh! Your entry must have (1) a message and (2) hashtags (in that order).</strong>\n
								</div>\n";
							}
						} elseif ( isset($_POST['searchbox']) ) {
							$search_for = strip_tags( trim( $_POST['searchbox'] ) );

							if ( strpos($search_for,'happy')==true ) {
								echo "<p>happy";
							} elseif ( strpos($search_for,'sad')==true ) {
								echo "<p>sad";
							} else {
								echo "<p>other<br>$search_for";
							}
						}
					?>
				</div>
			</div>
			
			
		</div>
		<div>
			<p align="center">&copy; Amanda Foun, Priscilla Lee, and Sunnia Ye
				<br>for Codestellation 2015 at Brandeis University
			</p>
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