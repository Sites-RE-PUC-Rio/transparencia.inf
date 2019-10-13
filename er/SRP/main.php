<?php
    require_once "models/User.php" ;

    session_start() ;
    if (isset($_GET["logout"]) )
    {
        unset($_SESSION["user"]) ;
        session_destroy() ;
    }

    if (!isset($_SESSION["user"]))
    {
        header("Location: login.php"); /* Redirect browser */
    }

    $user = $_SESSION["user"] ;
?>

<html>
    <head>
        <frameset scrolling="no" frameborder="0" rows="80, *">
            <frame noresize src="logo.html" name="logo">
            <frameset scrolling="no" frameborder="0" cols="180, *">
                <frame noresize marginWidth="3" src="menu.html" name="srp_menu"/>
                <frame noresize marginWidth="3" src="" name="srp_main" id="srp_main"/>
                <noframe>
                    <body>

                    </body>
                </noframe>
            </frameset>
        </frameset>
    </head>
</html>