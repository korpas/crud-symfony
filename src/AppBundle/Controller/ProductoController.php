<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27/11/15
 * Time: 12:45
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ProductoController extends  Controller
{
    /**
     * @Route("/producto_index", name="producto")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('/producto/index.html.twig');
    }

    /**
     * @Route("/producto_mostrar", name="mospod")
     */
    public function mostrarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $productos = $em->getRepository('AppBundle:Producto')->findAll();
        return $this->render(
            ':producto:mostrar.html.twig',
            [
                'productos' => $productos,
            ]
        );
    }

    /**
     * @Route("/producto_insert", name="app_producto_insert")
     */
    public function insertAction()
    {
        return $this->render('/producto/insert.html.twig');
    }

    /**
     * @Route("/producto_do-insert", name="app_producto_doInsert")
     */

    public function doInsertAction(Request $request)
    {
        $producto = $this->get('app.entity.producto');
        $nombre = $request->request->get('nombre');
        $precio = $request->request->get('precio');
        $descripcion = $request->request->get('descripcion');
        $disponibilidad = $request->request->get('disponibilidad');
        if ($nombre != null && $precio != null && $descripcion != null && $disponibilidad != null) {
            $producto->setNombre($nombre);
            $producto->setPrecio($precio);
            $producto->setDescripcion($descripcion);
            $producto->setDisponibilidad($disponibilidad);
            $producto->setCreatedAt(new \Datetime("now"));
            $producto->setUpdatedAt(new \Datetime("now"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();
            return $this->render(
                ':producto:do-insert.html.twig',
                [
                    'producto' => $nombre,
                    'title' => 'Producto añadido',
                ]
            );
        }

    }

    /**
     * @Route("/producto_do-delete", name="app_producto_doDelete")
     */

    public function doDeleteAction(Request $request)
    {
        $id = $_GET['id'];
        $repository = $this->getDoctrine()->getRepository('AppBundle:Producto');
        $em = $this->getDoctrine()->getManager();
        $producto = $repository->find($id);
        if (!$id){
            throw $this->createNotFoundException('Producto con este nombre no encontrado');
        }
        $em->remove($producto);
        $em->flush();
        return $this->render(
            ':producto:do-delete.html.twig',
            [

                'title' => 'Producto eliminado',
            ]
        );

    }

    /**
     * @Route("/producto_update", name="app_producto_update")
     */
    public function updateAction()
    {
        return $this->render('/producto/update.html.twig');
    }

    /**
     * @Route("/producto_do-update", name="app_producto_doUpdate")
     */
    public function doUpdateAction(Request $request)
    {
        $id = $request->get('id');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Producto');
        $em = $this->getDoctrine()->getManager();
        $producto = $repository->find($id);
        if (!$producto){
            throw $this->createNotFoundException('Producto con este nombre no encontrado');
        }
        $nombre = $request->request->get('nombre');
        $descripcion = $request->request->get('descripcion');
        $precio = $request->request->get('precio');
        $disponibilidad = $request->request->get('disponibilidad');
        if ($nombre == null) {
            $nombre = $producto->getNombre();
        }
        if ($descripcion == null){
            $descripcion = $producto->getDescripcion();
        }
        if ($precio == null){
            $precio = $precio->getPrecio();
        }
        if ($disponibilidad == null){
            $disponibilidad = $disponibilidad->getDisponibilidad();
        }
        $producto->setNombre($nombre);
        $producto->setDescripcion($descripcion);
        $producto->setPrecio($precio);
        $producto->setPrecio($disponibilidad);
        $producto->setUpdatedAt(new \Datetime("now"));
        $em->flush();
        return $this->render(
            ':producto:do-update.html.twig',
            [
                'producto' => $nombre,
                'title' => 'Producto modificado',
            ]
        );
    }
}

