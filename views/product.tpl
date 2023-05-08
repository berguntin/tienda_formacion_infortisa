{*Smarty*}
{extends file="layout.tpl"}
{block name='title'}{$product['Name']}{/block}
{block name='body'}

    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Vista del producto
            </div>
            <div class="card-body">
                <h5 class="card-title">{$product['Name']}</h5>
                <p class="card-text">Ejemplo de descripcion de producto</p>
                <a href="edit" class="btn btn-primary">Editar</a>
            </div>
            <div class="card-footer text-body-secondary">
                <p>Precio: {$product['Price']} €</p>
            </div>
        </div>

    </div>

{/block}