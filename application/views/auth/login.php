<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section">Form Login</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4">
				<div class="login-wrap p-0">
					<h3 class="mb-4 text-center">Have an account?</h3>
					<?= $this->session->flashdata('message'); ?>
					<form class="signin-form" method="post" action="<?= base_url('auth'); ?>">
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Username" value="<?= set_value('email'); ?>" name="email">
							<?= form_error('email', '<small class="text-danger pl-3>', '</small>'); ?>
						</div>
						<div class="form-group">
							<input id="password-field" type="password" class="form-control" placeholder="Password" value="<?= set_value('nama'); ?>" name="password">
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							<?= form_error('password', '<small class="text-danger pl-3>', '</small>'); ?>
						</div>
						<div class="form-group">
							<button type="submit" class="form-control btn btn-primary submit px-3">Login</button>
						</div>
						<div class="form-group d-md-flex">
							<div class="w-50">
								<label class="checkbox-wrap checkbox-primary">Remember Me
									<input type="checkbox" checked>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="w-50 text-md-right">
								<a href="<?= base_url(); ?>auth/registrasi" style="color: #fff">Register</a>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>