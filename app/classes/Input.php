<?php 

/**
* 
*/
class Input
{
	protected $_class;

	protected $_name;

	protected $_type;
	protected $_value;

	protected $_require;
	protected $_autofocus;

	const TYPE_TEXT = 'text';
	const TYPE_PASSWORD = 'password';

	const TYPE_RESET = 'reset';
	const TYPE_SUBMIT = 'submit';

	/**
	*	Constructeur
	*
	*	@param $name id
	*	@param $value Value par défault, par défault ''
	*	@param $class Classe de l'input, par défault ''
	*	@param $placeholder , par défault ''
	*	@param $type par défault Input::TYPE_TEXT
	*	@param $require par défault false
	*	@param $autofocus par défault false
	*/
	function __construct($name,$value='',$class='',$placeholder='', $type=SELF::TYPE_TEXT,$require= false,$autofocus=false)
	{
		$this->setName($name);
		$this->setValue($value);
		$this->setClass($class);
		$this->setPlaceholder($placeholder);
		$this->setType($type);
		$this->setRequire($require);
		$this->setAutofocus($autofocus);
	}


	public function write()
	{
		echo '<input id="',$this->_name,'" name="',$this->_name,'" class="',$this->_class,'" type="',$this->_type,'" value="',$this->_value,'" placeholder="',$this->_placeholder,'"';
		if($this->_require)
			echo ' require ';
		if($this->_autofocus)
			echo ' autofocus ';
		echo '/>'.PHP_EOL;
	}



	/************************************************************
	*															*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/

	public function getAutofocus()
	{
		return $this->_autofocus;
	}
	public function setAutofocus($autofocus)
	{
		$this->_autofocus=$autofocus;
	}

	public function getClass()
	{
		return $this->_class;
	}
	public function setClass($class)
	{
		$this->_class=$class;
	}

	public function getPlaceholder()
	{
		return $this->_placeholder;
	}
	public function setPlaceholder($placeholder)
	{
		$this->_placeholder=$placeholder;
	}

	public function getName()
	{
		return $this->_name;
	}
	public function setName($name)
	{
		$this->_name=$name;
	}

	public function getRequire()
	{
		return $this->_require;
	}
	public function setRequire($require)
	{
		$this->_require=$require;
	}

	public function getType()
	{
		return $this->_type;
	}
	public function setType($type)
	{
		$this->_type=$type;
	}

	public function getValue()
	{
		return $this->_value;
	}
	public function setValue($value)
	{
		$this->_value=ucfirst($value);
	}

	/************************************************************
	*						  FIN								*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/
}


 ?>
