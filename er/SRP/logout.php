<!--
    Ação de logout p/ saida do sistema
-->
<?php
    session_start() ;
    if (isset($_SESSION["user"]) )
    {
        unset($_SESSION["user"]) ;
        session_destroy() ;
    }
?>

<html>
<body onload="javascript:return top.location.href ='login.php';">
</body>
</html>