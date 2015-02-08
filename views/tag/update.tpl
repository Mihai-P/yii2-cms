{use class="yii\helpers\Html"}
{* @var $model backend\models\Tag *}
{set title="Update Tag: {$model->name}"}
{* set params=['breadcrumbs'=>[['label' => 'Tags', 'url' => ['index']], ['label' => $model->name, 'url' => ['view', 'id' => $model->id]], 'Update']] *}
<div class="tag-update">
    {include '_form.tpl' title='Newest links' model=$model}
</div>
