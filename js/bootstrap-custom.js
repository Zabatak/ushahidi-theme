$(document).ready( function() {
	$('.dropdown-toggle').dropdown();

	$('#l').addClass('span2');

	$('.submit-incident a').addClass('btn btn-success');
	$('.submit-incident a').prepend('<i class="icon-pencil icon-white"> </i> ');

	$('.submit-incident').addClass('submit-incident2').removeClass('submit-incident');


	
	// show/hide report filters and layers boxes on home page map
	$("a.toggle").toggle(
		function() { 
			$($(this).attr("href")).show();
			$(this).addClass("active-toggle");
		},
		function() { 
			$($(this).attr("href")).hide();
			$(this).removeClass("active-toggle");
		}
		);
	$('.mtooltip').tooltip();
        
        $('#bigmap').click(function(){
            $('#map').addClass('tallmap',1000);
            $(this).addClass('active');
            $('#smallmap').removeClass('active');
        });
        
        $('#smallmap').click(function(){
            $('#map').removeClass('tallmap');
            $(this).addClass('active');
            $('#bigmap').removeClass('active');
        });
        
        
        //hide "home" link
        $('.navbar .nav a[href$=main]').hide();
        $('.page_text img').addClass('img-polaroid');
        $('.more').addClass('btn btn-small btn-info');


});
