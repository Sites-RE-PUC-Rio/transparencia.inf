
<?php

require_once "dal/mysql/Database.php" ;
require_once "dal/interfaces/IFileSource.php" ;
require_once "models/File.php" ;

/**
 * Classe realiza manutenção dos arquivos utilizados no sistema SRP
 */
class FileSource implements IFileSource
{
    // path where the files are to be found
    private static $_PATH = "uploaded_files/" ;

     /**
      * Método para criar o arquivo fisico, que faz referencia ao arquivo logico.
      *
      * @param $uploadTagName
      * @param $reference
      * @param $description
      * @return retorna true se tiver criado com sucesso e falso caso contrario
      */
    public function createFile($uploadTagName, $reference, $description)
    {
        $file = FileSource::savePhysicalFile($uploadTagName, $reference, $description) ;
        if (NULL ==$file)
        {
            return false ;
        }

        // Salva as informações lógicas do arquivo na base de dados.
        if ( ! $this->createLogicalFile($file) )
        {
            unlink($file->getPath()) ;
        }

        return true ;
    }

     /**
      * Método para excluir o arquivo fisico.
      *
      * @param $reference
      * @return retorna true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteFile($reference)
    {
        if ( $this->deleteLogicalFile($reference) )
        {
            unlink(FileSource::getPath($reference)) ;
            return true ;
        }
        else
        {
            return false ;
        }
    }

    public function updateFileDescription($reference, $description)
    {
        $file = $this->getFile($reference) ;
        $file->setDescription($description) ;

        return $this->updateLogicalFile($file) ;
    }

     /**
      * Método para alterar o arquivo fisico.
      *
      * @param $uploadTagName
      * @param $reference
      * @param $description
      * @return retorna true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateFile($uploadTagName, $reference, $description)
    {
        $file = FileSource::savePhysicalFile($uploadTagName, $reference, $description) ;
        if (NULL ==$file)
        {
            return false ;
        }

        // Altera as informações lógicas do arquivo na base de dados.
        if ( ! $this->updateLogicalFile($file) )
        {
            return false ;
        }

        return true ;
    }

     /**
      * Método para recuperar uma instancia da classe arquivo.
      *
      * @param $reference
      * @return retorna a instancia do arquivo
      */
    public function getFile($reference)
    {
        return $this->getLogicalFile($reference) ;
    }

     /**
      * Método para criar uma instancia da classe arquivo.
      *
      * @param $uploadTagName
      * @param $reference
      * @param $description
      * @return retorna true se tiver alterado com sucesso e falso caso contrario
      */
    private function createLogicalFile($file)
    {
        $conn = false ;

        $wasCreated = false ;

        if (NULL == $file)
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasCreated = mysql_query("INSERT INTO Files(reference, name, mime, size, description) VALUES('".mysql_escape_string($file->getReference())."', '".mysql_escape_string($file->getName())."', '".mysql_escape_string($file->getMime())."', '".$file->getSize()."', '".mysql_escape_string($file->getDescription())."')", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasCreated ;
    }

    private function deleteLogicalFile($reference)
    {
        $conn = false ;

        $wasDeleted = false ;

        if (NULL == $reference)
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasDeleted = mysql_query("DELETE FROM Files WHERE reference='".mysql_escape_string($reference)."'", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }

    private function updateLogicalFile($file)
    {
        $conn = false ;

        $wasUpdated = false ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasUpdated = mysql_query("UPDATE Files SET name='".mysql_escape_string($file->getName())."', mime='".mysql_escape_string($file->getMime())."', size=".$file->getSize().", description='".mysql_escape_string($file->getDescription())."' WHERE reference='".mysql_escape_string($file->getReference())."'", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

    private function getLogicalFile($reference)
    {
        $conn = false ;
        $data = false ;

        $file = NULL  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT reference, name, mime, size, description FROM Files WHERE reference='".mysql_escape_string($reference)."'", $conn) ;
	        if (!$data)
	            return false ;

	        $row = mysql_fetch_array($data) ;
            if ($row)
            {
                $reference = $row["reference"] ;
                $file_path = FileSource::getPath($reference) ;
                $name = $row["name"] ;
                $mime = $row["mime"] ;
                $size = $row["size"] ;
                $description = $row["description"] ;

                $file = new File($reference, $file_path, $name, $mime, $size, $description) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $file ;
    }

    private static function savePhysicalFile($uploadTagName, $reference, $description)
    {
        // O código de erro associado a este upload de arquivo.
        $error = $_FILES[$uploadTagName]['error'] ;

        // Se ocorreu algum erro durante o upload do arquivo a função irá retornar false.
        if (0 != $error)
        {
            return NULL ;
        }

        // O nome original do arquivo no computador do usuário.
        $name = basename($_FILES[$uploadTagName]['name']) ;
        // O tipo mime do arquivo, se o browser deu esta informação. Um exemplo pode ser "image/gif".
        $mime = $_FILES[$uploadTagName]['type'] ;
        // O tamanho, em bytes, do arquivo.
        $size = $_FILES[$uploadTagName]['size'] ;
        // O nome temporário do arquivo, como foi guardado no servidor.
        $tmp_name = $_FILES[$uploadTagName]['tmp_name'] ;

        // Caminho e nome com o qual o arquivo será efetivamente gravado no servidor.
        $file_path = FileSource::getPath($reference) ;
        // Salva o arquivo físico no servidor. Caso não consigo, a função irá retornar false.
        if ( ! move_uploaded_file($tmp_name, $file_path) )
        {
            return NULL ;
        }

        return new File($reference, $file_path, $name, $mime, $size, $description) ;
    }

    private static function getPath($reference)
    {
        return FileSource::$_PATH . $reference ;
    }
}

?>