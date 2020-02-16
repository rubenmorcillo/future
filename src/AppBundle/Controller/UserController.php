<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Inventory;
use AppBundle\Entity\PrincipalCharacter;
use AppBundle\Entity\User;
use AppBundle\Form\Type\PrincipalCharacterType;
use AppBundle\Form\Type\UserType;
use AppBundle\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    /**
     * @Route("/user/{id}", name="listar_un_usuario")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function getUserAction(User $user)
    {
        if ($this->getUser() != $user){
            $this->redirectToRoute('listar_un_usuario', ['id' => $this->getUser()->getId()]);
        }
        return $this->render('pruebas/lista_usuario.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/character", name="crear_pesonaje")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function choosePrincipalCharacter(Request $request){
        try{
            $user = $this->getUser();
            $character = new PrincipalCharacter();
            $form = $this->createForm(PrincipalCharacterType::class, $character);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()){
                $userRepository = $this->getDoctrine()->getRepository(User::class);
                $user = $userRepository->findOneBy(['id'=> $user->getId()]);

                $character->setExperience(0);
                $character->setLevel(1);
                $character->setOwner($user);



                $em = $this->getDoctrine()->getManager();
                $em->persist($character);
                $em->flush();

                return $this->redirectToRoute('panel_usuario');


            }

            if ($user->getPrincipalCharacter() == null){
                return $this->render('pruebas/crear_personaje.html.twig', [
                    'form' => $form->createView()
                ]);
            }

            return $this->redirectToRoute('panel_usuario');

        }catch (\Exception $e){
            $this->addFlash('error', "error elegiendo personaje principal");
            return $this->redirectToRoute('homepage');
        }

    }

    /**
     * @Route("/base/", name="panel_usuario")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function userPanelAction(){
        $user = $this->getUser();
        if ($user->getPrincipalCharacter() == null){
            return $this->redirectToRoute('crear_pesonaje');
        }
        return $this->render('pruebas/base_usuario.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/signup", name="crear_usuario")
     */
    public function createUserAction(Request $request){

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            try{
               $em = $this->getDoctrine()->getManager();
               if ($user->isAdmin() == null){
                   $user->setAdmin(false);
               }

               $inventory = new Inventory();
               $inventory->setMaxCapacity(100);
               $inventory->setCurrentCapacity(0);

               $user->setInventory($inventory);
               $user->setPassword($form->get('password')->getData());
               $em->persist($user);
               $em->flush();
                $this->addFlash('exito', 'Usuario registrado con éxito');
                return $this->redirectToRoute('homepage');
            }catch (\Exception $e){
                $this->addFlash('error', 'Error registrando usuario: '.$e->getMessage());
            }
        }

        return $this->render('pruebas/form_signup.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
