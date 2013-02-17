<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $logins
 * @property string $last_login
 * @property string $gender
 * @property string $birthday
 * @property string $join_date
 * @property string $location
 * @property integer $referrer
 * @property string $avatar_location
 *
 * The followings are the available model relations:
 * @property Files[] $files
 * @property Folders[] $folders
 * @property Games[] $games
 * @property GroupMembers[] $groupMembers
 * @property Groups[] $groups
 * @property RolesUsers[] $rolesUsers
 * @property UserLinks[] $userLinks
 * @property UserPrison[] $userPrisons
 * @property UserPrison[] $userPrisons1
 * @property UserSettings $userSettings
 */
class Users extends CActiveRecord
{
	public $errorCode;
	public $roles = null;
	
	const ERROR_NONE = 0;
	const ERROR_USERNAME_INVALID = 1;
	const ERROR_PASSWORD_INVALID = 2;
	const ERROR_USER_BANNED = 4;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, password, join_date', 'required'),
			array('referrer', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>32),
			array('email', 'length', 'max'=>254),
			array('password', 'length', 'max'=>64),
			array('logins, last_login, birthday, join_date', 'length', 'max'=>10),
			array('gender', 'length', 'max'=>1),
			array('location', 'length', 'max'=>200),
			array('avatar_location', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, email, password, logins, last_login, gender, birthday, join_date, location, referrer, avatar_location', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'files' => array(self::HAS_MANY, 'Files', 'user'),
			'folders' => array(self::HAS_MANY, 'Folders', 'user'),
			'games' => array(self::HAS_MANY, 'Games', 'creator_id'),
			'groupMembers' => array(self::HAS_MANY, 'GroupMembers', 'user_id'),
			'groups' => array(self::HAS_MANY, 'Groups', 'primary_owner'),
			'rolesUsers' => array(self::HAS_MANY, 'RolesUsers', 'user_id'),
			'userLinks' => array(self::HAS_MANY, 'UserLinks', 'user_id'),
			'userPrisons' => array(self::HAS_MANY, 'UserPrison', 'userid'),
			'userPrisons1' => array(self::HAS_MANY, 'UserPrison', 'issuer'),
			'userSettings' => array(self::HAS_ONE, 'UserSettings', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'logins' => 'Logins',
			'last_login' => 'Last Login',
			'gender' => 'Gender',
			'birthday' => 'Birthday',
			'join_date' => 'Join Date',
			'location' => 'Location',
			'referrer' => 'Referrer',
			'avatar_location' => 'Avatar Location',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('logins',$this->logins,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('join_date',$this->join_date,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('referrer',$this->referrer);
		$criteria->compare('avatar_location',$this->avatar_location,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	

	public function authenticate( $password, $dontHash = false){
	
		if($dontHash == true && $password != $this->password ){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;		
		}else if($dontHash == false && hash("sha256",$password.$this->join_date) != $this->password ){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else if ($this->isBanned()){
			$this->errorCode=self::ERROR_USER_BANNED;
		}else{
			Yii::app()->request->cookies['uid'] = new CHttpCookie('uid', $this->id);
			Yii::app()->request->cookies['upw'] = new CHttpCookie('upw', $this->password);
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode;
	}
	
	public function roles(){
		if ($this->roles == null){
			$this->roles = RolesUsers::model()->findAllByAttributes(array("user_id"=>$this->id));
		}		
		return $this->roles;
	}
	
	public function hasRole($checkRole){
		//All role names are lower case.
		$checkRole = strtolower($checkRole);
		
		//If this user model hasn't had its roles fetched, fetch them.
		if ($this->roles == null){
			$this->roles();
		}
		
		if ($this->roles != null){
			$roles = $this->roles;
			
			foreach ($roles as $role){
				//Since admins can do everything, this flag is for them.
				if ($role->role->name == "admin"){
					return true;
				}
				
				if ($checkRole == $role->role->name){
					return true;
				}
			}
		}
		return false;
	}
	
	/*
	* Tampering with this function or any functionality throughout the site related to bans is 
	* grounds for removal from staff and banning.
	*/
	public function isBanned(){
		return $this->getBanned() != null;
	}
	
	public function getBanned(){
		$bans = UserPrison::model()->findAllByPK($this->id);
		foreach ($bans as $ban){
			if ($ban->begins < time() && time() < ($ban->begins+$ban->length)){
				return $ban;
			}
		}
		return null;
	}
}