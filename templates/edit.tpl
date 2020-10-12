{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container">
    <h2>Edit {$chapter->title}<h2>

            <form action="edit/{$chapter->id}" method="POST">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Chapter Title </label>
                        <input required name="title_edit" type="text" class="form-control" id="formGroupExampleInput" value="{$chapter->title}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Chapter Director</label>
                    <input required name="director_edit" type="text" class="form-control" id="formGroupExampleInput" value="{$chapter->director}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Chapter Writer</label>
                    <input required name="writer_edit" type="text" class="form-control" id="formGroupExampleInput" value="{$chapter->writer}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Chapter Description</label>
                        <input required name="description_edit" type="text" class="form-control" id="formGroupExampleInput" value="{$chapter->description}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="formGroupExampleInput">Emision Date</label>
                        <input required name="emision_date_edit" type="date" class="form-control" id="formGroupExampleInput" value="{$chapter->emision_date}">

                    </div>

                </div>
                <div class="form-group col-md-6">
                    <label for="formGroupExampleInput">Chapter Number (whitin it's season)</label>
                    <input required name="chapter_number_edit" type="number" class="form-control" id="formGroupExampleInput" value="{$chapter->chapter_number}">

                </div>
                <button type="submit" class="btn btn-primary mb-2">Edit</button>
</div>

</form>
</div>
{include file="scripts.tpl" }