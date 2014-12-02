<?php

namespace Application\Model;

class Usuario{

	public $id;
	public $email;
	public $senha;

     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->email = (!empty($data['email'])) ? $data['email'] : null;
         $this->senha  = (!empty($data['senha'])) ? $data['senha'] : null;
     }
}

?>