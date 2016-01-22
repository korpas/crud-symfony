<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/11/15
 * Time: 15:23
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StringController extends Controller
{
    /**
     * @Route("/cadena", name="string")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('string/index.html.twig');
    }

    /**
     * @Route("/cadena_form", name="app_string_cadena")
     */
    public function cadenaAction()
    {
        return $this->render('/string/cadena.html.twig');
    }

    /**
     * @Route("/do-cadena", name="app_string_doCadena")
     */
    public function doCadenaAction(request $request)
    {
        $string = $this->get('app.service.string');
        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');
        $string->setOp1($op1);
        $string->setOp2($op2);
        $string->cadenaAction();

        $result = $string->getResult();



        return $this->render(
            ':string:do-cadena.html.twig',
            [
                'op1' => $op1,
                'op2' => $op2,
                'result'=> $result,

                'title' => 'Cadenas',
            ]
        );
    }
    /**
     * @Route("/invertircadena_form", name="app_string_invertirCadena")
     */
    public function invertirCadenaAction()
    {
        return $this->render('/string/invertircadena.html.twig');
    }

    /**
     * @Route("/do-invertircadena", name="app_string_doInvertirCadena")
     */
    public function doInvertirCadenaAction(request $request)
    {
        $string = $this->get('app.service.string');
        $op1 = $request->request->get('op1');
        $string->setOp1($op1);
        $string->invertirCadenaAction($op1);

        $result = $string->getResult();


        return $this->render(
            ':string:do-invertircadena.html.twig',
            [
                'op1' => $op1,
                'result'=> $result,
                'title' => 'Invertir Cadenas',
            ]
        );
    }
}