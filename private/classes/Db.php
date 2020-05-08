<?php 


/**
 * summary
 */
class Db
{
    public static $dsn  = 'mysql:host=localhost;dbname=hyc';

	public static function connect()
	{
		return new PDO(self::$dsn, 'root', '');
	}

}
