{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container">
    <h2>Editar<h2>

            <form action="edit/{$chapter->id}" method="POST">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Titulo Del capitulo </label>
                        <input required name="title_edit" type="text" class="form-control" id="formGroupExampleInput" value="{$chapter->title}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Director </label>
                    <input required name="director_edit" type="text" class="form-control" id="formGroupExampleInput" value="{$chapter->director}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Escritor a editar</label>
                    <input required name="writer_edit" type="text" class="form-control" id="formGroupExampleInput" value="{$chapter->writer}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Descripcion a editar</label>
                        <input required name="description_edit" type="text" class="form-control" id="formGroupExampleInput" value="{$chapter->description}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="formGroupExampleInput">Fecha a editar</label>
                        <input required name="emision_date_edit" type="date" class="form-control" id="formGroupExampleInput" value="{$chapter->emision_date}">

                    </div>

                </div>
                <div class="form-group col-md-6">
                    <label for="formGroupExampleInput">Numero del capitulo</label>
                    <input required name="chapter_number_edit" type="number" class="form-control" id="formGroupExampleInput" value="{$chapter->chapter_number}">

                </div>
                <button type="submit" class="btn btn-primary mb-2">Editar</button>
</div>

</form>
</div>
{include file="scripts.tpl" }