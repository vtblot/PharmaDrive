<?php 


/**
* Permet de préparer et d'envoyer des emails
*/
class Email
{

	private $_from;
	private $_reply;
	private $_priority;

	private $_to;
	private $_subject;
	private $_message;

	const PRIORITY_MAX = 1;
	const PRIORITY_HIGHT = 2;
	const PRIORITY_LOW = 4;
	const PRIORITY_MIN = 5;

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

		$this->setPriority(3);

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
		$header ='';
		$header .= 'From: '.$this->_from . "\n" ;
		$header .= 'Reply-To: '.$this->_reply . "\n";
		$header .= "MIME-Version: 1.0\n";
		$header .= "Content-Transfer-Encoding: 8bit \n";
		$header .= "Content-type: text/html; charset=utf-8 \n";
		$header .= 'Subject: '.$this->_subject."\n";
		$header .= 'X-Mailer: PHP/' . phpversion();
		$header .= 'X-Priority: '.$this->_priority."\n";

		$to = $this->_to;
		$subject = $this->_subject;
		$message = $this->_message;

		$message = '';
		$message .= '<html>';
		$message .= '<head>';
		$message .= '<title>'.$subject.'</title>';
		$message .= '</head>';
		$message .= '<body>';
		$message .= $this->_message .'<br/>';
		$message .= '</body>';
		$message .= '</html>';

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
	public function setReply($reply='')
	{
		if(empty($reply))
		{
			$reply = self::FROM;
		}
		$this->_reply=$reply;
	}

	public function getPriority()
	{
		return $this->_priority;
	}
	public function setPriority($priority)
	{
		$this->_priority=$priority;
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

