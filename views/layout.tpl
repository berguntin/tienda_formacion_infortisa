<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/views/css/style.css"/>
    <title>{block 'title'}{/block}</title>
    </head>
    <body>
    <div class="container">
        <nav class="navbar">
            <div class="container-fluid">
                <a href="/"><i class="bi bi-house" style="font-size:xx-large"></i></a>
                <div>
                    Hola, {$smarty.session.name}
                </div>
                <div class="user-menu">
                    <a href="http://localhost/cart/view/" class="d-flex shopping-cart">
                        <i class="bi bi-cart4" id='cart' style="font-size:xx-large"></i>
                        <span id="cart-counter">
                            {if isset($smarty.session.totals.totalItems)}{$smarty.session.totals.totalItems}{/if}
                        </span>
                    </a>
                    <form  class="close-session" id="closeSession">
                        <input name="closeSession" type="hidden" value="{$smarty.session.userId}">
                        <button type="submit" class="btn btn-outline-secondary">Cerrar sesion X</button>
                    </form>
                </div>


            </div>
        </nav>
    </div>
        {block 'body'}{/block}
    </body>
    <footer>

            <span>
                💻 con ♥ por Hugo Bermúdez
            </span>


    </footer>
{literal}
    <script>
        const closeSession = document.getElementById('closeSession');

        closeSession.addEventListener('submit', (event) => {

            event.preventDefault();
            const data = new FormData(closeSession);

            fetch('http://localhost/controllers/ajax/closeSession.php',
            {
                method: 'POST',
                body: data
            }).then(response=> {
                response.json()
                location.reload()
            })
        })
    </script>
{/literal}
    </html>


