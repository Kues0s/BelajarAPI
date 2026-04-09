
<!DOCTYPE html>
<html lang="en">

<head>

		<?php
		$identitas = parse_ini_file('identitas.txt');
		$nama = isset($identitas['nama']) ? $identitas['nama'] : '';
		$nim = isset($identitas['nim']) ? $identitas['nim'] : '';
	?>
	<title><?php echo htmlspecialchars($nim); ?>-<?php echo htmlspecialchars($nama); ?></title>


	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">
	<!-- fontawesome icon -->
	<link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
	<!-- animation css -->
	<link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content container">
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="card-body">
						<img src="assets/images/logo-dark.svg" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Sign up into your account</h4>
						<div class="form-group mb-2">
							<label class="form-label">User</label>
							<input type="text" class="form-control" placeholder="Enter User Name">
						</div>
						<div class="form-group mb-2">
							<label class="form-label">Enter Email</label>
							<input type="email" class="form-control" placeholder="name@sitename.com">
						</div>
						<div class="form-group mb-2">
							<label class="form-label">Enter Password</label>
							<input type="password" class="form-control" placeholder="Allow only max 14 character">
						</div>
						
						<button class="btn btn-primary mb-4 btf">Sign up</button>
						<p class="mb-2">Already have an account? <a href="login.php" class="f-w-400">Log in</a>
						</p>
					</div>
				</div>
				<div class="col-md-6 d-none d-md-block">
					<img src="assets/images/auth-bg.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


<div class="footer-fab">
    <div class="b-bg">
        <i class="fas fa-question"></i>
    </div>
    <div class="fab-hover">
        <ul class="list-unstyled">
            <li><a href="../doc/index-bc-package.html" target="_blank" data-text="UI Kit" class="btn btn-icon btn-rounded btn-info m-0"><i class="feather icon-layers"></i></a></li>
            <li><a href="../doc/index.html" target="_blank" data-text="Document" class="btn btn-icon btn-rounded btn-primary m-0"><i class="feather icon feather icon-book"></i></a></li>
        </ul>
    </div>
</div>


</body>

</html>