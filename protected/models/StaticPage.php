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
			array('tag, title, content,  author_id', 'required'),
			array('tag', 'length', 'max'=>32),
			array('title', 'length', 'max'=>64),
			array('modification_count, modification_date, last_modified_user_id, author_id, creation_date', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tag, title, content, modification_count, modification_date, last_modified_user_id, author_id, creation_date', 'safe', 'on'=>'search'),
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
			'tag' => 'Tag',
			'title' => 'Title',
			'content' => 'Content',
			'modification_count' => 'Modification Count',
			'modification_date' => 'Modification Date',
			'last_modified_user_id' => 'Last Modified User',
			'author_id' => 'Author',
			'creation_date' => 'Creation Date',
		);
	}

	//Handle historical saving, and auto populate fields that we don't want to bother with.
	public function beforeSave() {
		if ($this->isNewRecord){
			$this->creation_date = time();
			$this->modification_date = 0;
			$this->modification_count = 0;
			$this->last_modified_user_id = null;
			
		}else{
			//Update these values on the current model
			$this->modification_date = time();
			$this->modification_count++;
			
			//Transfer this object into a historical version.
			//We need a fresh copy of this (unsaved) object
			$self = StaticPage::model()->findByPK($this->id);
			$historicalEntry = new HistoricalStaticPage;
			
			$historicalEntry->static_page_id = $self->id;
			$historicalEntry->tag = $self->tag;
			$historicalEntry->title = $self->title;
			$historicalEntry->content = $self->content;
			$historicalEntry->author_id = $self->author_id;
			$historicalEntry->creation_date = $self->creation_date;
			$historicalEntry->modification_date = $self->modification_date;
			$historicalEntry->modification_count = $self->modification_count;
			$historicalEntry->last_modified_user_id = $self->last_modified_user_id;
			
			$historicalEntry->save();
		}
	
		return parent::beforeSave();
	}
}