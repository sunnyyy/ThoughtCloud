<?php
	// The following loads the Pear MDB2 class and our functions
	require_once("MDB2.php");
	require_once("/home/cs304/public_html/php/MDB2-functions.php");
	require_once('sye2-dsn.inc');
	$dbh = db_connect($sye2_dsn);
	
	if ( isset($_GET['thoughtbox']) {
		$entry = strip_tags( trim( $_GET['thoughtbox'] ) );

		if ( empty($entry) ) {
			// CASE 1A
			// Does nothing. (Avoids blank input.)
			echo "<div class='alert alert-danger alert-dismissible' role='alert' style='width:100%'>\n
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>\n
			<strong>Oops! Your entry looks empty.</strong>\n
			</div>\n";

		} elseif ( (strpos($entry,'#') == true) {
			// CASE 2A
			echo '<p>hashtag';
			echo "<p>$entry";

			preg_match_all("/(#\w+)/", $entry, $matches2);
			foreach ($matches2[1] as $value2) {
				echo "<p>$value2";
			}

			$sql = "INSERT INTO allthoughts(content,uid) values (?,1)";
			$resultset = prepared_statement($dbh,$sql,$entry);
			$list_of_thoughts = $resultset->fetchAll(MDB2_FETCHMODE_ASSOC);
    	return $list_of_thoughts;

		} else {
			echo "<div class='alert alert-danger alert-dismissible' role='alert' style='width:100%'>\n
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>\n
			<strong>Uh-oh! Your entry must have (1) a message and (2) hashtags (in that order).</strong>\n
			</div>\n";
		}
	}
	
?>