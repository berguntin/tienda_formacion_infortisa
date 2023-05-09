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
                    <td class="col">{$product['price']} &euro;</td>
                    <td class="col">{$product['price']*$product['quantity']} &euro;</td>
                    <td class="col">
                        <form name="deleteFromCart">
                            <input type="hidden" name="deleteFromCart" value="{$product['id']}">
                            <button type="submit">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            {/foreach}
        </tbody>
        <tfoot>
        <tr class="table-success">
            <td class="col">Total</td>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col">{$totalPrice} &euro;</td>
            <td class="col"><button class="btn btn-success">Pedir</button></td>
        </tr>
        </tfoot>
    </table>
    </div>
    {literal}
    <script>

        const cartDelForms = document.getElementsByName('deleteFromCart');

        cartDelForms.forEach(delForm =>{
            delForm.addEventListener('submit', (event)=>{
                event.preventDefault();
                const data = new FormData(delForm);
                fetch('http://localhost/controllers/ajax/cart.php',
                    {
                    method: 'POST',
                    body: data
                     })
                    .then(response => response.json())
                    .then(jsonData => {
                        console.log(jsonData.message);
                        location.reload();
                    })
            })
        })

    </script>
    {/literal}
{/block}