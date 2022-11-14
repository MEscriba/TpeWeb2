{include file="header.tpl"}

    
<!-- lista de arbitros por asociacion (detalle de item por categoria) -->
<h3>vista de arbitros segun la asociacion {$asociation->asociacion}</h3>

<ul class="list-group">
    {foreach from=$umpires item=$umpire}
        {foreach from=$asociations item=$asociation}
            {if $umpire->id_asociacion_fk == $asociation->id_asociacion}
                <li class='list-group-item d-flex justify-content-between align-items-center'>
                    <span> <b>{$umpire->arbitro} </b> pertenece a: {$asociation->asociacion} - region: {$asociation->region} -reside en: {$umpire->residencia}</span>
                    {if $logged}
                        <div>
                            <a href='show-edit-asociation/{$asociation->id_asociacion}' type='button' class='btn btn-secondary'>Editar</a>
                            <a href='delete-asociation/{$asociation->id_asociacion}' type='button' class='btn btn-danger'>Borrar</a>
                        </div> 
                    {/if}    
                </li>
            {/if}
        {/foreach} 
    {/foreach}     
</ul>
<p class="mt-3"><small>Mostrando arbitros disponibles de la {$asociation->asociacion} </small></p>




{include file="footer.tpl"}