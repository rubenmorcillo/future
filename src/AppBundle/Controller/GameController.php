<?php

namespace AppBundle\Controller;

use AppBundle\Repository\DistrictRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends Controller
{

    /**
     * @Route("/map", name="mapa_distritos")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function mapAction(DistrictRepository $districtRepository)
    {
        $user = $this->getUser();
        $validDistricts = $districtRepository->findByReputationLessThan($user->getReputation());

        $districts = $districtRepository->findAll();
        return $this->render('pruebas/mapa_distritos.html.twig', [
            'districts' => $districts,
            'validDistricts' => $validDistricts,
            'reputation' => $user->getReputation()
        ]);
    }

    /**
     * @Route("/commander", name="perfil_comandante")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function principalCharacterAction()
    {
        $user = $this->getUser();

        return $this->render('pruebas/base_comandante.html.twig', [
        ]);
    }

    /**
     * @Route("/inventory", name="user_inventario")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function inventoryAction(){
        $user = $this->getUser();

        return $this->render('pruebas/base_inventario.html.twig', [
            'inventory' => $user->getInventory()
        ]);
    }
}
