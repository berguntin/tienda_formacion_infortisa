{*Smarty*}
{extends file='layout.tpl'}
{block name=title}Vista de productos{/block}
{block name=body}
<div class="">
    <div>Hola, {$name}</div>
    <div class="shopping-cart"><i class="bi bi-cart4"></i><div></div></div>
</div>

<div>
    {foreach from=$products item=product}
        <div>{$product['Name']}</div>
    {/foreach}
</div>
{/block}