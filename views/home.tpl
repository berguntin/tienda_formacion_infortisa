{*Smarty*}
{extends file='layout.tpl'}
{block name='head'}{/block}
{block name='title'}Vista de productos{/block}
{block name='body'}
    <div class="container">
    <nav class="navbar">
        <div class="container-fluid">
            <div>Hola, {$name}</div>
            <a href="http://localhost/cart/view/" class="d-flex shopping-cart">
                <i class="bi bi-cart4" id='cart' style="font-size:xxx-large"></i>
                <span id="cart-counter">{if isset($totalProducts)}{$totalProducts}{/if}</span>
            </a>
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
                        <td class="col"> {$product['Price']}&euro;</td>
                        <td><a href="/product/{$product['Id']}/" class="btn btn-primary">Ver detalles</a></td>
                        <td><a href="/product/{$product['Id']}/edit" class="btn btn-secondary">Editar</a></td>
                        <td>
                            <form name="deleteProduct">
                                <input type="hidden" name="productId" value="{$product['Id']}">
                                <button type='submit' class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td><form name="addToCart">
                                <input type="hidden" name="prodId" value="{$product['Id']}">
                                <button type='submit' class="btn btn-success">Comprar</button>
                            </form></td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </main>
</div>
    {literal}
    <script>
        //BORRAR ARTICULOS
        const deleteForm = document.getElementsByName('deleteProduct');
        //Iteramos sobre todos los formularios de borrado de articulos.
        deleteForm.forEach(delform => {
                delform.addEventListener('submit', (event)=>{
                    event.preventDefault();
                    const data = new FormData(delform);
                    let userValidate = confirm("Estas a punto de borrar un articulo\nEsta accion no se puede deshacer");
                    if(userValidate){
                        fetch('http://localhost/controllers/ajax/deleteProduct.php',
                            {
                                method: 'POST',
                                body: data
                            })
                            .then(response => {
                                if(response.status === 200){
                                    alert('Producto eliminado!')
                                    location.reload() //recargamos para mostrar la tabla actualizada
                                }
                                else {
                                    alert('No se ha eliminado el producto, vuelve a intentarlo')
                                }
                            })//then close
                        } //if close
                    }) //addEventListenter close
                }) //foreach close
        //AGREGAR AL CARRITO
        const addToCartForm = document.getElementsByName('addToCart');
        //Iteramos sobre los formularios de agregar a carrito
        addToCartForm.forEach(addForm => {
            addForm.addEventListener('submit', (event) => {
                event.preventDefault();
                const data = new FormData(addForm);
                fetch('http://localhost/controllers/ajax/cart.php',
                    {
                        method: 'POST',
                        body: data
                    })
                    .then(response => response.json())
                    .then(jsonData =>{
                    console.log(jsonData.lines);
                    if (jsonData.success == true){
                        const cartCounter = document.getElementById('cart-counter');
                        cartCounter.innerText= jsonData.lines;
                    }
                    else {
                        console.log('No se ha agregado')
                    }
                })
            })
        })
    </script>
    {/literal}
{/block}