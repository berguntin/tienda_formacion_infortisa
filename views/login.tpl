{*Smarty*}
{extends file="layout.tpl"}
{block name=title}Login{/block}
{block name=body}
<header><h1>Login</h1></header>

    <form id="login" action="login.php" method="POST">
        <h3>Acceso a usuarios</h3>
        <label for="mail">Usuario:</label>
        <input type="email" id="mail" name="mail" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <span class="error">{$error}</span>
        <button name="submit">Enviar</button>
    </form>

{literal}
<script type="text/javascript">
   /* const sendRequest = (method, url) => {
        const promise = new Promise((resolve, reject)=> {
            const xhr = new XMLHttpRequest();
            xhr.open(method, url);
            xhr.responseType = 'json';
            xhr.onload = () => {
                resolve(xhr.response);
            }
            xhr.send()
        })
        return promise;
    }
    const loginForm = document.getElementById('login');

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