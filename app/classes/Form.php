<?php 



class Form
{

	/**
	*	Classe du formulaire (CSS)
	*/
	protected $_class;

	/**
	*	Methode du fomulaire (get ou post)
	*/
	protected $_method;
	const METHOD_GET = 'get';
	const METHOD_POST = 'post';

	/**
	*	Liste des inputs
	*/
	protected $_inputs;

	/*
	*	Contient le bouton reset
	*/
	protected $_reset;

	/**
	*	Contient le bouton submit
	*/
	protected $_submit;

	/**
	*	Framwork CSS du formulaire
	*/
	protected $_theme;
	const THEME_BOOTSTRAP = '_bootstrap';

	protected $_bootstrap = [];

	/**
	*	Url où l'on envoie le formulaire
	*/
	protected $_url;

	

	function __construct($url='', $class='', $method = self::METHOD_POST) {
		$this->setUrl($url);
		$this->setMethod($method);
		$this->setClass($class);

		$this->_bootstrap = ['button'=>'btn btn-primary',
							 'form'=>'new form-horizontal',
							 'legend'=>'form-signin-heading',
							 'input'=>'form-control',
							 'reset'=>'btn btn-default',
							 'submit'=>'btn btn-primary'];
	}

	/**
	*	Ajout un input
	*
	*	@param $name id
	*	@param $value Valeur par défault
	*	@param $placeholder, par défault ''
	*	@param $type Type de l'input, par défault Input::TYPE_TEXT
	*	@param $require par défault false
	*	@param $autofocus par défault false
	*/
	public function addInput($name,$value,$placeholder='',$type=Input::TYPE_TEXT,$require=false,$autofocus=false)
	{
		$input = new Input($name,$value,$this->_class['input'],$placeholder,$type,$require,$autofocus);
		$this->_inputs[] = $input;
	}

	/**
	*	Ajout le bouton reset
	*/
	public function addReset($value='Rénitialiser')
	{
		if($this->hasReset()){
			//si il y a deja un submit de placer 
			throw new Exception(__CLASS__.' : Reset déjà défini', 2);
		}

		$this->_reset = new Reset($value,$this->_class['reset']);
	}

	/**
	*	Ajout le bouton submit
	*/
	public function addSubmit($value='Envoyer')
	{
		if($this->hasSubmit()){
			//si il y a deja un submit de placer ,
			throw new Exception(__CLASS__.' : Submit déjà défini', 2);
		}

		$this->_submit = new Submit($value,$this->_class['submit']);
	}

	/**
	*	Permet de savoir si un bouton reset a deja été défini
	*/
	public function hasReset()
	{
		if(isset($this->_reset) && $this->_reset != NULL)
			return true;
		else
			return false;
	}

	/**
	*	Permet de savoir si un bouton submit a deja été défini
	**/
	public function hasSubmit()
	{
		if(isset($this->_submit) && $this->_submit != NULL)
			return true;
		else
			return false;
	}

	/**
	*	Permet d'écrire le formulaire
	*/
	public function write($title ='')
	{
		echo '<form class="'.$this->_class['form'].'" method="'.$this->_method.'" action="'.$this->_url.'">',PHP_EOL;
		echo '<fieldset>',PHP_EOL;
		echo '<legend class="'.$this->_class['legend'].'">'.$title.'</legend>',PHP_EOL;
		foreach ($this->_inputs as $input) {
			echo '<div class="form-group">',PHP_EOL;
			$input->write();
			echo '</div>',PHP_EOL;
		}
		echo '<div class="form-group">',PHP_EOL;
		echo '<div class="col-lg-10 col-lg-offset-2">',PHP_EOL;
		if($this->hasReset()){
			//si on a un bouton reset, on l'affiche
			$this->_reset->write();
		}
		if($this->hasSubmit()){
			//si on a un bouton submit, on l'affiche
			$this->_submit->write();
		}
		echo '</div>',PHP_EOL,'</div>',PHP_EOL;
		echo '</fieldset>',PHP_EOL;
		echo '</form>',PHP_EOL;
	}	

	/************************************************************
	*															*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/
	public function getClass()
	{
		return $this->_class;
	}
	public function setClass($class)
	{
		$this->_class=$class;
	}

	public function getMethod()
	{
		return $this->_method;
	}
	public function setMethod($method)
	{
		if ( $method !== self::METHOD_GET && $method !== self::METHOD_POST ) {
			//si on ne passe pas une des deux constantes
			throw new Exception(__CLASS__.' : la methode doit être une constante prédefinie', 2);
		}
		$this->_method=$method;
	}

	public function getTheme()
	{
		return $this->_theme;
	}
	public function setTheme($theme)
	{
		if ( $theme !== self::THEME_BOOTSTRAP) {
			//si on ne passe pas une des deux constantes
			throw new Exception(__CLASS__.' : le theme doit être une constante prédefinie', 2);
		}
		$this->_theme=$theme;
		$this->setClass($this->_bootstrap);
	}

	public function getUrl()
	{			
		return $this->_url;
	}
	public function setUrl($url)
	{
		$this->_url=$url;
	}

	/************************************************************
	*						  FIN								*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/
}

 ?>
