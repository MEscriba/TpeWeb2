{include file="header.tpl"}

<form action='edit-asociation/{$id}'method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="col">
  
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Asociacion</label>
            <input name="asociacion" type="text" class="form-control" id="exampleInputPassword1" value="">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Region</label>
            <input name="region" class="form-control" id="exampleFormControlTextarea1" rows="3" value=""></input>
        </div>
    </div>
    <div class="col-3">
            <div class="form-group">
                <label>Logo Asociacion</label>  
                <input name="image" type="file" class="form-control">
            </div>
        </div>  
   
    <button type="submit" class="btn btn-primary mb-5">Editar Asociacion</button>
    </form>
  

 <ul class="list-group">
    
        <li class='list-group-item d-flex justify-content-between align-items-center'>
           <span> <b>Asociacion a editar:</b> {$asociation->asociacion} -  <b>Pertenece a la region:</b> {$asociation->region} </span>
        </li>       
</ul>   

  {include file="footer.tpl"}