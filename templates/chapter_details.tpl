{include file="head.tpl"}
{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container text-center">
    <div class="card bg-dark text-white mx-auto" style="width: 18rem;">
        <img class="card-img-top" src="images/thumbnail 1.png" alt="chapter {$chapter->title} thumbnail">
        <div class="card-body">
            <h5 class="card-title">{$chapter->title}</h5>
            <p class="card-text">{$chapter->title} is the chapter number {$chapter->chapter_number} of season {$season_number}.</p>
            <p class="card-text">in this episode {$chapter->description}</p>
        </div>
        <ul class="list-group list-group-flush ">
            <li class="bg-secondary list-group-item">Written by: {$chapter->writer}</li>
            <li class="bg-secondary list-group-item">Directed by: {$chapter->director}</li>
            <li class="bg-secondary list-group-item">First emision: {$chapter->emision_date}</li>
        </ul>
        {if $logged == true}
            <div class="card-body justify-content-around row">
                <div class="col"><a href="edit modo/{$chapter->id}"><button id="ver_detalle" type="button" class="btn btn-warning">Edit </button></a></div>
                <div class="col"><a href="delete chapter/{$chapter->id}"><button id="ver_detalle" type="button" class="btn btn-danger">Delete</button></a></div>
            </div>
        {/if}
    </div>
</div>
{include file="scripts.tpl"}