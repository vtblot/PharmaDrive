<?php 

/**
* 
*/
class Alert
{
	/**
	* Type de l'alerte : Erreur, Success, Warning
	*/
	private $_type;

	/**
	* Message  de l'alerte
	*/
	private $_msg;
	


	function __construct($type,$msg)
	{
		if($type ==='error' || $type === 'erreur')
		{
			//pour coriger le reflexe d'écrire erreur
			$type = 'danger';
		}
		$this->_type = $type;
		$this->_msg = $msg;
	}


	public function alert()
	{
		echo '<div class="alert alert-dismissible alert-'.$this->_type.'">';
  		echo '<button type="button" class="close" data-dismiss="alert">x</button>';
 		echo $this->_msg;
		echo '</div>';
	}

	public function getType()
	{
		return $this->_type;
	}

	public function setType($var)
	{
		$this->_type=$var;
	}

	public function getMsg()
	{
		return $this->_msg ;
	}

	public function setMsg($var)
	{
		$this->_msg=$var;
	}

}



