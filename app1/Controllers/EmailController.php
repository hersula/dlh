<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmailController extends BaseController
{
    protected $email;

    public function __construct()
    {
        $this->email  = \Config\Services::email();
        
    }
    public function sendEmail($attachment, $to, $title, $message){

		$this->email->setFrom('developmenintusi@gmail.com','development');
		$this->email->setTo($to);

		$this->email->attach($attachment);

		$this->email->setSubject($title);
		$this->email->setMessage($message);

		if(! $this->email->send()){
			return false;
		}else{
			return true;
		}
	}
}