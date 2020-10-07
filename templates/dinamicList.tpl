{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}

<div class="container text-center">
    <h1 class="text-white">F.R.I.E.N.D.S Season {$season}</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Direction</th>
                <th scope="col">Writer</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$chapters item=chapter}
                <tr>
                    <td class="align-middle">{$chapter->title}</td>
                    <td class="align-middle">{$chapter->director}</td>
                    <td class="align-middle">{$chapter->writer}</td>
                    <!----$chapter->thumbnail_path ---->
                    <td class="d-flex flex-column"><img src="images/thumbnail 1.png" alt="thumbnail {$chapter->title}" class="img-thumbnail">
                    <span>{$chapter->emision_date}</span></td>
                    <td class="align-middle"><button id="ver_detalle" type="button" class="btn btn-secondary"><a href="detalle/{$chapter->id}">Ver detalle</button>
                    {if $logged == true}
                        <button id="ver_detalle" type="button" class="btn btn-warning"><a href="edit/{$chapter->id}">Editar</button>
                        <button id="ver_detalle" type="button" class="btn btn-danger"><a href="delete/{$chapter->id}">Borrar</button>
                    {/if}</td>
                </tr>
            {/foreach}
        </tbody>
        </table>
</div>
{include file="scripts.tpl"}