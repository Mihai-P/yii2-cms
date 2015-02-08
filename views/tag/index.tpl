{use class="yii\helpers\Html"}
{use class="yii\bootstrap\Alert" type='function'}
{extends file="@vendor/tez/yii2theme-adminui/themes/layouts/index.tpl"}
{set title='Tags'}
{set params=['breadcrumbs'=>['Tags']]}
{block name=box_title}Tags{/block}
{block name=content}
<div class="tag-index">
    {* echo $this->render('_search', ['model' => $searchModel]); *}
    {Alert::widget(['options' => ['class' => 'alert-info'],'body' => 'Say hello...'])}
    {GridView dataProvider=$dataProvider filterModel=$searchModel columns=[['class' => 'yii\grid\CheckboxColumn'],'id','name','type','status','update_time',['class' => 'yii\grid\ActionColumn']]}
</div>
{/block}