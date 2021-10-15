$(function(){
	$(document).on('click', '.field-repeat .btn-add', function(e){
		e.preventDefault();
							
		var lastRow = $(this).parents('.field-repeat');
		var newEntry = $(lastRow.clone()).insertAfter(lastRow);
			
		$(this).parents('.repeat-parent').find('.field-repeat:not(:last) .btn-add')
			.removeClass('btn-add').addClass('btn-remove')
			.removeClass('btn-success').addClass('btn-danger')
			.html('<i class="fa fa-times" aria-hidden="true"></i>');
							
	}).on('click', '.btn-remove', function(e){
		$(this).parents('.field-repeat').remove();

		e.preventDefault();
		return false;
	});
});