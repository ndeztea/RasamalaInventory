<div class="container login-box">
	<h1>PT. RCP</h1>
	<center>
	<table class="text-center">
		<?php echo form_open(site_url('login/')); ?>

		<tr>
			<td><label for="username">Username</label></td>
			<td>:</td>
			<td><input type="text" name="username" class="form-control" /></td>
		</tr>

		<tr>
			<td><label for="password">Password</label></td>
			<td>:</td>
			<td><input class="form-control" type="password" name="password"></td>
		</tr>

		<tr>

			<td colspan="3"><input type="submit" class="btn btn-info" value="Login"></td>
		</tr>
		<?php form_close(); ?>

	</table>
	</center>
</div>