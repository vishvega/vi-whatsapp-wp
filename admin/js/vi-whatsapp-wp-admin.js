(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


// Init Nice Select : need to add class .niced
$(document).ready(function() {
	$('select.niced').niceSelect();
});


$(document).ready(function() {

	// Expand / Collapse settings tab
	$("a.whatsapp_for_wordpress_vi-admin-accord-head").click(function(e_accord){
		console.log("in");
		// Change plus-minus icon on self
		$(this).toggleClass("opened");
		// $(this).parent().find(".whatsapp_for_wordpress_vi-admin-accord-body").togggleClass("collapsed");
		// Change body expand/collapse
		$(".whatsapp_for_wordpress_vi-admin-accord-body").toggleClass("extended");
	});

	// Change the preview depending on View as method
	// $(".wa_for_wp_vi_settings_viewopt.nice-select.niced").on("click", function(){
	// 	console.log($("#vi_whatsapp_wp_settings_frontview").find('option:selected').val());
	// 	// console.log("LOL");
	// });
	let settingsViewOption = $("#vi_whatsapp_wp_settings_frontview");
	let settingsViewPreview = $(".whatsapp_for_wordpress_vi-admin-main-config-basic-body-qlook-logo img");
	let settingsViewName = $(".whatsapp_for_wordpress_vi-admin-main-config-basic-body-qlook-in");

	settingsViewOption.on("change", function(){
		console.log( $(this).val() );
		settingsViewName.html( $(this).find("option:selected").text() );
		if( $(this).val() == 1 ){
			settingsViewPreview.fadeOut(function(){
				settingsViewPreview.attr("src","https://picsum.photos/id/10/465/545").fadeIn();
			});
		}
		if( $(this).val() == 2 ){
			settingsViewPreview.fadeOut(function(){
				settingsViewPreview.attr("src","https://picsum.photos/id/11/465/545").fadeIn();
			});
		}
		if( $(this).val() == 3 ){
			settingsViewPreview.fadeOut(function(){
				settingsViewPreview.attr("src","https://picsum.photos/id/12/465/545").fadeIn();
			});
		}
	});
});



})( jQuery );
