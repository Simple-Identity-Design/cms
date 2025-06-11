<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('/global/cms/meta.php'); ?>
	<title>Knowledge Base | CORK - Multipurpose Bootstrap Dashboard Template </title>
	<?php $this->load->view('/global/cms/styles.php'); ?>
	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
	<link href="/assets/cms-assets/src/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/cms-assets/layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
	<link href="/assets/cms-assets/src/assets/css/light/authentication/auth-cover.css" rel="stylesheet" type="text/css" />
	<link href="/assets/cms-assets/layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
	<link href="/assets/cms-assets/src/assets/css/dark/authentication/auth-cover.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>
<body class=" layout-boxed">
	<?php $this->load->view('/global/cms/loader.php'); ?>
	<div class="auth-container d-flex">
		<div class="container mx-auto align-self-center">
			<div class="row">
				<div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
					<div class="auth-cover-bg-image"></div>
					<div class="auth-overlay"></div>
					<div class="auth-cover">
						<div class="position-relative">
							<img src="/assets/cms-assets/src/assets/img/auth-cover.svg" alt="auth-img">
							<h2 class="mt-5 text-white font-weight-bolder px-2">Join the community of expert developers</h2>
							<p class="text-white px-2">It is easy to setup with great customer experience. Start your 7-day free trial</p>
						</div>
					</div>
				</div>
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
					<div class="card">
						<div class="card-body">
							<!-- Add this above the row if using CodeIgniter's form helper -->
							<?php if ($this->session->flashdata('error_msg')): ?>
								<div class="alert alert-danger">
									<?php echo $this->session->flashdata('error_msg'); ?>
								</div>
							<?php elseif ($this->session->flashdata('success_msg')): ?>
								<div class="alert alert-success">
									<?php echo $this->session->flashdata('success_msg'); ?>
								</div>
							<?php endif; ?>
							<form method="post" action="<?php echo base_url('login/login_user'); ?>">
								<div class="row">
									<div class="col-md-12 mb-3">
										<h2>Sign In</h2>
										<p>Enter your email and password to login</p>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label">Email or Username</label>
											<input type="text" name="user_name" class="form-control" required>
										</div>
									</div>
									<div class="col-12">
										<div class="mb-4">
											<label class="form-label">Password</label>
											<input type="password" name="user_password" class="form-control" required>
										</div>
									</div>
									<div class="col-12">
										<div class="mb-3">
											<div class="form-check form-check-primary form-check-inline">
												<input class="form-check-input me-3" type="checkbox" name="remember_me" id="form-check-default">
												<label class="form-check-label" for="form-check-default">
													Remember me
												</label>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="mb-4">
											<button type="submit" class="btn btn-secondary w-100">SIGN IN</button>
										</div>
									</div>
									<div class="col-12">
										<div class="text-center">
											<p class="mb-0">Don’t have an account?<a href="/register" class="text-warning"> Sign Up!</a> | <a href="/forgot" class="text-warning">Forgot Password? </a>| <a href="/" class="text-warning">Back Home</a></p>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('/global/cms/scripts.php'); ?>
</body>
</html>