<?php
	function fConnect(){
		$host = "tuxa.sme.utc";
		$dbname = "dbnf17p068";
		$user = "nf17p068";
		$pass = "dfPP2dZF";
		$port = "5432";
		try {
			$db = pg_connect("host=".$host." port=".$port." user=".$user." dbname=".$dbname." password=".$pass." options='--client_encoding=UTF8'");
		} Catch (Exception $e) {
			Echo $e->getMessage();
		}
		return $db;
	}
