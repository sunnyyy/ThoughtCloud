<?php
	// The following loads the Pear MDB2 class and our functions
	require_once("MDB2.php");
	require_once("/home/cs304/public_html/php/MDB2-functions.php");
	require_once('sye2-dsn.inc');
	$dbh = db_connect($sye2_dsn);
	
	if ( isset($_GET['searchbox']) ) {
		$entry = strip_tags( trim( $_GET['searchbox'] ) );
		$search_for = '%#'.$search_for.'%';

		$sql = "SELECT content FROM allthoughts WHERE content like ? ";
		$resultset = getEntries($dbh,$sql,$search_for);

		while($row = $resultset->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			echo "<div class='bub'>";
			$cont = $row['content'];
			echo "<p>$content</p>\n</div>";
		}
	}
?>