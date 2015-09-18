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
 * @var yii\web\View              $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module      $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<p class="login-box-msg"><?= Html::encode($this->title) ?></p>

<?php $form = ActiveForm::begin([
    'id'                     => 'registration-form',
    'enableAjaxValidation'   => true,
    'enableClientValidation' => false,
]); ?>

<?= $form->field($model, 'username') ?>

<?= $form->field($model, 'email') ?>

<?php if ($module->enableGeneratingPassword == false): ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
<?php endif ?>

<div class="row">
    <div class="col-xs-8"></div><!-- /.col -->
    <div class="col-xs-4">
        <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>
    </div><!-- /.col -->
</div>


<?php ActiveForm::end(); ?>
<p class="text-center">
    <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
</p>