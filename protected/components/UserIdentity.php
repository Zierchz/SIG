	<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_username;
    private $_trab;
	public function getId()
	{
		return $this->_id;
	}
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
		$user = Usuario::model()->find('username=?', array($this->username));
		$ip_address = "";
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '')
		{
			$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
			$ip_address = $_SERVER['REMOTE_ADDR'];
			if($ip_address=="::1")
				$ip_address="127.0.0.1";
		}
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
						
			$rol = Rol::model()->findByPk($user->rol);
			$area = UnidadOrganizativa::model()->findByPk($user->id_uo);
			

			$this->_id=$user->id;
			$this->_username=$user->username;
            $this->setState('sapcode', $user->sap_code);
			$this->setState('rolename', $rol->rol);
			$this->setState('roleid', $user->rol);
			$this->setState('ip', $ip_address);
			$this->setState('password',$this->password);
			$this->setState('foto',"avatar.png");
			$this->setState('areaid',$user->id_uo);
			$this->setState('fullname', $user->nombre );	

			if($this->username == 'admin'){				
				$this->setState('fullname', 'Administrador' );				
				$this->setState('areaid', '7');
				
							
			} else {

				$trab_bdut = Yii::app()->db_bdut->createCommand()->select('t.codigo, t.nombre_apellidos, t.departamento, t.foto')->from('trabajador t')->where('codigo = '.$user->sap_code)->order(array('nombre_apellidos asc' ))->queryRow();
				$area_bdut = Yii::app()->db_bdut->createCommand()->select('t.nombre, t.id')->from('area t')->where('t.id = '.$trab_bdut['departamento'])->queryRow();
				
				
				
				if($trab_bdut['foto'] != NULL)
					$this->setState('foto',$trab_bdut['foto']);				
			}
			$this->errorCode=self::ERROR_NONE;
		}		
		return !$this->errorCode;
	}
}