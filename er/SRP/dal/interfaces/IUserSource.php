
<?php

/**
 * Interface que realiza o controle de acesso dos usu�rios.
 */
interface IUserSource
{
    /**
     * M�todo para recuperar uma inst�ncia da classe de usu�rio.
     *
     * @param   $login
     * @param   $password
     * @return  uma inst�ncia do usu�rio
     */
    public function getUser($login, $password) ;

    /**
     * M�todo para criar uma inst�ncia da classe usu�rio.
     *
     * @param   $login
     * @param   $password
     * @return  true se o usu�rio foi criado com sucesso, false caso contr�rio.
     */
    public function createUser($login, $password) ;

    /**
     * M�todo para checar se um login j� est� sendo utilizado por um usu�rio.
     *
     * @param   $login
     * @return  true se j� existe um usu�rio com esse login, false caso contr�rio.
     */
    public function userExists($login) ;
}

?>