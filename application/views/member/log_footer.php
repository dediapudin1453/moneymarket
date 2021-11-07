<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<footer class="footer footer-alt">
	2018 - 2021 © Money Market International
</footer>

<!-- bundle -->
<script src="<?= content_url('plugins/linggafx.com/hyper/assets/js/vendor.min.js') ?> "></script>
<script src="<?= content_url('plugins/linggafx.com/hyper/assets/js/app.min.js') ?> "></script>
<script src="<?= content_url('plugins/member/js/login.js') ?>" type="text/javascript"></script>
<script>
	function viewPassword() {
		var passwordInput = document.getElementById('password');
		var passStatus = document.getElementById('pass-status');
		if (passwordInput.type == 'password') {
			passwordInput.type = 'text';
			passStatus.className = 'fa fa-eye-slash';
		} else {
			passwordInput.type = 'password';
			passStatus.className = 'fa fa-eye';
		}
	}

	function viewPassword2() {
		var passwordInput = document.getElementById('password2');
		var passStatus = document.getElementById('pass-status2');
		if (passwordInput.type == 'password') {
			passwordInput.type = 'text';
			passStatus.className = 'fa fa-eye-slash';
		} else {
			passwordInput.type = 'password';
			passStatus.className = 'fa fa-eye';
		}
	}

	function viewPassword3() {
		var passwordInput = document.getElementById('userpass');
		var passStatus = document.getElementById('pass-status3');
		if (passwordInput.type == 'password') {
			passwordInput.type = 'text';
			passStatus.className = 'fa fa-eye-slash';
		} else {
			passwordInput.type = 'password';
			passStatus.className = 'fa fa-eye';
		}
	}
</script>
</body>

</html>