<?php 
	
/**
* 
*/
class Submit extends Input
{
	const ID = 'submit';

	function __construct($value = 'Envoyer',$class='')
	{
		parent::__construct(self::ID,$value,$class,'',Input::TYPE_SUBMIT);
	}

	public function setType($type)
	{
		if($type !== self::TYPE_SUBMIT && $type !== parent::TYPE_SUBMIT) {
			//si on ne passe pas une des deux constantes
			throw new Exception(__CLASS__.' : ne peut être un autre type de SUBMIT', 2);
		}
		$this->_type = $type;
	}
}
 ?>
