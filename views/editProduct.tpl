{*Smarty*}
{extends file="layout.tpl"}
{block name="body"}
    <div class="container">
        <form id="editProductForm" class="card text center" METHOD="POST">
            <div class="card-header">
                Editar el producto
            </div>
            <div class="card-body">
                <input type="hidden" value="{product->getId}" name="productId">
                <label class="card-title" for="autoSizingInput">Descripcion</label>
                <input type="text" class="form-control" id="autoSizingInput" name="newName" value="{product->getName}" >
            </div>
            <div class="card-footer text-body-secondary">
                    <label for="price">Precio</label>
                <input type="text" id="price" name="newPrice" value="{product->getPrice}"><span>€</span>
                    <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
            </div>
            </div>
        </form>
    </div>
{literal}
    <script type="text/javascript">
        const form = document.getElementById('editProductForm')
        form.addEventListener('submit', function(event){
            event.preventDefault();
            const data = new FormData(form);
            console.log(data);
            fetch('http://localhost/controllers/ajax/saveProduct.php', {
                method: 'POST',
                body: data
            }).then(response =>{
                response.json();})

        })

    </script>

{/literal}
{/block}
