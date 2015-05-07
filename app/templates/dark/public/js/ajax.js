$(function () {
	$('#panel-of-control').live('submit', function(){
		$.blockUI(blockConfig);
		$.ajax({
			type: 'POST',
			url: base + '/login',
			data: $(this).serialize(),
			dataType: 'json',
			success: function(data){
				if (data.success == 1) {
					window.location = base;	
				} else {
					$.blockUI({ 
						css: blockCss,
						message: data.error
					});
					if ($('#username').val() == '') {
						$('#username').focus();
					} else if ($('#password').val() == '') {
						$('#password').attr('value', '').focus();
					} else {
						$('#password').attr('value', '').focus();
					}
					setTimeout($.unblockUI, 3000);
				}
			}
		});
		return false;
	});	
});