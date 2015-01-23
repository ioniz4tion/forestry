<?php


class functions {

	//uploads files to the server
	public static function upload($name) {
		//$allowedExts = array("gif", "jpeg", "jpg", "JPG", "x-png", "png", "pjpeg");
		$temp = explode(".", $_FILES[$name]["name"]);
		$extension = end($temp);
		
		  if ($_FILES[$name]["error"] > 0)
		    {
		    //echo "Return Code: " . $_FILES[$name]["error"] . "<br>";
		    }
		  else
		    {
		    //echo "Upload: " . $_FILES[$name]["name"] . "<br>";
		    //echo "Type: " . $_FILES[$name]["type"] . "<br>";
		    //echo "Size: " . ($_FILES[$name]["size"] / 1024) . " kB<br>";
		    //echo "Temp file: " . $_FILES[$name]["tmp_name"] . "<br>";

		    if (file_exists("upload/" . $_FILES[$name]["name"]))
		      {
		      //echo $_FILES[$name]["name"] . " already exists. ";
		      }
		    else
		      {
		      move_uploaded_file($_FILES[$name]["tmp_name"],
		      "upload/" . $_FILES[$name]["name"]);
		      //echo "Stored in: " . "upload/" . $_FILES[$name]["name"];
		      }
		    }		  
	}	

	//checks if the user is logged on
	public static function loginCheck() {
		session_start();		
		if (array_key_exists("forestrylogin", $_SESSION)) {
			return true;
		} else {
			return false;
		}
	}

	//logs into the database using the info below
	public static function sqlLogin() {
		//sql information
		$user_name = "root";
		$password = "qpalzm12Claude";
		$database = "rocky_mountain_forestry";
		$server = "localhost";

		//connection to database
		//$db_handle = mysql_connect($server, $user_name, $password);
		return $db_handle = mysqli_connect($server, $user_name, $password, $database);

		
		//$db_found = mysql_select_db($database);
	}

	//this function selects the table from a database
	public static function tbSelect($tb, $db_handle) {
		$SQL = "SELECT * FROM " . $tb;
		$result = mysqli_query($db_handle, $SQL);		
		return $result;
	}

	//this function saves records from inputs on forms
	public static function save($numberOfRecords, $records, $table,$db_handle) {
		//finds out how many records-columns need saved
		$recordAmounts = count($records);

		//loops through all of the record-column names
		for ($k=0; $k < $recordAmounts; $k++) {
			//loops through all of the records for the column		
			for ($i = 0; $i < $numberOfRecords; $i++) {				
				$record[$k][$i] = mysqli_real_escape_string($db_handle,$_POST[$records[$k] . $i]);
				$SQL = "UPDATE " . $table . " SET " . $records[$k] . " = '" . $record[$k][$i] . "' WHERE ID = '" . ($i + 1) . "'";
				mysqli_query($db_handle,$SQL);			 
			}
		}
	}

	//this function saves file based records if they are not blank based on the 'choose file' input
	public static function saveFile($numberOfRecords, $records, $table,$db_handle) {
		//finds out how many records-columns need saved
		$recordAmounts = count($records);

		//loops through all of the record-column names
		for ($k=0; $k < $recordAmounts; $k++) {
			//loops through all of the records for the column		
			for ($i = 0; $i < $numberOfRecords; $i++) {				
				$record[$k][$i] = mysqli_real_escape_string($db_handle,$_FILES[$records[$k] . $i]["name"]);
				if (!$record[$k][$i] == "") {
					$SQL = "UPDATE " . $table . " SET " . $records[$k] . " = '" . $record[$k][$i] . "' WHERE ID = '" . ($i + 1) . "'";
					mysqli_query($db_handle,$SQL);					
					functions::upload($records[$k] . $i);
				}						 
			}
		}
	}

	//assigns values of the database onto the records provided
	public static function sqlAssign($result, $records) {
		$records_number = count($records);		
		$i = 0;
		while ( $db_field = mysqli_fetch_assoc($result) ) {
			for ($k=0; $k < $records_number; $k++) {
				$assigned[$k][$i] = $db_field[$records[$k]];
				$assigned[$k][$i] = str_replace('"', "&quot;", $assigned[$k][$i]);
				$assigned[$k][$i] = str_replace("'", "&#39;", $assigned[$k][$i]);
			}
			$i++;
		}
		if (isset($assigned)) {
			return $assigned;
		}
	}

	//adds a record to the end of the table, no values
	public static function add($tb, $number,$db_handle) {
		$SQL = "INSERT INTO " . $tb . " (ID) VALUES (" . ($number + 1) . ")";
		mysqli_query($db_handle,$SQL);
	}

	//deletes the specified id, and closes the id gap
	public static function delete($tb, $number, $numberOfRecords,$db_handle) {
		$SQL = "DELETE FROM " . $tb . "  WHERE Id= " . ($number + 1);
		mysqli_query($db_handle,$SQL);
		for ($i=$number; $i < $numberOfRecords; $i++) { 
			$SQL = "UPDATE " . $tb . " SET ID = '" . $i . "' WHERE ID = '" . ($i + 1) . "'";	
			mysqli_query($db_handle,$SQL);
		}
	}








}
?>