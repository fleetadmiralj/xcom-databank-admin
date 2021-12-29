<?php
use XCOMDataBank\Utility\User;

include_once __DIR__.'/../project/adminInclude.php';

$user = new User;
$userinfo = [];

if(isset($_POST['submit'])) {
    if($_POST['type'] == "login") {
        $userinfo['username'] = $_POST['username'];
        $userinfo['password'] = $_POST['password'];
        $user->userLogin($userinfo);
    }
    elseif($_POST['type'] == "signup") {
        $userinfo['username'] = $_POST['username'];
        $userinfo['password'] = $_POST['password'];
        $user->newUser($userinfo);
    }
    else {
        $user->message = "There was an error submitting your form. Please try again.";
        header('Location: https://admin.xcom-databank.games/login.php');
        exit();
    }

}
elseif(isset($_GET['type'])) {
    if($_GET['type'] == "logout") {
        $user->userLogout();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__.'/php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/php/page-head.php' ?>
        <div id="main" class="controls input-group">
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
            <p><a href="#">Sign Up</a></p>
        </div>
    <?php include_once __DIR__.'/php/scripts-include.php' ?>
	</body>
</html>