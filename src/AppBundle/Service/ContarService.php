<?php
/**
 * Created by PhpStorm.
 * User: korp
 * Date: 27/10/15
 * Time: 17:17
 */
namespace AppBundle\Service;

class ContarService
{
    private $op1;
    private $result;


    public function __construct()
    {
        $this->result;
    }

    /**
     * @return mixed
     */


    /**
     * @return mixed
     */
    public function getOp1()
    {
        return $this->op1;
    }

    /**
     * @param mixed $op1
     */
    public function setOp1($op1)
    {
        $this->op1 = $op1;
    }

    /**
     * @param int $result
     */
    public function getResult()
    {
        return $this->result;
    }

    public function contarAction($op1)
    {

        $string = $op1;
        $cont = 0;
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] == " " && $string[$i+1] != " ") {
                $cont++;
            }
        }
        $cont++;
        return $this->result = $cont;
    }

}