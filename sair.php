 <h1>Bem-Vindo!</h1>
 
 <p>
 
 olá,<?=htmlspecialchars($_SESSION["usuario"])?>
 </p>
 
 </p>
 
 <p>você acessou uma página protegida por sessão.</p>
 
 <a href="sair.php">Sair do sistema</a>
 
 <?php

session_start();

$_SESSION = [];

session_destroy();

header("location:index.php");
exit;
?>
 
 

 
 
 
 
 </body>
 </html>
