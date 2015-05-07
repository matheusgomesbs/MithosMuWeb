$(function () {
	$('form[remote-form]').submit(function () {
		var $this = $(this);
		var button = $this.find('input[type=submit]');
	
		button.attr('disabled', true);
		button.after('<span class="loading"></span>');
		
		var loading = $this.find('span.loading');
		var message = $this.find('.message');
		
		$.ajax({
			type: 'POST',
			url: $this.attr('action'),
			data: $this.serialize()
		}).success(function (data) {
			var response = JSON.parse(data);
			if (response.success) {
				if (response.redirect) {
					window.location = response.redirect;
				}
				message.remove();
			} else {
				if (response.message) {
					if (message.size() > 0) {
						message.html(response.message);
					} else {
						$this.prepend('<div class="message error">' + response.message + '</div>');
					}
				}
				button.attr('disabled', false);
				loading.remove();
			}
		}).error(function () {
			
		});
		return false;
	});
});