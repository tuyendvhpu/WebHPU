cookie_popup = (function() {
	if ($.cookie('cookie_popup') !== undefined) {
		$('.cookie-popup-wrap').fadeIn(600);
		$.cookie('cookie_popup',true,{ expires: 10 });
			};

	$('#closepopup').click(function (e) {

		$('.cookie-popup-wrap').hide();
		  $("#container").hide();
	});
	$('.cookie-popup-wrap').click(function (e) {

		$('.cookie-popup-wrap').hide();
		  $("#container").hide();
	});

});

setTimeout(function() {
	cookie_popup();
}, 100);
/*
$(window).scroll(function(){
	if($(this).scrollTop() > 100){
		cookie_popup();
	}
});

*/