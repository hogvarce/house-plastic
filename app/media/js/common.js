requirejs.config({
    baseUrl: window.app.baseUrl + '/js',
    paths: {
        jquery: '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min',
        masonry: '//cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min',
        imagesLoaded: '//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.2.0/imagesloaded.pkgd.min',
        scripts: 'scripts',
        bridget: 'bridget'
    },
    shim: {
        jquery: {
            exports: 'jquery',
        },
        masonry: {
            deps: ['jquery'],
            exports: 'masonry'
        },
        imagesLoaded: {
            deps: ['jquery'],
            exports: 'imagesLoaded'
        },
        scripts: {
            exports: 'scripts'
        },
        bridget: {
            deps: ['jquery'],
            exports: 'bridget'
        }
    }
});


require(['jquery','scripts'],function($,scripts){});