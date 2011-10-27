/* Author: 

*/


$(document).ready(function() {
  	
  	// highlight the selected radiorow
	$('.radiorow').filter(':has(:radio:selected)').end().click(function(event) {
		if (event.target.type !== 'radio') {
			$(':radio', this).trigger('click');
		}
		$('.radiorow').removeClass('selected');
		$(this).toggleClass('selected');
	});

});