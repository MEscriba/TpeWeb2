{include file="header.tpl"}
<div class="central-text">
<p class="central-text">Estos son los arbitros y equipos participantes del torneo</p>
<p class="central-text">Haga click en cada uno para ver con mas detalle </p>
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
        <p class="mt-3">Equipos</p>
        {foreach from=$teams item=$team}
            <li class='list-group-item d-flex justify-content-between align-items-center'>
                <a href='list-teams'><span> <b>{$team->equipo}</b></span></a>
            </li>
        {/foreach}
        <p class="mt-3"><small>Mostrando equipos disponibles</small></p>
    </ul>  
</div>
{include file="footer.tpl"}

