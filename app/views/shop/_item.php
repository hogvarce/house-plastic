<?php use yii\helpers\Html; ?>

<div class="goods-item col-xs-12 col-md-5 animated fadeIn">
    <div class="col-xs-5 col-md-5">
        <?= Html::a(Html::img($item->thumb(120), ['alt' => $item->title]), ['shop/view', 'slug' => $item->slug]) ?>
    </div>
    <div class="col-xs-7 col-md-7">
        <p><?= Html::a($item->title, ['shop/view', 'slug' => $item->slug]) ?></p>
         <p>
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
			<?php if ( isset($item->data->inpack) && $item->data->inpack > 0 ) : ?>
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
        </p>
        <h3>
            <?php if($item->discount) : ?>
                <del class="small"><?= $item->oldPrice ?></del>
            <?php endif; ?>
            <?= $item->price ?><i class="fa fa-rub"></i>
        </h3>
        <hr>
    </div>
</div>
