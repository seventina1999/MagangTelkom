<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<h2 class="heading-section">Form Registrasi</h2>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4">
				<div class="login-wrap p-0">
					<h3 class="mb-4 text-center">Create an account?</h3>
					<?= $this->session->flashdata('message'); ?>
					<form class="signin-form" method="post" action="<?= base_url('auth/registrasi'); ?>">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('username'); ?>" name="username">
							<?= form_error('username', '<small class="text-danger pl-3>', '</small>'); ?>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Alamat Email" value="<?= set_value('email'); ?>" name="email">
							<?= form_error('email', '<small class="text-danger pl-3>', '</small>'); ?>
						</div>
						<div class="form-group">
							<input id="password-field" type="password" class="form-control" placeholder="Password harus sepanjang 7-8 karakter" value="<?= set_value('password'); ?>" name="password1">
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							<?= form_error('username', '<small class="text-danger pl-3>', '</small>'); ?>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Repeat Password" name="password2">
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						</div>
						<div class="form-group">
							<select id="inputStatus" class="form-control custom-select" name="id_divisi">
								<option selected disabled>Nama Divisi</option>
								<?php foreach ($divisi as $dv) : ?>
									<option style="color:black" value="<?= $dv['id'] ?>"><?= $dv['nama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
						</div>
						<div class="form-group d-md-flex">
							<div class="w-50">
							</div>
							<div class="w-50 text-md-right">
								<a href="<?= base_url(); ?>auth" style="color: #fff">Login</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>