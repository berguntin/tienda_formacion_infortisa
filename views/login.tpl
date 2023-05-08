{*Smarty*}
{extends file="layout.tpl"}
{block name='title'}Login{/block}
{block name='body'}
    <div class="container container-fluid justify-content-center">
        <h3>Acceso a usuarios</h3>
        <form id="login" method="POST" action="login.php">
            <div class="mb-3">
                <label for="mail" class="form-label">Usuario:</label>
                <input class="form-control" type="email" id="mail" name="mail" required>
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Contraseña:</label>
                <input class="form-control" type="password" id="password" name="password" required>
                <div class="form-text">
                    <span id="errorText" class="text-danger form-label"></span>
                </div>
            </div>

                <button name="submit" class="btn btn-primary">Enviar</button>

        </form>
    </div>

{literal}
<script type="text/javascript">

   const loginForm = document.getElementById('login');

    loginForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const data = new FormData(loginForm);
        fetch('http://localhost/controllers/ajax/login.php', {
            method: 'POST',
            body: data
        }).then(response => {
            if(response.status == 401){
                const errorText = document.getElementById('errorText');
                errorText.innerText = 'Credenciales incorrectas';
            }
            if (response.status == 200){
                location.reload() // recarga de la pagina para cargar la url solicitada inicialmente-> Mejor UX
            }
        })
    })
</script>
{/literal}
{/block}