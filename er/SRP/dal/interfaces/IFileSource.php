
<?php

interface IFileSource
{
     /**
      * Método utilizado para salvar um arquivo no sistema.
      *
      * @param $uploadTagName nome como qual o arquivo está salvo no array global $_FILES do sistema
      * @param $reference referencia para recuperar o arquivo após salvo
      * @param $description descrição do que representa o arquivo
      *
      * @return true se foi salvo com sucesso, false caso contrário.
      */
    public function createFile($uploadTagName, $reference, $description) ;

     /**
      * Método utilizado apagar um arquivo do sistema.
      *
      * @param $reference referência com a qual o arquivo foi salvo
      *
      * @return true se foi salvo com sucesso, false caso contrário.
      */
    public function deleteFile($reference) ;

    public function updateFileDescription($reference, $description) ;

     /**
      * Método utilizado para sobreescrever um arquivo no sistema.
      *
      * @param $uploadTagName nome como qual o arquivo está salvo no array global $_FILES do sistema
      * @param $reference referência com a qual o arquivo foi salvo
      * @param $description descrição do que representa o arquivo
      *
      * @return true se foi salvo com sucesso, false caso contrário.
      */
    public function updateFile($uploadTagName, $reference, $description) ;

     /**
      * Método utilizado para recuperar uma instância da classe File do sistema.
      *
      * @param $reference referencia para recuperar o arquivo após salvo
      *
      * @return uma instância da classe File.
      */
    public function getFile($reference) ;
}

?>