
<?php

 /**
  * Essa classe representa os arquivos associados a processos.
  */
class File
{
    // path where the files are to be found
    public static $PATH = "uploaded_files/" ;

    // Fields
    private $_reference = NULL ;
    private $_name = NULL ;
    private $_mime = NULL ;
    private $_size = NULL ;
    private $_description = NULL ;
    private $_path = NULL ;

    function __construct($reference, $path, $name, $mime, $size, $description)
    {
        $this->_reference = $reference ;
        $this->_path = $path ;
        $this->_name = $name ;
        $this->_mime = $mime ;
        $this->_size = $size ;
        $this->_description = $description ;
    }

     /**
      * Método para recuperar a referência que linca o arquivo físico (nome do mesmo) ao lógico na fonte de dados.
      *
      * @return retorna o nome de referencia do arquivo
      */
    public function getReference()
    {
        return $this->_reference ;
    }

     /**
      * Método para recuperar o caminho onde o arquivo se encontra.
      *
      * @return retorna o caminho onde o arquivo se encontra
      */
    public function getPath()
    {
        return $this->_path ;
    }

     /**
      * Método para recuperar o nome lógico do arquivo.
      * Este é o nome do arquivo que foi passado por um usuário ao sistema.
      *
      * @return retorna o nome do arquivo
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * Método para recuperar o "tipo" do arquivo.
      *
      * @return retorna o "tipo" do arquivo
      */
    public function getMime()
    {
        return $this->_mime ;
    }
      /**
      * Método para recuperar o tamanho do arquivo.
      *
      * @return retorna o tamanho do arquivo
      */
    public function getSize()
    {
        return $this->_size ;
    }

      /**
      * Método para recuperar a descrição do arquivo.
      *
      * @return retorna a descrição do arquivo
      */
    public function getDescription()
    {
        return $this->_description ;
    }

      /**
      * Método para recuperar a descrição do arquivo.
      *
      * @return retorna a descrição do arquivo
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

      /**
      * Método para fazer download do arquivo.
      *
      * @param $file
      */
    public static function outputFile($file)
    {
        $name = $file->getName() ;
        $path = $file->getPath() ;

        //do something on download abort/finish
        //register_shutdown_function( 'function_name'  );
        if(!file_exists($path))
            die('file not exist!');

        $size = filesize($path);
        $name = rawurldecode($name);

        if (ereg('Opera(/| )([0-9].[0-9]{1,2})', $_SERVER['HTTP_USER_AGENT']))
            $UserBrowser = "Opera";
        elseif (ereg('MSIE ([0-9].[0-9]{1,2})', $_SERVER['HTTP_USER_AGENT']))
            $UserBrowser = "IE";
        else
            $UserBrowser = '';

        // important for download im most browser
        $mime_type = ($UserBrowser == 'IE' || $UserBrowser == 'Opera') ? 'application/octetstream' : 'application/octet-stream';
        @ob_end_clean(); /// decrease cpu usage extreme
        header('Content-Type: ' . $mime_type);
        header('Content-Disposition: attachment; filename="'.$name.'"');
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header('Accept-Ranges: bytes');
        header("Cache-control: private");
        header('Pragma: private');

        //  multipart-download and resume-download
        if(isset($_SERVER['HTTP_RANGE']))
        {
            list($a, $range) = explode("=",$_SERVER['HTTP_RANGE']);
            str_replace($range, "-", $range);
            $size2 = $size-1;
            $new_length = $size-$range;
            header("HTTP/1.1 206 Partial Content");
            header("Content-Length: $new_length");
            header("Content-Range: bytes $range$size2/$size");
        }
        else
        {
            $size2=$size-1;
            header("Content-Length: ".$size);
        }
        $chunksize = 1*(1024*1024);
        $bytes_send = 0;
        if ($path = fopen($path, 'r'))
        {
            if(isset($_SERVER['HTTP_RANGE']))
                fseek($path, $range);
            while(!feof($path) and (connection_status()==0))
            {
                $buffer = fread($path, $chunksize);
                print($buffer);//echo($buffer); // is also possible
                flush();
                $bytes_send += strlen($buffer);
                //sleep(1);//// decrease download speed
            }
            fclose($path);
        }
        else
            die('error can not open file');
        if(isset($new_length))
            $size = $new_length;
        die();
    }

     /**
      * Método para tranformar para string os atributos do arquivo.
      *
      * @return retorna o texto com os atributos do arquivo
      */
    public function __toString()
    {
        return "File: {reference:".$this->_reference.", path:".$this->getPath().", name:".$this->_name.", mime:".$this->_mime.", size:".$this->_size."}" ;
    }
}

?>