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

class ContarController extends Controller
{
    /**
     * @Route("/contar", name="count")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('contar/index.html.twig');
    }

    /**
     * @Route("/contar_form", name="app_contar_count")
     */
    public function contarAction()
    {
        return $this->render('/contar/count.html.twig');
    }

    /**
     * @Route("/do-count", name="app_contar_doCount")
     */
    public function doCountAction(request $request)
    {
        $count = $this->get('app.service.contar');
        $op1 = $request->request->get('op1');
        $count->setOp1($op1);
        $count->contarAction($op1);

        $result = $count->getResult();



        return $this->render(
            ':contar:do-count.html.twig',
            [
                'op1' => $op1,
                'result'=> $result,

                'title' => 'Contar',
            ]
        );
    }
}