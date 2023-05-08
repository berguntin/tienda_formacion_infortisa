{*Smarty*}
{extends 'layout.tpl'}
{block name='body'}
    <div class="container">
    <table class="table">
        <thead>
        <th scope="col">Descripcion</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio unitario</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </thead>
        <tbody>
            {foreach $products as $product}
                <tr>
                    <td class="col">{$product['name']} </td>
                    <td class="col">{$product['quantity']}</td>
                    <td class="col">{$product['price']}&euro;</td>
                    <td class="col">Eliminar</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    </div>
{/block}