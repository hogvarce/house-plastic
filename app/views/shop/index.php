<?php
use yii\easyii\modules\catalog\api\Catalog;
use yii\easyii\modules\file\api\File;
use yii\easyii\modules\page\api\Page;
use yii\helpers\Html;

$page = Page::get('page-shop');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = $page->model->title;

function renderNode($node){
    if(!count($node->children)){
        $html = '<li class="col-xs-12 col-sm-4 col-md-3"><div class="category-block">
                '.Html::a(Html::img($node->image, ['class' => 'cat-preview', 'alt' => $node->title]), ['/shop/cat', 'slug' => $node->slug]).'
                '.Html::a($node->title, ['/shop/cat', 'slug' => $node->slug], ['class'=>'cat-title']).'
        </div></li>';
    } else {
        $html = '<li class="parent-category col-xs-12"><h4>'.$node->title.'</h4></li>';
        $html .= '<ul class="list-inline clearfix">';
        foreach($node->children as $child) $html .= renderNode($child);
        $html .= '</ul>';
    }
    return $html;
}
?>


<div class="row">
    <div class="col-xs-12 col-md-8">
        <h1>
            <?= $page->seo('h1', $page->title) ?>
            <a class="btn btn-success" href="<?= File::get('price-list')->file ?>"><i class="glyphicon glyphicon-save"></i> Скачать прайс-лист</a>
        </h1>
        <br/>
        <ul class="list-inline category-list">
            <?php foreach(Catalog::tree() as $node)
                echo renderNode($node);
            ?>
        </ul>
    </div>
    <div class="col-xs-12 col-md-4">
        <?= $this->render('_search_form', ['text' => '']) ?>

        <h4>Последние добавления</h4>
        <?php foreach(Catalog::last(3) as $item) : ?>
            <p>
                <?= Html::img($item->thumb(30)) ?>
                <?= Html::a($item->title, ['/shop/view', 'slug' => $item->slug]) ?><br/>
                <span class="label label-warning"><?= $item->price ?>&#8381;</span>
            </p>
        <?php endforeach; ?>
    </div>
</div>
