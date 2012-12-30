<?php

/**
 * This is the model class for table "groups".
 *
 * The followings are the available columns in table 'groups':
 * @property string $id
 * @property string $name
 * @property string $primary_owner
 * @property integer $is_private
 * @property integer $invite_only
 * @property integer $is_default
 * @property integer $date_formed
 *
 * The followings are the available model relations:
 * @property GroupMembers[] $groupMembers
 * @property Users $primaryOwner
 */
class Groups extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Groups the static model class
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
		return 'groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, primary_owner, date_formed', 'required'),
			array('is_private, invite_only, is_default, date_formed', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>32),
			array('primary_owner', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, primary_owner, is_private, invite_only, is_default, date_formed', 'safe', 'on'=>'search'),
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
			'groupMembers' => array(self::HAS_MANY, 'GroupMembers', 'group_id'),
			'primaryOwner' => array(self::BELONGS_TO, 'Users', 'primary_owner'),
		);
	}
 
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'primary_owner' => 'Primary Owner',
			'is_private' => 'Is Private',
			'invite_only' => 'Invite Only',
			'is_default' => 'Is Default',
			'date_formed' => 'Date Formed',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('primary_owner',$this->primary_owner,true);
		$criteria->compare('is_private',$this->is_private);
		$criteria->compare('invite_only',$this->invite_only);
		$criteria->compare('is_default',$this->is_default);
		$criteria->compare('date_formed',$this->date_formed);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function hasMember($userid){
		return (null != GroupMembers::model()->findAllByAttributes(array("user_id"=>$userid, "group_id"=>$this->id)));
	}
}