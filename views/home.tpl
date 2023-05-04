{*Smarty*}
{extends file='layout.tpl'}
{block name='title'}Vista de productos{/block}
{block name='body'}
    <div class="container">
    <nav class="navbar">
        <div class="container-fluid">
            <div>Hola, {$name}</div>
            <div class="d-flex shopping-cart"><i class="bi bi-cart4" style="font-size:xxx-large"></i><div><span class="cart-counter"></span></div></div>
        </div>
    </nav>
        <main>
            <table class="table">
                <thead>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                {foreach from=$products item=product}
                    <tr>
                        <td class="col"> {$product['Name']}</td>
                        <td class="col"> {$product['Price']}€</td>
                        <td><a href="/product/{$product['Id']}/" class="btn btn-primary">Ver detalles</a></td>
                        <td><a href="/product/{$product['Id']}/edit" class="btn btn-secondary">Editar</a></td>
                        <td><button class="btn btn-danger">Eliminar</button></td>
                        <td><button class="btn btn-success">Comprar</button></td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </main>
</div>
{/block}