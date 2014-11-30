<?php

namespace app\modules\content\article\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $teaser
 * @property string $body
 * @property integer $author
 * @property string $status
 * @property string $create_at
 * @property string $update_at
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teaser', 'body', 'status'], 'string'],
            [['author'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'teaser' => 'Teaser',
            'body' => 'Body',
            'author' => 'Author',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
