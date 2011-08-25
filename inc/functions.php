<?php
class database() {
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "fetchi";
	
	function __construct() {
		$this->dbh = @mysql_connect($this->host, $this->username, $this->password);
		if (!$this->dbh) {
			echo "Es ist ein Fehler bei der Datenbankverbindung aufgetreten, <br /> bitte kontaktieren Sie den Administrator.";
			echo mysql_error();
			exit;
		}
		mysql_select_db($this->database);
	}

	function getAllData($uid, $table) {
		
		$sql = mysql_query("SELECT * FROM  `".$table."` WHERE  `uid` =".$uid);
			if($sql) {
				$results;
				$i = 0;
		
				while ($row = mysql_fetch_row($sql)) {
					$results[$i] = $row;
					$i++;
				}
				echo '<br>Daten erfolgreich geholt!';
				return $results;
			} else {
				echo 'Fehler! '.mysql_error();
			}
	}
	
	function getOneData($table, $var, $uid) {
		$sql = mysql_query("SELECT `".$var."` FROM `".$table."` WHERE  `uid` =".$uid);
			if($sql) {
				$results;
				$i = 0;
		
				while ($row = mysql_fetch_row($sql)) {
					$results[$i] = $row;
					$i++;
				}
				echo '<br>Daten erfolgreich geholt!';
				return $results;
			} else {
				echo 'Fehler! '.mysql_error();
			}
	}
	
	function setData($table, $what, $content) {
		$sql = mysql_query("Insert INTO `".$this->database."`.".$table."(".$what.") VALUES (".$content.")");
		if($sql) {
			echo 'Datensatz erstellt!';
		} else {
			echo 'Fehler beim erstellen des Datensatzes!<br>';
			echo mysql_error();
		}
	}
	
	function search($table, $field, $data) {
		$sql = mysql_query("SELECT * FROM `".$table."` WHERE `".$field."` =".$data);

		if($sql) {
			echo 'Gebe Suche aus für: '.$data.'in Feld '.$field.'<br>';
			$results;
			$i = 0;
	
			while ($row = mysql_fetch_row($sql)) {
				$results[$i] = $row;
				$i++;
			}
			echo '<br>Daten erfolgreich geholt!';
			return $results;
		} else {
			echo '<br>Fehler bei der Suche!<br>';
			echo mysql_error();
		}
	}
	
	function sortByField($fieldname) {
	
	}
	
	function deleteData($table, $condition, $f_condition) {
		$sql = mysql_query("DELETE FROM `".$this->database."`.`".$table."` WHERE `".$f_condition."` =".$condition);
		if($sql) {
			echo 'Datensatz erfolgreich gelöscht!';
		} else {
			echo 'Fehler beim Löschen des Datensatzes:<br>';
			echo mysql_error();
		}
	}
	
	function deleteUser($uid) {
		$sql = mysql_query("DELETE FROM `".$this->database."`.`user` WHERE `uid` =".$uid);
		if($sql) {
			echo 'User Datensatz erfolgreich gelöscht!';
		} else {
			echo 'Fehler beim Löschen des Datensatzes:<br>';
			echo mysql_error();
		}	
	}
	
	function setUser($name, $pass, $mail) {
		$sql = mysql_query("Insert INTO `".$this->database."`.`user`(name, pass, mail) VALUES ('$name', '$pass', '$mail')");
		if($sql) {
			echo 'User Datensatz erfolgreich erstellt!';
		} else {
			echo 'Fehler beim Löschen des Datensatzes:<br>';
			echo mysql_error();
		}	
	}
}
?>
}
?>