{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container">
    <h2>Agregar Season<h2>

            <form action="upload_season" method="POST">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Numero de Season </label>
                        <input required name="season_number_input" type="number" class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Cantidad de capitulos </label>
                    <input required name="chapter_count_input" type="number" class="form-control" id="formGroupExampleInput">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Agregar</button>
</div>

</form>
</div>
{include file="scripts.tpl" }