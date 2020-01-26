<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SeguridadController extends Controller
{
    /**
     * @Route("/login", name="usuario_login")
     */
    public function indexAction()
    {
        // formulario de entrada
        return $this->render('pruebas/form_login.html.twig');
    }

    /**
     * @Route("/exit", name="usuario_salir")
     */
    public function salirAction()
    {

    }
}
