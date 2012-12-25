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
 * @property string $banned
 */
class Users extends CActiveRecord
{
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
			array('username, email, password, join_date, banned', 'required'),
			array('referrer', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>32),
			array('email', 'length', 'max'=>254),
			array('password', 'length', 'max'=>64),
			array('logins, last_login, birthday, join_date, banned', 'length', 'max'=>10),
			array('gender', 'length', 'max'=>1),
			array('location', 'length', 'max'=>200),
			array('avatar_location', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, email, password, logins, last_login, gender, birthday, join_date, location, referrer, avatar_location, banned', 'safe', 'on'=>'search'),
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
			'banned' => 'Banned',
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
		$criteria->compare('banned',$this->banned,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}