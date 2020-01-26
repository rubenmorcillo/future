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
     * @Route("/logout", name="usuario_logout")
     */
    public function salirAction()
    {

    }
}
