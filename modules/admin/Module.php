<?php

namespace app\modules\admin;

use app\modules\admin\models\AdminUser;
use yii\web\User;

class Module extends \yii\base\Module
{
    /** {@inheritDoc} */
    public function init()
    {
        parent::init();

        \Yii::$app->setLayoutPath('@app/modules/admin/views/layouts');
    }
}