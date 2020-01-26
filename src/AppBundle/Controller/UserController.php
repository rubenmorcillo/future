<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    /**
     * @Route("/user/{id}", name="listar_un_usuario")
     */
    public function indexAction(User $user)
    {
        return $this->render('pruebas/lista_usuario.html.twig', [
            'user' => $user
        ]);
    }
}
