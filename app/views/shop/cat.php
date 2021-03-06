<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $cat->seo('title', $cat->model->title);
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['shop/index']];
$this->params['breadcrumbs'][] = $cat->model->title;
?>
<h1><?= $cat->seo('h1', $cat->title) ?></h1>
<br/>

<div class="row">
    <div class="col-xs-12 col-md-9 goods clearfix">
        <?php if(count($items)) : ?>
            <br/>
            <div class="row">
            <?php foreach($items as $item) : ?>
                <?= $this->render('_item', ['item' => $item]) ?>
            <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Категория пуста</p>
        <?php endif; ?>
    </div>
    <div class="col-xs-12 col-md-3">
        <h4>Фильтры</h4>
        <div class="well well-sm">
            <?php
                $arr = [];
                foreach ($cat->fields as $field) {
                  array_push($arr, $field->name);
                }
            ?>
            <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['/shop/cat', 'slug' => $cat->slug])]); ?>
                <!-- <?= $form->field($filterForm, 'brand')->dropDownList($cat->fieldOptions('brand', 'Производитель')) ?> -->
                <?= (in_array('article', $arr)) ? $form->field($filterForm, 'article') : '' ?>
                <?= $form->field($filterForm, 'priceFrom') ?>
                <?= $form->field($filterForm, 'priceTo') ?>
                <?= (in_array('inpack', $arr)) ? $form->field($filterForm, 'storageFrom') : '' ?>
                <?= (in_array('inpack', $arr)) ? $form->field($filterForm, 'storageTo') : '' ?>
                <?= (in_array('obiem', $arr)) ? $form->field($filterForm, 'valueFrom') : '' ?>
                <?= (in_array('obiem', $arr)) ? $form->field($filterForm, 'valueTo') : '' ?>
                <?= $form->field($filterForm, 'color')->dropDownList($cat->fieldOptions('color', 'Выбрать цвет')) ?>
                <?= Html::submitButton('Выбрать', ['class' => 'btn btn-primary']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


<?= $cat->pages() ?>
