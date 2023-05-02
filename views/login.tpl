{*Smarty*}
{extends file="layout.tpl"}
{block name='title'}Login{/block}
{block name='body'}
    <div class="container container-fluid justify-content-center">
        <h3>Acceso a usuarios</h3>
        <form id="login" action="login.php" method="POST">
            <div class="mb-3">
                <label for="mail" class="form-label">Usuario:</label>
                <input class="form-control" type="email" id="mail" name="mail" required>
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Contraseña:</label>
                <input class="form-control" type="password" id="password" name="password" required>
                <div class="form-text">
                    <span class="text-danger form-label">{$error}</span>
                </div>
            </div>

                <button name="submit" class="btn btn-primary">Enviar</button>

        </form>
    </div>

{literal}
<script type="text/javascript">

   /* const loginForm = document.getElementById('login');

    loginForm.addEventListener('submit', (event) =>{
        event.preventDefault();
        const xhr = new XMLHttpRequest();
        xhr.open("POST", '/controllers/ajax/login.php');
        xhr.responseType = 'text';
        xhr.onload = () => {
            console.log(xhr.responseText);
        }
        xhr.send()
    });*/
</script>
{/literal}
{/block}