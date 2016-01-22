<?php
/**
 * Created by PhpStorm.
 * User: korp
 * Date: 27/10/15
 * Time: 17:17
 */
namespace AppBundle\Service;


class CalculatorService
{
    private $op1;
    private $op2;
    private $result;

    public function __construct()
    {
        $this->result = 0;

    }

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
     * @return mixed
     */
    public function getOp2()
    {
        return $this->op2;
    }

    /**
     * @param mixed $op2
     */
    public function setOp2($op2)
    {
        $this->op2 = $op2;
    }



    public function sumAction()
    {
        $this->result = $this->op1 + $this->op2;
    }

    public function subAction()
    {
        $this->result = $this->op1 - $this->op2;
    }

    public function mulAction()
    {
        $this->result = $this->op1 * $this->op2;
    }
    public function divAction()
    {
        $this->result = $this->op1 / $this->op2;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

}