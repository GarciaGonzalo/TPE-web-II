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
                            <option value="1">Season 1</option>
                            <option value="2">Season 2</option>
                            <option value="3">Season 3</option>
                            <option value="4">Season 4</option>
                            <option value="5">Season 5</option>
                            <option value="6">Season 6</option>
                            <option value="7">Season 7</option>
                            <option value="8">Season 8</option>
                            <option value="9">Season 9</option>
                            <option value="10">Season 10</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Cargar</button>
</div>

</form>
</div>

{include file="scripts.tpl"}