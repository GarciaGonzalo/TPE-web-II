{include file="head.tpl"}

<div class="alert alert-danger container mt-4" role="alert">
    <h4 class="alert-heading">oh no :c</h4>
    <p>{$error_message}</p>
    <hr>
    <p class="mb-0">por favor {$error_solution}</p>
    <button id="back_button" type="button" class="btn btn-danger">Volver</button></a>
</div>

{include file="scripts.tpl" }