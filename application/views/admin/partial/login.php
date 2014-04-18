<?php 
if ($this->session->userdata('sign_out')) {
    echo $this->session->userdata('sign_out');
    $this->session->unset_userdata('sign_out');
} else if ($this->session->userdata('login')) {
    echo $this->session->userdata('login');
    $this->session->unset_userdata('login');
}
?>
<form class="form-signin" method="post" action="admin/login">
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="text" name="txt_username" class="form-control" placeholder="Username" required autofocus>
    <input type="password" name="txt_password" class="form-control" placeholder="Password" required>
    <label class="checkbox">
      <input type="checkbox" name="remember" value="remember-me"> Remember me
    </label>
    <input class="btn btn-lg btn-primary btn-block" name="btnLogin" value="Login" type="submit" />
</form>