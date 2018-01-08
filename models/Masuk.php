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
class Masuk extends \yii\db\ActiveRecord// implements yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masuk';
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
            [['ticket_id'], 'unique', 'message' => 'Pengguna tiket ini telah memasuki lokasi acara.'],
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

    public function checkMasuk($id) {
        $ticket = Masuk::findOne($this->id);

        if ($ticket->status == 'Masuk') {
            echo '<audio autoplay><source src="sound/beep.mp3" type="audio/mpeg"></audio>';
            Yii::$app->session->setFlash('danger', 'Pengguna tiket ini telah memasuki lokasi acara.');
        }
    }
}
