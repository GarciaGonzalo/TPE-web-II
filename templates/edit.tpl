{include file="head.tpl"}

{include file="navbar.tpl" logged=$logged seasons=$seasons}
<div class="container">
<h2>Editar<h2>

<form action="edit" method="POST">
<div class="form-row">
    
    <div class="form-group col-md-6">
        <label for="formGroupExampleInput">Titulo Del capitulo a editar</label>
        <input required name="title_edit" type="text" class="form-control" id="formGroupExampleInput" placeholder="Titulo">
    </div>
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Director a editar</label>
    <input required name="director_edit" type="text" class="form-control" id="formGroupExampleInput" placeholder="Director">
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Escritor a editar</label>
    <input required name="writer_edit" type="text" class="form-control" id="formGroupExampleInput" placeholder="Escritor">
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="formGroupExampleInput">Descripcion a editar</label>
        <input required name="description_edit" type="text" class="form-control" id="formGroupExampleInput" Placeholder="Descripcion">
    </div>
    <div class="form-group col-md-4">
        <label for="formGroupExampleInput">Fecha a editar</label>
        <input required name="emision_date_edit" type="text" class="form-control" id="formGroupExampleInput" Placeholder="Fecha de emision">
    <small class="form-text text-muted">
    Formato de fecha aaaa/mm/dd
</small>
    </div>
    <div class="form-group col-md-4">
        <label  for="formGroupExampleInput">Seleccionar temporada del capitulo a editar</label>
        <select name="season_id_edit" required id="formGroupExampleInput" class="form-control">
        <option selected>Elegir temporada</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        </select>
    </div>
</div>
    <div class="form-group col-md-6">
        <label for="formGroupExampleInput">Numero del capitulo</label>
        <input required name="chapter_number_edit" type="number" class="form-control" id="formGroupExampleInput" placeholder="numero del capitulo">
    <small class="form-text text-muted">
    Elegi el capitulo que vas a editar. Esto no puede ser editado.
</small>
    </div>
<button type="submit" class="btn btn-primary mb-2">Editar</button>
</div>
    
</form>
</div>
{include file="scripts.tpl" }