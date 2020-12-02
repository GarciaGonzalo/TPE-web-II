{include file="head.tpl"}
{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container text-center">
    <div class="card bg-dark text-white mx-auto" style="width: 50%;">
        <img class="card-img-top" src="{$chapter->thumbnail_path}" alt="chapter {$chapter->title} thumbnail" style="height: 30em;">
        <div class="card-body">
            <h5 class="card-title">{$chapter->title}</h5>
            <p class="card-text">{$chapter->title} is the chapter number {$chapter->chapter_number} of season {$season_number}.</p>
            <p class="card-text">in this episode {$chapter->description}</p>
        </div>
        <ul class="list-group list-group-flush ">
            <li class="bg-secondary list-group-item">Written by: {$chapter->writer}</li>
            <li class="bg-secondary list-group-item">Directed by: {$chapter->director}</li>
            <li class="bg-secondary list-group-item">First emision: {$chapter->emision_date}</li>
            <li class="bg-secondary list-group-item">User rating: {$chapter->rating}</li>
        </ul>
        {if $logged == true}
            <div class="card-body justify-content-around row">
                <div class="col"><a href="edit modo/{$chapter->id}"><button id="ver_detalle" type="button" class="btn btn-warning">Edit </button></a></div>
                <div class="col"><a href="delete chapter/{$chapter->id}"><button id="ver_detalle" type="button" class="btn btn-danger">Delete</button></a></div>
            </div>
        {/if}
        <form id="rateForm" action="rate/{$chapter->id}" method="POST" class="commentForm">
            <label for="rating">rating</label>
            {if !$rating}
                <select id="rating" name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5" selected>5</option>
                </select>
            {else}
                <select id="rating" name="rating">
                    <option value="1" {if $rating eq 1}selected{/if}>1</option>
                    <option value="2" {if $rating eq 2}selected{/if}>2</option>
                    <option value="3" {if $rating eq 3}selected{/if}>3</option>
                    <option value="4" {if $rating eq 4}selected{/if}>4</option>
                    <option value="5" {if $rating eq 5}selected{/if}>5</option>
                </select>
            {/if}
            <div class="form-row text-center">
                <button type="submit" class="btn btn-primary mx-auto">Rate</button>
            </div>
        </form>
        {include file="vue/commentSection.vue"}
    </div>
</div>
{include file="scripts.tpl"}
<script src="js/comments.js"></script>