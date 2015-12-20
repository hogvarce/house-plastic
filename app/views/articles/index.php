<?php
use yii\easyii\modules\article\api\Article;
use yii\easyii\modules\page\api\Page;
use yii\helpers\Html;

$page = Page::get('page-articles');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = $page->model->title;

function renderNode($node){
    if(!count($node->children)){
        $html = '<li class="col-xs-12 col-sm-6 col-md-4 text-center">'.((isset($node->image)) ? Html::a(Html::img($node->image, ['width' => '100%', 'alt' => $node->title]), ['/articles/cat', 'slug' => $node->slug]) : '')
        .'<h4>'.Html::a($node->title, ['/articles/cat', 'slug' => $node->slug]).'</h4></li>';
    } else {
        $html = '<li>'.$node->title.'</li>';
        $html .= '<ul>';
        foreach($node->children as $child) $html .= renderNode($child);
        $html .= '</ul>';
    }
    return $html;
}
?>
<h1><?= $page->seo('h1', $page->title) ?></h1>

<br/>
<ul class="list-inline">
    <?php foreach(Article::tree() as $node) echo renderNode($node); ?>
</ul>
