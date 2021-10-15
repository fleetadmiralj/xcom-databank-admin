<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php include_once '/home/joshch9/project/adminLogin.php' ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main">
				<form action="login.php" id="user-login" class="user-login" method="post">
					<input type="hidden" value="login" name="type">
					<div class="row">
						<div class="col-sm-1"><label for="username">Username:</label></div>
						<div class="col-sm-3"><input type="text" id="username" name="username" class="username form-control" required size="16"></div>
					</div>
					<div class="row">
						<div class="col-sm-1"><label for="password">Password:</label></div>
						<div class="col-sm-3"><input type="password" id="password" name="password" class="password form-control" required size="32"></div>
					</div>
					<div class="row">
						<div class="col-sm-4"><button type="submit" name="submit" value="submit" id="login-submit" class="login-submit form-control">Login</button></div>
					</div>
				</form>
				<p><a href="signup.php">Sign Up</a></p>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>