{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container text-center">
    <h1 class="text-white">F.R.I.E.N.D.S Seasons </h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Chapter Count</th>
             
            </tr>
        </thead>
        <tbody>
            {foreach from=$seasons item=season}
                <tr>
                    <td class="align-middle">{$season->season}</td>
                    <td class="align-middle">{$season->chapter_count}</td>
                  
                    <td class="align-middle"><a href="season/{$season->season}"><button id="ver_detalle" type="button" class="btn btn-secondary">Ver capitulos</button></a>

                            <a href="edit_season_modo/{$season->id}"><button id="ver_detalle" type="button" class="btn btn-warning">Editar</button></a>
                            <a href="delete season/{$season->id}"><button id="ver_detalle" type="button" class="btn btn-danger">Borrar</button></a>

                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{include file="scripts.tpl"}