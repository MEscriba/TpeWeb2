{include file="header.tpl"}

<form action='edit-asociation/{$id}'method="POST">
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
   
    <button type="submit" class="btn btn-primary mb-5">Editar Asociacion</button>
    </form>
  
    {include file="footer.tpl"}