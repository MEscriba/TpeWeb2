{include file="header.tpl"}

{if !empty($error)}
<h1>{$error}</h1>
{/if}

<h1>{$umpire->arbitro}</h1>
<p>Este arbitro pertenece a la asociacion  {$umpire->asociacion} y a la region {$umpire->region}</p>



{if !empty($smarty.session.USER_ID)}
    {include file="formUmpire.tpl"}
{/if}
{include file="footer.tpl"}

