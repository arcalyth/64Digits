<?php

/**
 * This is the model class for table "historical_static_page".
 *
 * The followings are the available columns in table 'historical_static_page':
 * @property string $id
 * @property string $static_page_id
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
 * @property StaticPageCategories $category0
 * @property StaticPage $staticPage
 * @property Users $lastModifiedUser
 * @property Users $author
 * @property Groups $group0
 */
class HistoricalStaticPage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HistoricalStaticPage the static model class
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
		return 'historical_static_page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('static_page_id, tag, title, content, author_id, category', 'required'),
			array('visible', 'numerical', 'integerOnly'=>true),
			array('static_page_id, modification_count, modification_date, last_modified_user_id, author_id, creation_date, group, category', 'length', 'max'=>11),
			array('tag', 'length', 'max'=>32),
			array('title', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, static_page_id, tag, title, content, modification_count, modification_date, last_modified_user_id, author_id, creation_date, visible, group, category', 'safe', 'on'=>'search'),
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
			'category0' => array(self::BELONGS_TO, 'StaticPageCategories', 'category'),
			'staticPage' => array(self::BELONGS_TO, 'StaticPage', 'static_page_id'),
			'lastModifiedUser' => array(self::BELONGS_TO, 'Users', 'last_modified_user_id'),
			'author' => array(self::BELONGS_TO, 'Users', 'author_id'),
			'group0' => array(self::BELONGS_TO, 'Groups', 'group'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'static_page_id' => 'Static Page',
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
		$criteria->compare('static_page_id',$this->static_page_id,true);
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
}