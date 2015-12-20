<?php
use yii\easyii\modules\article\api\Article;
use yii\easyii\modules\carousel\api\Carousel;
use yii\easyii\modules\gallery\api\Gallery;
use yii\easyii\modules\guestbook\api\Guestbook;
use yii\easyii\modules\news\api\News;
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;

$page = Page::get('page-index');

$this->title = $page->seo('title', $page->model->title);
?>

<?= Carousel::widget(1140, 520) ?>

<div class="text-center">
    <h1><?= Text::get('index-welcome-title') ?></h1>
    <p><?= $page->text ?></p>
</div>

<br/>
<hr/>

<div class="text-center">
    <h2>Последние фото</h2>
    <br/>
    <?php foreach(Gallery::last(6) as $photo) : ?>
        <?= $photo->box(180, 135) ?>
    <?php endforeach;?>
    <?php Gallery::plugin() ?>
</div>

<br/>
<hr/>

<div class="text-center">
    <h2>Последние новости</h2>
    <blockquote class="text-left">
        <?= (News::last()) ? Html::a(News::last()->title, ['news/view', 'slug' => News::last()->slug]) : "" ?>
        <br/>
        <?= (News::last()) ? News::last()->short : "" ?>
    </blockquote>
</div>

<br/>
<hr/>


<div class="text-center">
    <h2>Последние статьи</h2>
    <br/>
    <div class="row text-left">
        <?php $article = Article::last(); ?>
        <div class="col-md-2">
            <?= ($article) ? Html::img($article->thumb(160, 120)) : "" ?>
        </div>
        <div class="col-md-10 text-left">
            <?= ($article) ? Html::a($article->title, ['articles/view', 'slug' => $article->slug]) : "" ?>
            <br/>
            <?= ($article) ? $article->short : "" ?>
        </div>
    </div>
</div>

<br/>
<hr/>

<div class="text-center">
    <h2>Последние отзывы</h2>
    <br/>
    <div class="row text-left">
        <?php foreach(Guestbook::last(2) as $post) : ?>
            <div class="col-md-6">
                <b><?= $post->name ?></b>
                <p class="text-muted"><?= $post->text ?></p>
            </div>
        <?php endforeach;?>
    </div>
</div>

<br/>
