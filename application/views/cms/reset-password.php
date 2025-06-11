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
							<h2 class="mt-5 text-white font-weight-bolder px-2">?Reset Your Password</h2>
							<p class="text-white px-2">.Enter your new password below to regain access</p>
						</div>
					</div>
				</div>
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
					<div class="card">
						<div class="card-body">
							<?php if ($this->session->flashdata('error_msg')): ?>
								<div class="alert alert-danger">
									<?php echo $this->session->flashdata('error_msg'); ?>
								</div>
							<?php elseif ($this->session->flashdata('success_msg')): ?>
								<div class="alert alert-success">
									<?php echo $this->session->flashdata('success_msg'); ?>
								</div>
							<?php endif; ?>
							<form method="post" action="<?php echo base_url('reset-password/update'); ?>">
								<input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
								<div class="row">
									<div class="col-md-12 mb-3">
										<h2>?Reset Password</h2>
										<p class="text-warning">.Enter and confirm your new password</p>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label">New Password</label>
											<input type="password" name="password" class="form-control" required minlength="8">
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input type="password" name="confirm_password" class="form-control" required minlength="8">
										</div>
									</div>
									<div class="col-12">
										<div class="mb-4">
											<button type="submit" class="btn btn-secondary w-100">Reset Password</button>
										</div>
									</div>
									<div class="col-12">
										<div class="text-center">
											<a href="/login" class="text-warning">Back to Login</a>
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