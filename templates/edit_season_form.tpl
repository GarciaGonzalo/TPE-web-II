{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container">
    <h2>Edit season {$season_edit->season}<h2>

            <form action="edit_season/{$season_edit->id}" method="POST">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Season Number </label>
                        <input required name="season_number_input" type="number" class="form-control" id="formGroupExampleInput" value="{$season_edit->season}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Chapter Count </label>
                    <input required name="chapter_count_input" type="number" class="form-control" id="formGroupExampleInput" value="{$season_edit->chapter_count}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Edit</button>
</div>

</form>
</div>
{include file="scripts.tpl" }