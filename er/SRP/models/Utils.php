
<?php

final class Utils
{
    private function __construct()
    {
    }

    /**
     * Fun��o utilizada para pegar um valor de um array.
     *
     * @param $arr array
     * @param $key chave de busca do valor
     *
     * @return Caso o valor referente a chave dada n�o exista ou seja vazio, este m�todo
     * retorna null, caso contr�rio retorna o valor referente a chave.
     */
    public static function getValue($arr, $key)
    {
        if (!isset($arr[$key]) || "" == trim($arr[$key]) || "/" == $arr[$key] || "NULL" == strtoupper($arr[$key]))
        {
            return NULL ;
        }
        else
        {
            return $arr[$key] ;
        }
    }

     /**
      * M�todo para gerar um array dado uma string.
      * A string ser� quebrada sempre que um caractere q n�o seja uma letra ou n�mero apare�a.
      *
      * @param $str
      *
      * @return um array com os dados da string.
      */
    public static function string2Array($str)
    {
        $array = preg_split("/\s*([^(\s|\w|\d)]|\|)([^(\w|\d)]|\|)*/", $str) ;
        if (NULL == $array || !$array)
        {
            return array() ;
        }
        else
        {
            return $array ;
        }
    }

     /**
      * M�todo para gerar uma string dado um array e um pad.
      *
      * @param $str
      * @param $pad
      *
      * @return uma string contendo todos os elementos do array separados pelo pad.
      */
    public static function array2String($array, $pad)
    {
        $keys = array_keys($array) ;

        $str = $array[$keys[0]] ;
        for ($inx = 1; $inx < count($keys); $inx++)
        {
            $value = $array[$keys[$inx]] ;

            if (""==$value || " "==$value)
            {
                continue ;
            }

            $str = $str.$pad.$value ;
        }

        return $str ;
    }

    /**
     * M�todo utilizado para gerar um array com elementos distintos de outros dois arrays.
     *
     * @param $arr1
     * @param $arr2
     *
     * @return array com elementos distintos gerado pelos outros dois.
     */
    public static function getArraysDistinctElements($arr1, $arr2)
    {
        for ($inx = 0; $inx < count($arr2); $inx++)
        {
             array_push($arr1, $arr2[$inx]) ;
        }
        $arr1 = array_unique($arr1) ;
        asort($arr1) ;

        return $arr1 ;
    }


    /**
     * M�todo utilizado para gerar um array com elementos distintos de outros dois arrays.
     * Obs: leva em conta a chave.
     *
     * @param $arr1
     * @param $arr2
     *
     * @return array com elementos distintos gerado pelos outros dois.
     */
    public static function getKArraysDistinctElements($arr1, $arr2)
    {
        $keys = array_keys($arr2) ;
        for ($inx = 0; $inx < count($keys); $inx++)
        {
            $aKey = $keys[$inx] ;
             $arr1[$aKey] = $arr2[$aKey] ;
        }
        $arr1 = array_unique($arr1) ;
        ksort($arr1) ;

        return $arr1 ;
    }
}

?>