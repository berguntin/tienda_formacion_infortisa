{*Smarty*}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/views/css/style.css"/>
    <title>Login</title>
    <div class="container" style="justify-content: center;align-content: center;margin-top: 10%;">
        <div class="login-box">
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
