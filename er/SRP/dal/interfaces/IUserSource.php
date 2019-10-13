
<?php

/**
 * Interface que realiza o controle de acesso dos usuários.
 */
interface IUserSource
{
    /**
     * Método para recuperar uma instância da classe de usuário.
     *
     * @param   $login
     * @param   $password
     * @return  uma instância do usuário
     */
    public function getUser($login, $password) ;

    /**
     * Método para criar uma instância da classe usuário.
     *
     * @param   $login
     * @param   $password
     * @return  true se o usuário foi criado com sucesso, false caso contrário.
     */
    public function createUser($login, $password) ;

    /**
     * Método para checar se um login já está sendo utilizado por um usuário.
     *
     * @param   $login
     * @return  true se já existe um usuário com esse login, false caso contrário.
     */
    public function userExists($login) ;
}

?>