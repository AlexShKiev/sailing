<?php
namespace app\models;
class Post extends \yii\db\ActiveRecord
{
/**
* Returns the static model of the specified AR class.
* @param string $className active record class name.
* @return Comments the static model class
*/
public static function model($className=__CLASS__)
{
return parent::model($className);
}

/**
* @return string the associated database table name
*/
public static function tableName()
{
return 'user';
}

/**
* @return array primary key of the table
**/
public static function primaryKey()
{
return array('id');
}

/**
* @return array customized attribute labels (name=>label)
*/
public function attributeLabels()
{
return array(
    'id' => 'ID',
    'login' => 'Login',
    'mail' => 'Email',
    'pass' => 'Password',
    'birthdate' => 'Date of birth',
    'create' => 'Created',
    'update' => 'Updated',
);
}
    public function beforeSave($insert)
    {
        if ($this->isNewRecord)
        {
            $command = static::getDb()->createCommand("select max(id) as id from user")->queryAll();
            $this->id = $command[0]['id'] + 1;
        }

        return parent::beforeSave($insert);
    }
}
