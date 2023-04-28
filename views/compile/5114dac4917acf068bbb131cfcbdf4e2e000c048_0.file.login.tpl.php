<?php
/* Smarty version 4.3.1, created on 2023-04-28 10:00:49
  from '/home/infortisadmin/Documents/tienda/views/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_644b7d3171c0f8_85908617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5114dac4917acf068bbb131cfcbdf4e2e000c048' => 
    array (
      0 => '/home/infortisadmin/Documents/tienda/views/login.tpl',
      1 => 1682668671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_644b7d3171c0f8_85908617 (Smarty_Internal_Template $_smarty_tpl) {
?>

<header><h1>Login</h1></header>

    <form id="login" action="login.php" method="POST">
        <h3>Acceso a usuarios</h3>
        <label for="mail">Usuario:</label>
        <input type="email" id="mail" name="mail" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <span class="error-sm"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span>
        <button name="submit">Enviar</button>
    </form>


<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>
<?php }
}
