$(document).ready( function() {
	$('.dropdown-toggle').dropdown();

	$('#l').addClass('span2');

	$('.submit-incident a').addClass('btn btn-success');
	$('.submit-incident a').prepend('<i class="icon-pencil icon-white"> </i> ');

	$('.submit-incident').addClass('submit-incident2').removeClass('submit-incident');

});
