
<?php

interface IFileSource
{
     /**
      * M�todo utilizado para salvar um arquivo no sistema.
      *
      * @param $uploadTagName nome como qual o arquivo est� salvo no array global $_FILES do sistema
      * @param $reference referencia para recuperar o arquivo ap�s salvo
      * @param $description descri��o do que representa o arquivo
      *
      * @return true se foi salvo com sucesso, false caso contr�rio.
      */
    public function createFile($uploadTagName, $reference, $description) ;

     /**
      * M�todo utilizado apagar um arquivo do sistema.
      *
      * @param $reference refer�ncia com a qual o arquivo foi salvo
      *
      * @return true se foi salvo com sucesso, false caso contr�rio.
      */
    public function deleteFile($reference) ;

    public function updateFileDescription($reference, $description) ;

     /**
      * M�todo utilizado para sobreescrever um arquivo no sistema.
      *
      * @param $uploadTagName nome como qual o arquivo est� salvo no array global $_FILES do sistema
      * @param $reference refer�ncia com a qual o arquivo foi salvo
      * @param $description descri��o do que representa o arquivo
      *
      * @return true se foi salvo com sucesso, false caso contr�rio.
      */
    public function updateFile($uploadTagName, $reference, $description) ;

     /**
      * M�todo utilizado para recuperar uma inst�ncia da classe File do sistema.
      *
      * @param $reference referencia para recuperar o arquivo ap�s salvo
      *
      * @return uma inst�ncia da classe File.
      */
    public function getFile($reference) ;
}

?>