{include file="header.tpl"}

<form method="POST" action="validate">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">Ingrese su usuario (email) para poder editar equipos o arbitros.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  {if $error} 
    <div class="alert alert-danger mt-3">
        {$error}
    </div>
  {/if}

  <button type="submit" class="btn btn-primary">Enviar</button>
</form>


{include file="footer.tpl"}
