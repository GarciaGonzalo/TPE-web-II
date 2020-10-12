{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container">
    <h2>Cargar Nuevo<h2>

            <form action="upload chapter" method="POST">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Titulo Del capitulo </label>
                        <input required name="title_input" type="text" class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Director </label>
                    <input required name="director_input" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Escritor </label>
                    <input required name="writer_input" type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Descripcion </label>
                        <input required name="description_input" type="text" class="form-control" id="formGroupExampleInput">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="formGroupExampleInput">Fecha de emision</label>
                        <input required name="emision_date_input" type="date" class="form-control" id="formGroupExampleInput">

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Numero del capitulo</label>
                        <input required name="chapter_number_input" type="number" class="form-control" id="formGroupExampleInput">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="season_input">Temporada</label>
                        <select name="season_input">
                            {foreach from=$seasons item=season}
                                <option value="{$season->season}">Season {$season->season}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Cargar</button>
</div>

</form>
</div>

{include file="scripts.tpl"}