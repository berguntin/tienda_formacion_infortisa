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
                <div id="liveAlertPlaceholder"></div>
            </div>
            </div>
            </div>
        </form>
    </div>
{literal}
    <script type="text/javascript">
        const wrapper = document.createElement('div')
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const form = document.getElementById('editProductForm')


        form.addEventListener('submit', function(event){
            event.preventDefault();
            wrapper.innerHTML = '';
            const data = new FormData(form);
            console.log(data);
            fetch('http://localhost/controllers/ajax/saveProduct.php', {
                method: 'POST',
                body: data
            }).then(response =>{
                if(response.status == 200) {
                    appendAlert('Producto modificado con éxito' , 'success')
                }
                else {
                    appendAlert('No se ha modificado', 'danger')
                }
                });
        });

        const appendAlert = (message, type) => {

            wrapper.innerHTML = [
                `<div style="margin-top: 30px;" class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alertCloseBtn"></button>',
                '</div>'
            ].join('');

            alertPlaceholder.append(wrapper)
            const closeButton = document.getElementById('alertCloseBtn')
            closeButton.addEventListener('click', () => wrapper.innerHTML = '')
        }

    </script>
{/literal}
{/block}
