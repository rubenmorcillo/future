<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends Controller
{

    /**
     * @Route("/map", name="mapa_distritos")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function mapAction()
    {

        return $this->render('pruebas/mapa_distritos.html.twig', []);
    }
}
