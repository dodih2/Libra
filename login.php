<script type="text/javascript">
  function validasi(form){
    if (form.username.value == ""){
      alert("Anda belum mengisikan Username");
      form.username.focus();
    return (false);
    }
       
    if (form.password.value == ""){
      alert("Anda belum mengisikan Password");
      form.password.focus();
      return (false);
    }
    return (true);
  }
</script>

<span data-toggle="modal" data-target="#myModal">Login</span>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
        <form name="login" action="cek_login.php" method="post" onSubmit="return validasi(this)"> 
          <div class="form-group">
            <input name="username" type="input" class="form-control" id="exampleInputEmail1" placeholder="Username">
          </div>
          <div class="form-group">
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="modal-footer">
            <input type="Submit" value="Login" class="btn btn-primary">
            <a class="btn btn-primary" href="register.php">Register</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>