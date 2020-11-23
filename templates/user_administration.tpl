{include file="head.tpl"}

{include file="navbar.tpl" user=$user logged=$logged seasons=$seasons}
    <div class="container">
    <table class="table table-dark">
    <thead>
        <tr>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Super User</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$user item=users}
        <tr>    
        <td>{$users->email}</td>
        <td>{$users->password}</td>
        <td>{$users->super_user}</td>
        <td><a href="edit_user/{$users->id}"><button id="ver_detalle" type="button" class="btn btn-warning">Edit User</button></a></td>
        <td><a href="delete_user/{$users->id}"><button id="ver_detalle" type="button" class="btn btn-warning">Delete User</button></a></td>
        </tr>
        {/foreach}
    </tbody>
</table>


{include file="scripts.tpl"}