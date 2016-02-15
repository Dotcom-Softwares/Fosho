<?php

	class query
	{
		protected static $table = 'basetable';
		
		
		public function select()
		{
			echo  "SELECT * FROM " . static::$table ; 
		}
		public function insert()
		{
			echo "INSERT INTO " . static::$table ;
		}
	
	}

?>