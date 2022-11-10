{include file="header.tpl"}

<!-- formulario de alta de equipos -->
<form action="add-team" method="POST" class="my-4">
    <div class="row">
        <div class="col-5">
            <div class="form-group">
                <label>Equipo</label>
                <input name="equipo" type="text" class="form-control">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Asociacion</label>
                <input name="asociacion" type="text" class="form-control">  
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Region</label>  
                <input name="region" type="text" class="form-control">
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-2">Agregar</button>

</form>
<!-- lista de equipos -->

<ul class="list-group">
    {foreach from=$teams item=$team}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span> <b>{$team->equipo}</b> - {$team->asociacion} - {$team->region} </span>
            <div>
                <a href='show-umpires-by-asoc/{$team->id}' type='button' class='btn btn-secondary'>ver</a>
                <a href='show-edit-team/{$team->id}' type='button' class='btn btn-secondary'>Editar</a>
                <a href='delete-team/{$team->id}' type='button' class='btn btn-danger'>Borrar</a>
            </div> 
        </li>
    {/foreach}     
</ul>

<p class="mt-3"><small>Mostrando equipos disponibles - si no puede verlos debe loguearse</small></p>

{include file="footer.tpl"}