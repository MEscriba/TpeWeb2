{include file="header.tpl"}

<!-- formulario de alta de equipos -->
<form action="add-asociation" method="POST" class="my-4">
    <div class="row">
        
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
     <!--    este divisor para cuando agregue imagen
        <div class="col-3">
            <div class="form-group">
                <label>Logo Asociacion</label>  
                <input name="image" type="file" class="form-control">
            </div>
        </div>  
    -->
    </div>
   {if $logged}
    <button type="submit" class="btn btn-primary mt-2">Agregar</button>
   {/if}
</form>
<!-- lista de equipos -->

<ul class="list-group">
    {foreach from=$asociations item=$asociation}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span> {$asociation->asociacion} - {$asociation->region} </span>
            <div>
                <a href="show/{$asociation->id_asociacion}"type='button' class='btn btn-success'>ver arbitros disponibles</a>
                {if $logged}
                <a href='show-edit-asociation/{$asociation->id_asociacion}' type='button' class='btn btn-secondary'>Editar</a>
                <a href='delete-asociation/{$asociation->id_asociacion}' type='button' class='btn btn-danger'>Borrar</a>
                {/if}
            </div> 
        </li>
    {/foreach}     
</ul>
<p class="mt-3"><small>Mostrando asociaciones disponibles </small></p>


{include file="footer.tpl"}