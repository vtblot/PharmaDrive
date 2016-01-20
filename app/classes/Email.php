<?php 


/**
* Permet de préparer et d'envoyer des emails
*/
class Email
{

	private $_from;
	private $_reply;

	private $_to;
	private $_subject;
	private $_message;

	const FROM = 'julien.coutault@alternativa.fr';
	
	/**
	*	Construteur 
	*	@param $to Destinataire
	*	@param $subject Sujet
	* 	@param $message Corps du mail
	*	@param $form Expéditaire
	*	@param $reply Mail de réponse
	*/
	function __construct($to,$subject,$message,$from='',$reply='')
	{
		$this->setFrom($from);
		$this->setReply($reply);

		$this->_to=$to;
		$this->_subject = $subject;
		$this->_message = $message;
	}

	/**
	*	Permet d'envoyer l'email
	*	@return True si le mail a été envoyé sinon false
	**/
	public function send()
	{
		$header = "MIME-Version: 1.0\r\n".
				"Content-Transfer-Encoding: 8bit \r\n".
				"Content-type: text/html; charset=utf-8 \r\n".
		   		'From: '.$this->_from . "\r\n" .
		    	'Reply-To: '.$this->_reply . "\r\n".
		    	"Subject: test \r\n";
		    	'X-Mailer: PHP/' . phpversion();

		$to = $this->_to;
		$subject = $this->_subject;
		$message = $this->_message;

		$message = "";
		$message .= "<html> \n";
		$message .= "<head> \n";
		$message .= "<title> $subject </title> \n";
		$message .= "</head> \n";
		$message .= "<body> \n";
		$message .= " $this->_message <br/> \n";
		$message .= "</body> \n";
		$message .= "</HTML> \n";

		return mail($to,$subject,$message,$header);
	}


	/************************************************************
	*															*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/

	public function getFrom()
	{
		return $this->_from;
	}
	public function setFrom($from)
	{
		if(empty($from))
		{
			$from = self::FROM;
		}
		$this->_from=$from;
	}

	public function getReply()
	{
		return $this->_reply;
	}
	public function setReply($reply)
	{
		if(empty($reply))
		{
			$reply = self::FROM;
		}
		$this->_reply=$reply;
	}


	public function getTo()
	{
		return $this->_to;
	}
	public function setTo($to)
	{
		$this->_to=$to;
	}

	public function getsubject()
	{
		return $this->_subject;
	}
	public function setsubject($subject)
	{
		$this->_subject=$subject;
	}

	public function getMessage()
	{
		return $this->_message;
	}
	public function setMessage($message)
	{
		$this->_message=$message;
	}

	/************************************************************
	*							FIN								*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/

}

