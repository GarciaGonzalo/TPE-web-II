{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}

<div class="container text-center">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Direction</th>
                <th scope="col">Writer</th>
                {if isset($chapters[0]->season_number)}
                    <th scope="col">season</th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$chapters item=chapter}
                <tr>
                    <td class="align-middle">{$chapter->title}</td>
                    <td class="align-middle">{$chapter->director}</td>
                    <td class="align-middle">{$chapter->writer}</td>
                    {if isset($chapters[0]->season_number)}
                        <td class="align-middle">{$chapter->season_number}</th>
                    {/if}
                    <!----$chapter->thumbnail_path ---->
                    <td class="d-flex flex-column"><img src="{$chapter->thumbnail_path}" alt="thumbnail {$chapter->title}" class="img-thumbnail img-fluid" style="width: 60em; height: 15em;">
                        <span>{$chapter->emision_date}</span></td>
                    <td class="align-middle">
                        <div class="text-center"> <a href="detalle/{$chapter->id}"><button id="ver_detalle" type="button" class="btn btn-secondary">Details</button></a></div>
                        {if $admin}
                            <div class="btn-group"> <a href="edit modo/{$chapter->id}"><button id="ver_detalle" type="button" class="btn btn-warning">Edit</button></a>
                                <a href="delete chapter/{$chapter->id}"><button id="ver_detalle" type="button" class="btn btn-danger">Delete</button></a></div>
                        {/if}
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{include file="scripts.tpl"}