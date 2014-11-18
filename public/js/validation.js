 $(function() {
	$('input').on("propertychange keyup input paste", function(e) {
		e.target;
		setTimeout(function() {
			var target = $(e.target);
			var str = target.val();
			if (!str.match(/^[a-zA-Z0-9\-]+$/)) {
				target.parent().addClass("has-error");
			} else {
				target.parent().removeClass('has-error');
			}
			if (str == ''){
				target.parent().removeClass('has-error');
			}
		}, 1);
	});
	$('#signup-email').on("propertychange keyup input paste", function(e) {
		e.target;
		setTimeout(function() {
			var target = $(e.target);
			var str = target.val();
			if (!str.match(/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/)) {
				target.parent().addClass("has-error");
			} else {
				target.parent().removeClass('has-error')
			}
			if (str == ''){
				target.parent().removeClass('has-error');
			}
		}, 1);
	});
	$('#btn-login').on('click', function(e) {
		var $username = $('#signup-username');
		var $password = $('#signup-password');
		var $email = $('#signup-email');
		if (!$username.val().match(/^[a-zA-Z0-9\-]+$/)) {
			e.preventDefault();
		} else if (!$password.val().match(/^[a-zA-Z0-9\-]+$/)) {
			e.preventDefault();
		} else if (!$emailInput.val().match(/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/)) {
			e.preventDefault();
		}
	});
});