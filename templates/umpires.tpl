{include file="header.tpl"}
<!-- formulario de alta de arbitros -->
<form action="add" method="POST" class="my-4">
    <div>
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label>Arbitro</label>
                    <input name="arbitro" type="text" class="form-control">
                </div>
                </div>
                <div class="col-5">
                <div class="form-group">
                    <label>Residencia</label>
                    <input name="residencia" type="text" class="form-control">
                </div>
                </div>
                <div class="col-5">
                <div class="form-group">
                    <label>Asociacion</label>
                        <select name="id_asociacion"class="form-select" aria-label="Disabled select example">            
                           {foreach from=$asociations item=$asociation}
                              <option value="{$asociation->id_asociacion}" selected>{$asociation->asociacion}</option>
                              
                           {/foreach}
                        </select>
            </div>
        </div>
    </div>
    {if $logged}
    <button type="submit" class="btn btn-primary mt-2 mb-2">Agregar</button>
    {/if}
<!-- lista de arbitros -->
<ul class="list-group">
{foreach from=$asociations item=$asociation}   
    {foreach from=$umpires item=$umpire}
        {if $umpire->id_asociacion_fk==$asociation->id_asociacion}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span><b>{$umpire->arbitro}</b> -reside en: <b>{$umpire->residencia}</b> -pertenece a: <b>{$asociation->asociacion}</b>
             de la region: <b>{$asociation->region}</b></span>
            {if $logged}
            <div>
                <a href='show-edit-umpire/{$umpire->id}' type='button' class='btn btn-secondary'>Editar</a>
                <a href='delete/{$umpire->id}' type='button' class='btn btn-danger'>Borrar</a>
            </div>
            {/if}
        </li>
    {/if}
    {/foreach}
{/foreach}
</ul>
<p class="mt-3"><small>Mostrando todos los arbitros disponibles </small></p>
