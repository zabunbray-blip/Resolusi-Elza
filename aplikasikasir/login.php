<?php
if (@$_SESSION['username']=="") {
	if (@$_POST['login']) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "select * from users where username ='$username' and password='$password'";
		$datauser = $koneksi->query($sql)->fetch_array();
		if (@$datauser['username'] == $username and @$datauser['password'] == $password) 
		{
			$_SESSION['username'] =$datauser['username'];
			$_SESSION['role'] = $datauser['role'];
			echo "anda berhasil login";
			/*header("Refresh: 3; url = index.php");*/
		}else{
			echo "username atau password salah !!";
			header("Refresh: 3; url=index.php?p=login");
		}
	}
?>
<div class="col-lg-12 mt-3">
	<h2>Login</h2>
	<form action="" method="POST">
		<div class="mb-3 mt-3">
			<label for="email">Username:</label>
			<input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
		</div>
		<div class="mb-3">
			<label>Password</label>
			<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
		</div>
		<br>
		<div class="mb-3 mt-3">
			<input type="submit" class="btn btn-primary form-control" name="login" value="Login">
		</div>
	</form>
</div>
<?php
}else{
	echo "anda sudah login";
	header("Refresh:3 ; url = index.php");
}
?>