{use class="yii\helpers\Html"}
{* use class='yii\widgets\ActiveForm' type='block' *}
{* @var $model backend\models\Tag *}
<div class="tag-form">
    {ActiveForm assign='form'}
    {$form->field($model, 'name')->textInput(['maxlength' => 255])}
    {$form->field($model, 'type')->textInput(['maxlength' => 255])}
    <div class="form-group">
        <input type="submit" value="{if $model->isNewRecord }Create{else}Update{/if}" class="btn {if $model->isNewRecord }btn-success{else}btn-primary{/if}" />
    </div>
    {/ActiveForm}
</div>

