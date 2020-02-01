<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
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
     * @Route("/base/", name="panel_usuario")
     * @Security("is_granted('ROLE_PLAYER')")
     */
    public function userPanelAction(){
        return $this->render('pruebas/lista_usuario.html.twig', [
            'user' => $this->getUser()
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
