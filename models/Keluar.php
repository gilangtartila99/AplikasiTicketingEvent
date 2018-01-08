<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 */
class Keluar extends \yii\db\ActiveRecord// implements yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keluar';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['waktu'], 'string', 'max' => 255],
            [['id'], 'integer'],
            [['ticket_id'], 'unique', 'message' => 'Pengguna tiket ini telah keluar lokasi acara.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Nomor',
            'ticket_id' => 'Ticket',
            'waktu' => 'Waktu',
        ];
    }
}
