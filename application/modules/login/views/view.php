<div class="container text-center">
					<h1>LOGIN</h1>
					<table>
						<?php form_open(site_url('login/')); ?>
						<tr>
							<td><label for="username">Username</label></td>
							<td>:</td>
							<td><input type="text" name="username" /></td>
						</tr>

						<tr>
							<td><label for="password">Password</label></td>
							<td>:</td>
							<td><input type="password" name="password"></td>
						</tr>

						<tr>
							<td colspan="3"><input type="submit" value="Login"></td>
						</tr>
						<?php form_close(); ?>
					</table>
</div>