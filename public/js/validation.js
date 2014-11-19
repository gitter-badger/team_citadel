 $(function() {
 	// Check every input box on key change
	$('input').on("propertychange keyup input paste", function(e) {
		e.target;
		setTimeout(function() {
			var target = $(e.target);
			var str = target.val();
			// If values in input does not match the regular expression highlight input box
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
	// Check signup email input form on key change
	$('#signup-email').on("propertychange keyup input paste", function(e) {
		e.target;
		setTimeout(function() {
			var target = $(e.target);
			var str = target.val();
			// If values in email does not match the regular expression highlight input box
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
	// When login button is clicked
	$('#btn-login').on('click', function(e) {
		var $username = $('#signup-username');
		var $password = $('#signup-password');
		var $email = $('#signup-email');
		// Values in login form does not match the regular expression check prevent default
		if (!$username.val().match(/^[a-zA-Z0-9\-]+$/)) {
			e.preventDefault();
		} else if (!$password.val().match(/^[a-zA-Z0-9\-]+$/)) {
			e.preventDefault();
		} else if (!$emailInput.val().match(/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/)) {
			e.preventDefault();
		}
	});
	// When registration button is clicked
	$('#btn-signup').on('click', function(e) {
		var $regFirstName = $('#reg-firstname');
		var $regLastName = $('#reg-lastname');
		var $regUsername = $('#reg-username');
		var $regPassword = $('#reg-password');
		var $regEmail = $('#reg-email');
		// Values in registraion form does not match the regular expression check prevent default
		if (!$regFirstName.val().match(/^[a-zA-Z0-9\-]+$/)) {
			e.preventDefault();
		} else if (!$regLastName.val().match(/^[a-zA-Z0-9\-]+$/)) {
			e.preventDefault();
		} else if (!$regUsername.val().match(/^[a-zA-Z0-9\-]+$/)) {
			e.preventDefault();
		} else if (!$regPassword.val().match(/^[a-zA-Z0-9\-]+$/)) {
			e.preventDefault();
		} else if (!$regEmail.val().match(/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/)) {
			e.preventDefault();
		}
	});
});