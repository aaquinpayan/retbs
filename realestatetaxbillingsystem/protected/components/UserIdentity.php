<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	public function authenticate()
	{
		$user = User::model()->findByAttributes(array(
			'username' => $this->username
		));

		if($user === null) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} elseif($user->password !== $this->password) {
			$this->_id=$this->username;
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		} else{
			$this->_id=$user['username'];
           $this->setState('title', $user['username']);
           $this->setState('name', $user['name']);
           $this->setState('user_type', $user['user_type']);
           $this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	
	}

	public function getId()  
   	{
       return $this->_id;
   	}
}