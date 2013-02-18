<?php

/**
 * This is the model class for table "static_page".
 *
 * The followings are the available columns in table 'static_page':
 * @property string $id
 * @property string $tag
 * @property string $title
 * @property string $content
 * @property string $modification_count
 * @property string $modification_date
 * @property string $last_modified_user_id
 * @property string $author_id
 * @property string $creation_date
 * @property integer $visible
 * @property string $group
 * @property string $category
 *
 * The followings are the available model relations:
 * @property HistoricalStaticPage[] $historicalStaticPages
 * @property Groups $group0
 * @property Users $lastModifiedUser
 * @property Users $author
 * @property StaticPageCategories $category0
 */
class StaticPage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StaticPage the static model class
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
		return 'static_page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tag, title, content, author_id', 'required'),
			array('visible', 'numerical', 'integerOnly'=>true),
			array('tag', 'length', 'max'=>32),
			array('title', 'length', 'max'=>64),
			array('modification_count, modification_date, last_modified_user_id, author_id, creation_date, group, category', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tag, title, content, modification_count, modification_date, last_modified_user_id, author_id, creation_date, visible, group, category', 'safe', 'on'=>'search'),
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
			'historicalStaticPages' => array(self::HAS_MANY, 'HistoricalStaticPage', 'static_page_id'),
			'group0' => array(self::BELONGS_TO, 'Groups', 'group'),
			'lastModifiedUser' => array(self::BELONGS_TO, 'Users', 'last_modified_user_id'),
			'author' => array(self::BELONGS_TO, 'Users', 'author_id'),
			'category0' => array(self::BELONGS_TO, 'StaticPageCategories', 'category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tag' => 'Tag',
			'title' => 'Title',
			'content' => 'Content',
			'modification_count' => 'Modification Count',
			'modification_date' => 'Modification Date',
			'last_modified_user_id' => 'Last Modified User',
			'author_id' => 'Author',
			'creation_date' => 'Creation Date',
			'visible' => 'visible',
			'group' => 'Group',
			'category' => 'Category',
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
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('modification_count',$this->modification_count,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('last_modified_user_id',$this->last_modified_user_id,true);
		$criteria->compare('author_id',$this->author_id,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('group',$this->group,true);
		$criteria->compare('category',$this->category,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
			
	//Handle historical saving, and auto populate fields that we don't want to bother with.
	public function beforeSave() {
		if ($this->isNewRecord) {
			$this->creation_date = time();
			$this->modification_date = 0;
			$this->modification_count = 0;
			$this->last_modified_user_id = null;
			
		} else {
			//Update these values on the current model
			$this->modification_date = time();
			$this->modification_count++;

			$historicalEntry = new HistoricalStaticPage;
			
			//We need a fresh copy of this (unsaved) object
			$self = StaticPage::model()->findByPK($this->id);
			
			//Transfer attributes `intelligently`
			$attributes = array_keys($this->attributeLabels());
			foreach ($attributes as $attribute){
				if (strtolower($attribute) != "id"){
					$historicalEntry->$attribute = $self->$attribute;
				}
			}
			//Set the linkage for which item it refers too
			$historicalEntry->static_page_id = $self->id;
			
			$historicalEntry->save();
		}
	
		return parent::beforeSave();
	}
}