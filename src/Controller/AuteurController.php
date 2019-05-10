<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
//use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class AuteurController extends AbstractController
{
    /**
     * @Route("/auteur", name="auteur")
     */
    public function add()
    {
         $entityManager2 = $this->getDoctrine()->getManager();

        $auteur = new auteur();
        $auteur->setnom('axel');
 
        $entityManager2->persist($auteur);

        $entityManager2->flush();

        return new Response('Saved new auteur with id '.$auteur->getId());
    }
}
