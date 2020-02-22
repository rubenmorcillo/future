<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Helmet;
use AppBundle\Entity\Jacket;
use AppBundle\Entity\PrincipalCharacter;
use AppBundle\Entity\Weapon;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
     * @Route("/equip/weapon/{weapon}/", name="equipar_arma")
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

    /**
     * @Route("/equip/helmet/{helmet}/", name="equipar_casco")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function equipHelmet(Helmet $helmet){


        $principalCharacter = $this->getUser()->getPrincipalCharacter();
        $oldHelmet = $principalCharacter->getEquipedHelmet();
        if ($oldHelmet != null){
            $oldHelmet->setEquiped(null);
        }
        $helmet->setEquiped($principalCharacter);
        $principalCharacter->setEquipedHelmet($helmet);

        $em = $this->getDoctrine()->getManager();
        try{
            $em->flush();
        }catch (\Exception $e){
            $this->addFlash('error', $e->getMessage());
        }
        return $this->redirectToRoute('inventario', ['section' => 2]);
    }


    /**
     * @Route("/equip/jacket/{jacket}/", name="equipar_chaqueta")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function equipJacket(Jacket $jacket){


        $principalCharacter = $this->getUser()->getPrincipalCharacter();
        $oldJacket = $principalCharacter->getEquipedJacket();
        if ($oldJacket != null){
            $oldJacket->setEquiped(null);
        }
        $jacket->setEquiped($principalCharacter);
        $principalCharacter->setEquipedJacket($jacket);

        $em = $this->getDoctrine()->getManager();
        try{
            $em->flush();
        }catch (\Exception $e){
            $this->addFlash('error', $e->getMessage());
        }
        return $this->redirectToRoute('inventario', ['section' => 3]);
    }



}
