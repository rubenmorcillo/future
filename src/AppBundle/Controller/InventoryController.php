<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class InventoryController extends Controller
{

    /**
     * @Route("/inventory", name="inventario")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function inventoryAction(){

        return $this->render('pruebas/inventario/base_inventario.html.twig', [
            'inventory' => $this->getUser()->getInventory()
        ]);
    }
}
