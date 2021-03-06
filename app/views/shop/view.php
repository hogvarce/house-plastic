<?php
use app\models\AddToCartForm;
use yii\easyii\modules\catalog\api\Catalog;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $item->seo('title', $item->model->title);
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['shop/index']];
$this->params['breadcrumbs'][] = ['label' => $item->cat->title, 'url' => ['shop/cat', 'slug' => $item->cat->slug]];
$this->params['breadcrumbs'][] = $item->model->title;

$colors = [];
if(!empty($item->data->color) && is_array($item->data->color)) {
    foreach ($item->data->color as $color) {
        $colors[$color] = $color;
    }
}
?>
<div  itemscope itemtype="http://schema.org/Product">
<h1 itemprop="name"><?= $item->seo('h1', $item->title) ?></h1>

<div class="row">
    <div class="col-md-4">
        <br/>
        <?= Html::img($item->thumb(300), ['alt'=>$item->title, 'itemprop'=>'image']) ?>
        <?php if(count($item->photos)) : ?>
            <br/><br/>
            <div>
                <?php foreach($item->photos as $photo) : ?>
                    <?= $photo->box(null, 100) ?>
                <?php endforeach;?>
                <?php Catalog::plugin() ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-8">
                <h2 itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span class="label label-warning" itemprop="price"><?= ($item->price > 0) ? $item->price : 'договорная' ?></span>
                    <?php if ($item->price > 0) : ?>
                      <span itemprop="priceCurrency" content="RUB"><i class="fa fa-rub"></i></span>
                   <?php endif; ?>
                    <?php if($item->discount) : ?>
                        <del class="small"><?= $item->oldPrice ?></del>
                    <?php endif; ?>
                </h2>
                <h3>Характеристики:</h3>
                <?php if ( isset($item->data->brand) ) : ?>
                    <span class="text-muted">Марка:</span><span itemprop="brand"> <?= $item->data->brand ?></span>
                    <br/>
                <?php endif; ?>
                <?php if ( isset($item->data->article) ) : ?>
                    <span class="text-muted">Артикул:</span><span> <?= $item->data->article ?></span>
                    <br/>
                <?php endif; ?>
                <?php if ( isset($item->data->obiem) && $item->data->obiem > 0 ) : ?>
                    <span class="text-muted">Объем:</span><span> <?= $item->data->obiem ?>л</span>
                    <br/>
                <?php endif; ?>
                <?php if ( isset($item->data->inpack) ) : ?>
                    <span class="text-muted">Количество в упаковке:</span><span> <?= $item->data->inpack ?></span>
                    <br/>
                <?php endif; ?>
                <?php if(!empty($item->data->color) ) : ?>
                    <span class="text-muted">Цвета:</span><span itemprop="color"> <?= implode(', ', $item->data->color) ?></span>
                    <br/>
                <?php endif; ?>
                <?php if ( isset($item->data->size) ) : ?>
                    <span class="text-muted">Размер:</span><span> <?= $item->data->size ?></span>
                    <br/>
                <?php endif; ?>
                <?php if(  isset($item->data->width) ) : ?>
                    <span class="text-muted">Ширина:</span><span itemprop="width"> <?= $item->data->width ?></span>
                    <br/>
                <?php endif; ?>
                <?php if(  isset($item->data->height) ) : ?>
                    <span class="text-muted">Длина:</span><span itemprop="height"> <?= $item->data->height ?></span>
                    <br/>
                <?php endif; ?>
                <?php if(  isset($item->data->depth) ) : ?>
                    <span class="text-muted">Высота:</span><span itemprop="depth"> <?= $item->data->depth ?></span>
                    <br/>
                <?php endif; ?>
                <?php if(!empty($item->data->features)) : ?>
                    <br/>
                    <span class="text-muted">Дополнительно:</span> <?= implode(', ', $item->data->features) ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php if(Yii::$app->request->get(AddToCartForm::SUCCESS_VAR)) : ?>
                    <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Уже в корзине</h4>
                <?php elseif($item->available) : ?>
                    <br/>
                    <div class="well well-sm">
                        <?php $form = ActiveForm::begin(['action' => Url::to(['/shopcart/add', 'id' => $item->id])]); ?>
                        <?php if(count($colors)) : ?>
                            <?= $form->field($addToCartForm, 'color')->dropDownList($colors) ?>
                        <?php endif; ?>
                        <?= $form->field($addToCartForm, 'count') ?>
                        <?= Html::submitButton('В корзину', ['class' => 'btn btn-warning']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="description<?= (!$item->description) ? ' hidden' : '' ?>" itemprop="description"><?= ($item->description) ? $item->description : 'Подробное описание отсутсвует' ?></div>
    </div>
</div>
</div>