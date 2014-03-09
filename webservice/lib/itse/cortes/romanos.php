<?php

/*
  Script Name: Numeros a Romanos Class
  Script URI: http://www.mis-algoritmos.com/2007/10/10/convertir-numeros-a-romanos/
  Description: Permite la conversión entre números Romanos y Arábigos.
  Script Version: 1
  Author: Victor De la Rocha
  Author URI: http://www.mis-algoritmos.com
 */

class romanos
{

    var $arabigo;

    /*
     * Constructor: A partir del valor, lo convierte a su valor contrario.
     * Romano a Arabigo
     * Arabigo a Romano
     */

    function romanos($valor)
    {
        if (is_numeric($valor))
            $this->arabigo = intval($valor);
        else
            $this->arabigo = $this->romano2arabigo($valor);
    }

    /*
     * Convierte de Romano a Arabigo, retorna un entero.
     */

    function romano2arabigo($valor)
    {
        $valromano = array('I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000);
        $resultado = 0;
        for ($i = 0; $i < strlen($valor) - 1; $i++)
        {
            $letra1 = substr($valor, $i, 1);
            $letra2 = substr($valor, $i + 1, 1);

            if ($valromano[$letra1] >= $valromano[$letra2])
                $resultado+=$valromano[$letra1];
            else
                $resultado-=$valromano[$letra1];
        }
        $letra1 = substr($valor, strlen($valor) - 1, 1);
        $resultado+=$valromano[$letra1];
        return $resultado;
    }

    /*
     * Convierte de Arabigo a Romano, retorna una cadena.
     */

    function arabigo2romano($valor)
    {
        $romanos   = array('M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I');
        $valores   = array(1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1);
        $resultado = '';
        for ($i = 0; $i < count($romanos); $i++)
            while ($valor >= $valores[$i])
            {
                $resultado.=$romanos[$i];
                $valor-=$valores[$i];
            }
        return $resultado;
    }

    /*
     * Retorna el valor decimal.
     */

    function getArabigo()
    {
        return $this->arabigo;
    }

    /*
     * Retorna el valor en Romano.
     */

    function getRomano()
    {
        return $this->arabigo2romano($this->arabigo);
    }

}

?>