<?php

/**
 * This is the model class for table "historical_blogs".
 *
 * The followings are the available columns in table 'historical_blogs':
 * @property string $id
 * @property string $blog_id
 * @property string $title
 * @property string $content
 * @property string $creation_date
 * @property string $author_id
 * @property string $modification_date
 * @property integer $modification_count
 * @property string $last_modified_user_id
 * @property string $deleted
 * @property integer $pinned
 *
 * The followings are the available model relations:
 * @property Blogs $blog
 * @property Users $author
 */
class HistoricalBlogs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HistoricalBlogs the static model class
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
		return 'historical_blogs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('blog_id, title, content, creation_date, author_id', 'required'),
			array('modification_count, pinned', 'numerical', 'integerOnly'=>true),
			array('blog_id, creation_date, author_id, modification_date, last_modified_user_id, deleted', 'length', 'max'=>11),
			array('title', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, blog_id, title, content, creation_date, author_id, modification_date, modification_count, last_modified_user_id, deleted, pinned', 'safe', 'on'=>'search'),
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
			'blog' => array(self::BELONGS_TO, 'Blogs', 'blog_id'),
			'author' => array(self::BELONGS_TO, 'Users', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'blog_id' => 'Blog',
			'title' => 'Title',
			'content' => 'Content',
			'creation_date' => 'Creation Date',
			'author_id' => 'Author',
			'modification_date' => 'Modification Date',
			'modification_count' => 'Modification Count',
			'last_modified_user_id' => 'Last Modified User',
			'deleted' => 'Deleted',
			'pinned' => 'Pinned',
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
		$criteria->compare('blog_id',$this->blog_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('author_id',$this->author_id,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('modification_count',$this->modification_count);
		$criteria->compare('last_modified_user_id',$this->last_modified_user_id,true);
		$criteria->compare('deleted',$this->deleted,true);
		$criteria->compare('pinned',$this->pinned);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}