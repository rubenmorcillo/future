<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PrincipalCharacter;
use AppBundle\Entity\Weapon;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InventoryController extends Controller
{

    /**
     * @Route("/inventory/{section}", name="inventario", defaults={"section":1})
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function inventoryAction($section){

        return $this->render('pruebas/inventario/base_inventario.html.twig', [
            'section' => $section,
            'inventory' => $this->getUser()->getInventory()
        ]);
    }

    /**
     * @Route("/equip/{weapon}/", name="equipar_arma")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function equipWeapon(Weapon $weapon){


        $principalCharacter = $this->getUser()->getPrincipalCharacter();
        $oldWeapon = $principalCharacter->getEquipedWeapon();
        if ($oldWeapon != null){
            $oldWeapon->setEquiped(null);
        }
        $weapon->setEquiped($principalCharacter);
        $principalCharacter->setEquipedWeapon($weapon);

        $em = $this->getDoctrine()->getManager();
        try{
            $em->flush();
        }catch (\Exception $e){
        }
        return $this->redirectToRoute('inventario', ['section' => 1]);
    }

}
