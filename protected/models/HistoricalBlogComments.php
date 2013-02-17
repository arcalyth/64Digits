<?php

/**
 * This is the model class for table "historical_blog_comments".
 *
 * The followings are the available columns in table 'historical_blog_comments':
 * @property string $id
 * @property string $blog_comment_id
 * @property string $content
 * @property string $author_id
 * @property string $creation_date
 * @property string $modification_date
 * @property string $modification_count
 * @property string $last_modified_user_id
 * @property string $blog_id
 * @property string $deleted
 */
class HistoricalBlogComments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HistoricalBlogComments the static model class
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
		return 'historical_blog_comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('blog_comment_id, content, author_id, creation_date, blog_id', 'required'),
			array('blog_comment_id, author_id, creation_date, modification_date, modification_count, last_modified_user_id, blog_id, deleted', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, blog_comment_id, content, author_id, creation_date, modification_date, modification_count, last_modified_user_id, blog_id, deleted', 'safe', 'on'=>'search'),
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
			'blog_comment_id' => 'Blog Comment',
			'content' => 'Content',
			'author_id' => 'Author',
			'creation_date' => 'Creation Date',
			'modification_date' => 'Modification Date',
			'modification_count' => 'Modification Count',
			'last_modified_user_id' => 'Last Modified User',
			'blog_id' => 'Blog',
			'deleted' => 'Deleted',
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
		$criteria->compare('blog_comment_id',$this->blog_comment_id,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('author_id',$this->author_id,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('modification_count',$this->modification_count,true);
		$criteria->compare('last_modified_user_id',$this->last_modified_user_id,true);
		$criteria->compare('blog_id',$this->blog_id,true);
		$criteria->compare('deleted',$this->deleted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}