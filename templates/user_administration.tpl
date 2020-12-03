{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Super User</th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$users item=user}
                <tr>
                    <td>{$user->email}</td>
                    <td>{if $user->super_user eq 0}No{else}Yes{/if}</td>
                    {if $user->id == $current_userID}
                        <td> </td>
                    {else}
                        <td><a href="super_user/{$user->id}"><button id="ver_detalle" type="button" class="btn btn-warning">Change super user</button></a></td>
                    {/if}
                    <td><a href="delete_user/{$user->id}"><button id="ver_detalle" type="button" class="btn btn-warning">Delete User</button></a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>


    {include file="scripts.tpl"}