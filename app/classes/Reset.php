<?php 
	
/**
* 
*/
class Reset extends Input
{
	const ID = 'reset';

	function __construct($value = 'Rénitialiser',$class='')
	{
		parent::__construct(self::ID,$value,$class,'',Input::TYPE_RESET);
	}

	public function setType($type)
	{
		if($type !== self::TYPE_RESET && $type !== parent::TYPE_RESET) {
			//si on ne passe pas une des deux constantes
			throw new Exception(__CLASS__.' : ne peut être un autre type de RESET', 2);
		}
		$this->_type = $type;
	}
}
 ?>
