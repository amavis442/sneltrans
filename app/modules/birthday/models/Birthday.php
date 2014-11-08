<?php

namespace app\modules\birthday\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "birthday".
 *
 * @property integer $id
 * @property string $name
 * @property string $picture
 * @property string $filename
 * @property string $comments
 * @property string $birthdate
 * @property string $dateofdeath
 * @property string $created_at
 * @property string $updated_at
 */
class Birthday extends \yii\db\ActiveRecord
{
    public $image;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'birthday';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comments'], 'string'],
            [['birthdate', 'dateofdeath'],'date','format'=>'dd-MM-yyyy'],
            [['created_at', 'updated_at'], 'safe'],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['name', 'picture','filename'], 'string', 'max' => 255],
            [['birthdate','dateofdeath'], 'default', 'value' => null],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'picture' => 'Picture',
            'filename' => 'Filename',
            'comments' => 'Comments',
            'birthdate' => 'Birthdate',
            'dateofdeath' => 'Dateofdeath',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
