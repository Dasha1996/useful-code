(function( $ ) { 
	console.log("enqued");
	$(document).ready(function() {	
	$(document).on( 'scroll', function() {
        $('.title-area').css('cursor', 'pointer');
		if ( $(document).scrollTop() > 100 ) {
			$( '.ast-main-header-wrap.main-header-bar-wrap' ).addClass('header-fixed'); //makes the whole header fixed
			$('.site-header-primary-section-left.site-header-section.ast-flex.site-header-section-left').css('display', 'block'); // adds logo on the right side
			$('.ast-builder-menu-1.ast-builder-menu.ast-flex.ast-builder-menu-1-focus-item.ast-builder-layout-element.site-header-focus-item').addClass('menu-scroll');	//class with scroll styles for menu

		} else {
			$( '.ast-main-header-wrap.main-header-bar-wrap' ).removeClass('header-fixed');
			$('.site-header-primary-section-left.site-header-section.ast-flex.site-header-section-left').css('display', 'none');
			$('.ast-builder-menu-1.ast-builder-menu.ast-flex.ast-builder-menu-1-focus-item.ast-builder-layout-element.site-header-focus-item').removeClass('menu-scroll');		
		}
	});		 
  });	
	}) ( jQuery );


//to enque in wordpress
/*function test() {
    wp_enqueue_script( 'logo_scroll_script','/wp-content/themes/astra-child/test.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'test' );*/