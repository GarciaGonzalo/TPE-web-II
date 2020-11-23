{include file="head.tpl"}

{include file="navbar.tpl" user=$user logged=$logged seasons=$seasons}
<div class="container">
    <h2>Edit User {$user->email}<h2>

            <form action="update_user/{$user->id}" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Email </label>
                        <input required name="email_input" type="text" class="form-control" id="formGroupExampleInput" value="{$user->email}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Super User </label>
                    <input required name="super_user_input" type="number" class="form-control" id="formGroupExampleInput" value="{$user->super_user}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Edit</button>
</div>
</form>
</div>
{include file="scripts.tpl" }