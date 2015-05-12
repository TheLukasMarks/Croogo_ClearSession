$(document).ready(function() {
	$('#ClearSessionCheckAll').click(function() {
		$("INPUT[type='checkbox']").attr('checked', $('#ClearSessionCheckAll').is(':checked'));    
	});
});