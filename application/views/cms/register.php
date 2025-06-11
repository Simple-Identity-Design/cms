<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('/global/cms/meta.php'); ?>
	<title>Register | Simple Identity CMS</title>
	<?php $this->load->view('/global/cms/styles.php'); ?>
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
	<link href="/assets/cms-assets/src/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet" />
	<link href="/assets/cms-assets/layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet" />
	<link href="/assets/cms-assets/src/assets/css/light/authentication/auth-cover.css" rel="stylesheet" />
	<link href="/assets/cms-assets/layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet" />
	<link href="/assets/cms-assets/src/assets/css/dark/authentication/auth-cover.css" rel="stylesheet" />
</head>
<body class="layout-boxed">
	<?php $this->load->view('/global/cms/loader.php'); ?>
	<div class="auth-container d-flex">
		<div class="container mx-auto align-self-center">
			<div class="row">
				<div class="col-6 d-lg-flex d-none h-100 my-auto text-center justify-content-center flex-column">
					<div class="auth-cover-bg-image"></div>
					<div class="auth-overlay"></div>
					<div class="auth-cover">
						<div class="position-relative">
							<img src="/assets/cms-assets/src/assets/img/auth-cover.svg" alt="auth-img">
							<h2 class="mt-5 text-white font-weight-bolder px-2">Create an account</h2>
							<p class="text-white px-2">Register now to access the CMS</p>
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
							<form method="post" action="<?= base_url('register/register_user'); ?>" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12 mb-3">
										<h2>Register</h2>
										<p>Fill in the details to create your account</p>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label class="form-label">First Name</label>
											<input type="text" name="first_name" class="form-control" required>
										</div>
									</div>
									<div class="col-6">
										<div class="mb-3">
											<label class="form-label">Last Name</label>
											<input type="text" name="last_name" class="form-control" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input type="text" name="user_name" class="form-control" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input type="email" name="user_email" class="form-control" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input type="password" name="user_password" class="form-control" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-4">
											<label class="form-label">Confirm Password</label>
											<input type="password" name="confirm_password" class="form-control" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label">Profile Image (min 1200x1200px, max 2000x2000px)</label>
											<input type="file" name="profile_image" class="form-control" accept="image/*" required>
										</div>
									</div>
									<div class="col-12">
										<div class="mb-4">
											<button type="submit" class="btn btn-secondary w-100">REGISTER</button>
										</div>
									</div>
									<div class="col-12">
										<div class="text-center">
											<p class="mb-0">Already have an account? <a href="/login" class="text-warning">Sign In!</a> | <a href="/" class="text-warning">Back Home</a></p>
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