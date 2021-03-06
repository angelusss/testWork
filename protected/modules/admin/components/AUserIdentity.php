<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AUserIdentity extends UserIdentity
{
        const USER_IS_NOT_ACTIVE = 3;
        const ACTION_IS_NOT_ALLOWED = 5;
		protected $id;
        protected $firstTime = false;
        protected $role;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
            $user = Admin::model()->find('LOWER(login)=?', array(strtolower($this->username)));
            if($user===null)
            {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
            elseif(trim($this->password)!==$user->password) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } elseif($user->role == Admin::DISABLED){
				$this->errorCode = self::ACTION_IS_NOT_ALLOWED;
			}else {
                $this->id = $user->id;
                $this->role = $user->role;
                Yii::app()->user->setState('role', $user->role);
                $this->username = $user->login;
                $this->errorCode = self::ERROR_NONE;
            }

            return !$this->errorCode;
	}

        public function getId(){
            return $this->id;
        }

        public function getRole(){
            return $this->role;
        }

        public function setFirstTime(){
            $this->firstTime = true;
        }
}