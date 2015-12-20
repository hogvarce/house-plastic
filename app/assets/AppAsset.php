<?php
namespace app\assets;

class AppAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@app/media';
    public $css = [
        '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.0/animate.min.css',
		'//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        'css/styles.css',
        'css/catalog.css',
    ];
    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.2.0/imagesloaded.pkgd.min.js',
        'js/scripts.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
