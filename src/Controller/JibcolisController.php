<?php

namespace App\Controller;

use App\Entity\Colis;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class JibcolisController extends AbstractController
{
    /**
     * @Route("/jibcolis", name="jibcolis")
     */
    public function index()
    {
        return $this->render('jibcolis/index.html.twig', [
            'controller_name' => 'JibcolisController'
        ]);
    }

    //les route de navigation entre pages

    /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('jibcolis/home.html.twig');
    }

    /**
     * @Route("/jibcolis/Comment_Ca_Marche", name="jibcolis_commentCaMarche")
     */
    public function Guide(){
        return $this->render('jibcolis/commentCaMarche.html.twig');
    }
    /**
     * @Route("/jibcolis/colis", name="jibcolis_colis")
     */
    public function colis(){

        $repo = $this->getDoctrine()->getRepository(Colis::class);

        $articles = $repo->findAll();

        return $this->render('jibcolis/colis.html.twig', [
            'articles' => $articles
        ]);
    }
    /**
     * @Route("/jibcolis/voyageur", name="jibcolis_voyageur")
     */
    public function voyageur(){
        return $this->render('jibcolis/voyageur.html.twig');
    }
    /**
     * @Route("/jibcolis/Creation_Colis", name="jibcolis_createColis")
     */
    public function createColis(Request $request, ObjectManager $manager){

        return $this->render('jibcolis/creationColis.html.twig');
    }
    /**
     * @Route("/jibcolis/voir_Colis", name="jibcolis_voirColis")
     */
    public function voirColis(){
        return $this->render('jibcolis/colis.html.twig');
    }
    /**
     * @Route("/jibcolis/voir_Voyageur", name="jibcolis_voirVoyageur")
     */
    public function voirVoyageur(){
        return $this->render('jibcolis/voyageur.html.twig');
    }


}
