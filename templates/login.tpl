{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container">
<h2>Login<h2>

<form action="verify" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email_input" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="pass_input" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

{include file="scripts.tpl" }