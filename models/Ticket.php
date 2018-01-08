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
class Ticket extends \yii\db\ActiveRecord// implements yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama_acara', 'waktu_acara', 'tempat_acara', 'guest_star', 'nama', 'npm', 'status'], 'required'],
            [['nama_acara', 'guest_star'], 'string', 'max' => 500],
            [['tempat_acara', 'nama'], 'string', 'max' => 255],
            [['npm'], 'string', 'max' => 25],
            [['status'], 'string', 'max' => 50],
            [['npm'], 'integer'],
            [['status'], 'checkMasuk'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Nomor',
            'nama_acara' => 'Nama Acara',
            'waktu_acara' => 'Waktu Acara',
            'tempat_acara' => 'Tempat Acara',
            'guest_star' => 'Guest Star',
            'nama' => 'Nama',
            'npm' => 'NPM',
            'status' => 'Status',
        ];
    }

    public function checkMasuk($id) {
        $ticket = Ticket::findOne($this->id);

        if ($ticket->status == 'Masuk') {
            echo '<audio autoplay><source src="sound/beep.mp3" type="audio/mpeg"></audio>';
            Yii::$app->session->setFlash('danger', 'Pengguna tiket ini telah memasuki lokasi acara.');
        }
    }
}
