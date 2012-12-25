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
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$users=User::model()->findByAttributes("username"=>$this->username);
		
		if ( $users === null ){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if( hash("sha256",$this->password.$users->join_date) !== $user->password ){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else if ($user->banned != 0){
			$this->errorCode=self::ERROR_BANNED;
		}else{
			$this->errorCode=self::ERROR_NONE;
		}
		
		return !$this->errorCode;
	}
}