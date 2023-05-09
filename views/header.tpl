{*Smarty*}
{extends 'layout.tpl'}
{block name='header'}
    <nav class="navbar">
        <div class="container-fluid">
            <div>Hola, {$name}</div>
            <a href="http://localhost/cart/view/" class="d-flex shopping-cart">
                <i class="bi bi-cart4" id='cart' style="font-size:xxx-large"></i>
                <span id="cart-counter">{if isset($totalProducts)}{$totalProducts}{/if}</span>
            </a>
        </div>
    </nav>
{/block}
