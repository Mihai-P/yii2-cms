<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*
 * @var yii\web\View                    $this
 * @var dektrium\user\models\ResendForm $model
 */

$this->title = Yii::t('user', 'Request new confirmation message');
$this->params['breadcrumbs'][] = $this->title;
?>
<p class="login-box-msg"><?= Html::encode($this->title) ?></p>

<?php $form = ActiveForm::begin([
    'id'                     => 'resend-form',
    'enableAjaxValidation'   => true,
    'enableClientValidation' => false,
]); ?>

<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

<div class="row">
    <div class="col-xs-8"></div><!-- /.col -->
    <div class="col-xs-4">
        <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
    </div><!-- /.col -->
</div>

<?php ActiveForm::end(); ?>