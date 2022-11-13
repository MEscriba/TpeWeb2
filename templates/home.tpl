{include file="header.tpl"}
<div class="central-text">
<p class="central-text mt-5">Estos son los arbitros y asociaciones disponibles</p>

</div>
<!-- lista de arbitros -->
<div class="list-total">
    <ul class="list-group">
        <p class="mt-3">Arbitros</p>
               
        {foreach from=$umpires item=$umpire}
            <li class='list-group-item d-flex justify-content-between align-items-center'>
            <a href='list-umpires'><span> <b>{$umpire->arbitro}</b></span></a>    
            </li>
        {/foreach}
        <p class="mt-3"><small>Mostrando arbitros disponibles</small></p>
    </ul>
    
    <!-- lista de equipos -->
    <ul class="list-group">
        <p class="mt-3">Asociaciones</p>
        {foreach from=$asociations item=$asociation}
            <li class='list-group-item d-flex justify-content-between align-items-center'>
                <a href='list-asociations'><span> <b>{$asociation->asociacion}</b></span></a>
            </li>
        {/foreach}
        <p class="mt-3"><small>Mostrando todas las asociaciones</small></p>
    </ul>  
</div>
{include file="footer.tpl"}

