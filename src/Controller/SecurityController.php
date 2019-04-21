<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager,
                    UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class,$user);
        // analyse de requete
        $form->handleRequest($request);
        //is tout est bon et les champs sont valide
        if($form->isSubmitted() && $form->isValid()){

            //persister dans le temps
            $manager->persist($user);

         //sauvgrader dans la bdd
             $manager->flush();
        }

        return $this->render('security/registration.html.twig',[
            'form'=>$form->createView()
            ]);
    }
}
