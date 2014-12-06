<?

/****************************************************************************
*	mysql_db class
*	Lot of this is initially based on the
*	mysql class that came with phpBB which
*	was distributed under the following terms:
*
*	"This program is free software; you can redistribute it and/or modify
*	it under the terms of the GNU General Public License as published by
*	the Free Software Foundation; either version 2 of the License, or
*	(at your option) any later version."
***************************************************************************/

class db {

	var $db_connect_id;
	var $query_result;
	var $row = array();
	var $rowset = array();
	

	/* db: Constructor that provides the connection id to the mysql database */
	function db($dbdatabase='') {
	
		$this->host = 'localhost';
		$this->user = 'kyccwic_thomas';
		$this->password = 'melanie123';
		
	
		if ($dbdatabase=='')
		{
			$this->database = 'kyccwic_misc';
		}
		else
		{
			$this->database = $dbdatabase;
		}

		
		/* Create connection to mysql server */
		$this->db_connect_id = @mysql_connect($this->host, $this->user, $this->password);

		/* If we successfully connected.... */
		if($this->db_connect_id)
		{
			/* If a database was set... */
			if($this->database != '')
			{
				$dbselect = @mysql_select_db($this->database);
				if(!$dbselect)
				{
					@mysql_close($this->db_connect_id);
					$this->db_connect_id = $dbselect;
				}
			}
			return $this->db_connect_id;
		}
		/* Otherwise the connection failed */
		else
		{
			return false;
		}
	}
	
	/* db_close: Closes the mysql connection */
	function db_close () {
		if($this->db_connect_id)
		{
			/* See if we have an existing query so we can clear it just to play nice */
			if($this->query_result)
			{
				@mysql_free_result($this->query_result);
			}
			/* Close the connection and then return how it went */
			$result = @mysql_close($this->db_connect_id);
			return $result;
		}
		else
		{
			return false;
		}
	}
		
	/* db_query: Runs a query on the database */
	function db_query($query='') {
		/* Play it safe and clear out existing results */
		unset($this->query_result);
		
		//echo '<!--' . $query . ' -->';
		
		if ($query!='')
		{
			$this->query_result = @mysql_query($query,$this->db_connect_id);
			return $this->query_result;
		}
		else
		{
			return false;
		}
	}
	
	/* db_numrows: Returns the number of rows in a query result */
	function db_num_rows($query_id = 0) {
		if (!$query_id)
		{
			$query_id = $this->query_result;
		}
		if ($query_id)
		{
			$result = @mysql_num_rows($query_id);
			return $result;
		}
		else
		{
			return false;
		}
	}

	function db_fetch_row($query_id = 0)
	{
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			$this->row[$query_id] = @mysql_fetch_array($query_id);
			return $this->row[$query_id];
		}
		else
		{
			return false;
		}
	}
	
	/* db_fetch_array: Fetches arrays for me */
	function db_fetch_array ($query_id = 0) {
		if (!$query_id)
		{
			$query_id = $this->$query_result;
		}
		if ($query_id)
		{
			while($this->rowset[$query_id] = @mysql_fetch_array($query_id))
			{
				$result[] = $this->rowset[$query_id];
			}
			return $result;
		}
		else
		{
			return false;
		}
	}
	
	/* db_freeresult: Frees up the result from query in order to reduce memory load */
	function db_free_result($query_id = 0){
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}

		if ( $query_id )
		{
			unset($this->row[$query_id]);
			unset($this->rowset[$query_id]);

			@mysql_free_result($query_id);

			return true;
		}
		else
		{
			return false;
		}
	}
	
	function db_next_id ($table, $id_uid='id') {
		$query = "SELECT $id_uid FROM $table ORDER BY $id_uid DESC LIMIT 1";

		$result = $this->db_query($query);

		$item = $this->db_fetch_row($result);
		
		$id = $item[$id_uid] + 1;
					
		return ($id);
	}
	
	function db_check_exists($table, $check, $value) {
		
		$query = "SELECT $check FROM $table WHERE $check='$value'";
		
		$result = $this->db_query($query);

		if ($this->db_num_rows($result) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>
