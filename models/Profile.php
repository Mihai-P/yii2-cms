<?php

namespace cms\models;

use Yii;
use dektrium\user\models\Profile as BaseProfile;
/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $firstname
 * @property string  $lastname
 * @property string  $name
 * @property string  $public_email
 * @property string  $gravatar_email
 * @property string  $gravatar_id
 * @property string  $location
 * @property string  $website
 * @property string  $bio
 *
 */
class Profile extends BaseProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'required'],
            [['bio'], 'string'],
            [['public_email', 'gravatar_email'], 'email'],
            ['website', 'url'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->name = $this->firstname . ' ' . $this->lastname;
            return true;
        }
        return false;
    }
}
