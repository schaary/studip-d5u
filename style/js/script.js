/* Author: Matthias Kretschmann

*/

$(document).ready(function() {
	
	var $content = $('#emailCombination'),
		$trigger = $('#emailCombinationTrigger');
	
	$content.hide();
	
	$trigger.click(function(){
		$content.slideToggle();
		return false;
	});

});
