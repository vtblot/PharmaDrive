<?php 



/**
* Formulaire de connexion
*/
class FormSignin extends Form
{
	
	function __construct($url,$class='')
	{
		parent::__construct($url,$class,self::METHOD_POST);

		$this->_bootstrap  = ['button'=>'btn btn-lg btn-primary btn-block',
				  			  'form'=>'form-signin',
				  			  'h2'=>'form-signin-heading',
				  			  'input'=>'form-control',
				  			  'reset'=>'btn btn-lg btn-default btn-block',
				  			  'submit'=>'btn btn-lg btn-primary btn-block'];

		if(empty($class))
		{
			//si on a pas renseigné de CSS on prends celui de boostrap
			$this->_class = $this->_bootstrap;
		}

		//on crée le champs login		
		$this->addInput('login','','Nom d\'utilisateur',Input::TYPE_TEXT,true,true);
		//le champs password
		$this->addInput('pass','','Mot de passe',Input::TYPE_PASSWORD,true,false);
		//et le bouton de connexion
		$this->setSubmit('Connexion');

		
	}

	public function setLogin($value='',$placeholder='Nom d\'utilisateur',$name='login')
	{
		$this->_inputs[0] = new Input($name,$value,$this->_class['input'],$placeholder,Input::TYPE_TEXT,true,true);
	}

	public function setPass($value='',$placeholder='Mot de passe',$name='pass')
	{
		$this->_inputs[1] = new Input($name,$value,$this->_class['input'],$placeholder,Input::TYPE_PASSWORD,true,false);
	}

	public function setSubmit($value='Connexion')
	{
		$this->_submit = new Submit($value,$this->_class['submit']);
	}

	/**
	*	Permet d'écrire le formulaire
	*/
	public function write($title ='Connexion')
	{
		echo '<form class="'.$this->_class['form'].'" method="'.$this->_method.'" action="'.$this->_url.'">'.PHP_EOL;
		echo '<h2 class="'.$this->_class['h2'].'">'.$title.'</h2>'.PHP_EOL;
		foreach ($this->_inputs as $input) {
			$input->write();
		}
		echo '<div class="form-group">';
		if($this->hasReset()){
			//si on a un bouton reset, on l'affiche
			$this->_reset->write();
		}
		if($this->hasSubmit()){
			//si on a un bouton submit, on l'affiche
			$this->_submit->write();
		}
		echo '</div>'.PHP_EOL;
		echo '</form>'.PHP_EOL;
	}


}
