<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CalculatorController extends Controller
{
    /**
     * @Route("/calculadora", name="calc")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('calculator/index.html.twig');
    }

    /**
     * @Route("/sum", name="app_calculator_sum")
     */
    public function sumAction()
    {
        return $this->render('/calculator/sum.html.twig');
    }

    /**
     * @Route("/do-sum", name="app_calculator_doSum")
     */
    public function doSumAction(Request $request)
    {
        $calculator = $this->get('app.service.calculator');
        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');
        $calculator->setOp1($op1);
        $calculator->setOp2($op2);
        $calculator->sumAction();
        $result = $calculator->getResult();

        return $this->render(
            ':calculator:do-sum.html.twig',
            [
                'op1'       => $op1,
                'op2'       => $op2,
                'result'    => $result,
                'title'     => 'sum Resultado',
            ]
    );
    }


    /**
     * @Route("/sub", name="app_calculator_sub")
     */

    public function subAction()
    {


        return $this->render('/calculator/sub.html.twig');
    }
    /**
     * @Route("/do-sub", name="app_calculator_doSub")
     */
    public function doSubAction(Request $request)
    {
        $calculator = $this->get('app.service.calculator');
        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');
        $calculator->setOp1($op1);
        $calculator->setOp2($op2);
        $calculator->subAction();
        $result = $calculator->getResult();

        return $this->render(
            ':calculator:do-sub.html.twig',
            [
                'op1'       => $op1,
                'op2'       => $op2,
                'result'    => $result,
                'title'     => 'sub Resultado',
            ]
        );

    }

    /**
     * @Route("/mul", name="app_calculator_mul")
     */
    public function mulAction()
    {

        return $this->render('/calculator/mul.html.twig');

    }
    /**
     * @Route("/do-mul", name="app_calculator_doMul")
     */
    public function doMulAction(Request $request)
    {
        $calculator = $this->get('app.service.calculator');
        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');
        $calculator->setOp1($op1);
        $calculator->setOp2($op2);
        $calculator->mulAction();
        $result = $calculator->getResult();

        return $this->render(
            ':calculator:do-mul.html.twig',
            [
                'op1'       => $op1,
                'op2'       => $op2,
                'result'    => $result,
                'title'     => 'mul Resultado',
            ]
        );

    }
    /**
     * @Route("/div", name="app_calculator_div")
     */
    public function divAction()
    {

        return $this->render('/calculator/div.html.twig');
    }
    /**
     * @Route("/do-div", name="app_calculator_doDiv")
     */
    public function doDivAction(Request $request)
    {
        $calculator = $this->get('app.service.calculator');
        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');
        $calculator->setOp1($op1);
        $calculator->setOp2($op2);
        $calculator->divAction();
        $result = $calculator->getResult();

        return $this->render(
            ':calculator:do-div.html.twig',
            [
                'op1'       => $op1,
                'op2'       => $op2,
                'result'    => $result,
                'title'     => 'div Resultado',
            ]
        );
    }

}

