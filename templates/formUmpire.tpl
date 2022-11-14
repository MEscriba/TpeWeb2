{include file="header.tpl"}

<form action='edit-umpire/{$id}'method="POST">
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
                              <option value="{$asociation->id_asociacion}"selected>{$asociation->asociacion}</option>
                           {/foreach}
                        </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2 mb-2">Editar</button>
</form>
<ul class="list-group">
    
        <li class='list-group-item d-flex justify-content-between align-items-center'>
           <span> <b>Arbitro a editar:</b> {$umpire->arbitro} -  <b>Reside en:</b> {$umpire->residencia} - <b>Pertenece a la asociacion:</b> {$asociation->asociacion}</span>
        </li>       
</ul>   
   
{include file="footer.tpl"}


           