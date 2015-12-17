<?php 

/**
* Permet de charger automatiquement les classes quand on les utilise
*/
class Autoloader
{
	static function autoload()
	{
		spl_autoload_register(array(__CLASS__,'load'));
	}

	static function load($class)
	{
		require($class.'.php'); // On inclut la classe correspondante au paramètre passé.
		//echo __DIR__.'\\'.$class.'.php<br/>';
	}
	
}
