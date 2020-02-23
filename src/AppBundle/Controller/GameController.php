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
        $clase = $user->getPrincipalCharacter()->getClass();
        $hp = $this->statCalc($user->getPrincipalCharacter()->getLevel(), $clase->getHpBase());
        $dmg = $this->statCalc($user->getPrincipalCharacter()->getLevel(),$clase->getDamageBase());
        $def = $this->statCalc($user->getPrincipalCharacter()->getLevel(),$clase->getDefenseBase());
        $agi = $this->statCalc($user->getPrincipalCharacter()->getLevel(),$clase->getAgilityBase());

        return $this->render('pruebas/base_comandante.html.twig', [
            'agi' => $agi,
            'def' => $def,
            'dmg' => $dmg,
            'hp' => $hp * 10,
            'user' => $user
        ]);
    }

    private function statCalc($lvl, $base){
        //crecimiento regular
        $resultado = round($lvl/100 * $base);
        return $resultado;
    }

    /**
     * @Route("/cyberwares", name="lista_soldados")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function soldierList(){
        $user = $this->getUser();

        return $this->render('pruebas/base_cyberwares.html.twig', [
            'user' => $user
        ]);
    }
}
