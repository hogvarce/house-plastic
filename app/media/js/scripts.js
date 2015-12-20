$(function(){

	if ( $('.goods').length ) 
	{
			var container = $('.goods');
			container.imagesLoaded( function () {
			  container.masonry({
			    columnWidth: '.goods-item',
			    itemSelector: '.goods-item',
				percentPosition: true
			  });   
			});
	}

}());
