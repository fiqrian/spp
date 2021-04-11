	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	</head>

	<body>
		<div class="login-header box-shadow">
			<div class="container-fluid d-flex justify-content-between align-items-center">
				<div class="brand-logo">
					<a href="<?= base_url('login') ?> ">
						<img src="<?= base_url('assets/vendors/images/SMK.png') ?> " alt="">
					</a>
				</div>
				<div class="login-menu">
					<ul>
						<li><a href="<?= base_url('login') ?>">Login</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
						<img src=" <?= base_url('assets/vendors/images/forgot-password.png') ?> " alt="">
					</div>
					<div class="col-md-6">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Forgot Password</h2>
							</div>
							<h6 class="mb-20">Enter your email address to reset your password</h6>
							<?= view('Myth\Auth\Views\_message_block') ?>


							<?php echo session()->set('redirect_url', base_url(route_to('reset'))); ?>

							<form action="<?= route_to('forgot') ?>" method="post">
								<?= csrf_field() ?>
								<div class="input-group custom">
									<input type="text" class="form-control form-control-lg  <?php if (session('errors.email')) : ?>is-invalid<?php endif ?> " name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
									<div class=" input-group-append custom">
										<span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
									</div>
									<div class="invalid-feedback">
										<?= session('errors.email') ?>
									</div>
								</div>
								<div class="row align-items-center">
									<div class="col-5">
										<div class="input-group mb-0">
											<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
										-->
											<button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>

											<!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Submit</a> -->
										</div>
									</div>
									<div class="col-2">
										<div class="font-16 weight-600 text-center" data-color="#707373">or</div>
									</div>
									<div class="col-5">
										<div class="input-group mb-0">
											<a class="btn btn-outline-primary btn-lg btn-block" href="<?= base_url('login') ?>">Login</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>