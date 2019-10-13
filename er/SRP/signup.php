<!--
    Ação para criar um novo usuário para o sistema
-->
<?php
    require_once "dal/dao/DAOUser.php" ;

    session_start() ;
    if ( isset($_POST["submit"]) )
    {
        $login = $_POST["login"] ;
        $password = $_POST["password"] ;

        $created = DAOUser::createUser($login, $password) ;
        if ($created)
        {
            $_SESSION["user"] = DAOUser::getUser($login, $password) ;
        }
    }
    if (isset($_SESSION["user"]))
    {
        header("Location: main.php") ;
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Sistema de Reutiliza&ccedil;&atilde;o de Processos</title>
    <link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <br/>
    <br/>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr class="azul14">
            <td><div align="center"><strong>Sistema de Reutiliza&ccedil;&atilde;o de Processos</strong> </div></td>
          </tr>
          <tr>
            <td><br/><br/></td>
          </tr>
          <tr>
            <td><div align="center">
              <?php
                if ( isset($_REQUEST["submit"]) )
                {
                ?>
                      <table width="250" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#F7CACB" class="redtableborder">
                        <tr align="center" class="vermelho10">
                          <td>Esse login já está sendo utilizado.<br/>Por favor, escolhao outro.</td>
                        </tr>
                      </table>
                <?php
                }
                else
                {
                    echo '<br/>' ;
                }
              ?>
              <br/>
              <table width="250" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#F7FAFB" class="tableborder">
                <tr class="cinza12">
                  <td width="80">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td width="160">&nbsp;</td>
                </tr>
                <tr class="cinza12">
                  <td><div align="right"><strong>Login</strong></div></td>
                  <td>&nbsp;</td>
                  <td align="left"><div align="left">
                    <input name="login" type="text" class="input" size="16" />
                  </div></td>
                </tr>
                <tr class="cinza12">
                  <td><div align="right"><strong>Senha</strong></div></td>
                  <td>&nbsp;</td>
                  <td align="left"><div align="left">
                    <input name="password" type="password" class="input" size="16" />
                  </div></td>
                </tr>
                <tr class="cinza10">
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><div align="left">
                    <input name="submit" type="submit" class="submit" value="Cadastrar" />
                  </div></td>
                </tr>
                <tr class="cinza9">
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
    </form>
</body>
</html>
