$(document).ready(function(){
	$('.sub-image').on('click', function(){
		$('.sub-image').removeClass('active');
		$(this).addClass('active');
		console.log($(this)[0].currentSrc);
		var src = $(this)[0].currentSrc;
		$('#header-image').attr('src', src);
	})

	$('.show-login').on('click', function(){
		$(this).attr('hidden', 'hidden');
		$('.form-login').removeClass('hidden');
	});

	$('.advanced-options-handler').on('click', function(e){
		e.preventDefault()
		console.log('jej');
		$('.advanced-options').toggleClass('hidden');
	});
});
