<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ArticleController extends AbstractController
{
	
    public $form;
	public function form(Request $request)
	{

		$form = new Article();
		$form->gettitre('');
		$form->getauteur('');
        $form->getcontenu('Write an article');
        $form->getdate(new \DateTime('now'));

        $form = $this->createFormBuilder($form)
            ->add('titre', TextType::class)
             ->add('auteur', TextType::class)
              ->add('contenu', TextType::class)
            ->add('date', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'valider'])
            ->getForm();

              $form->handleRequest($request);

              if ($form->isSubmitted() && $form->isValid()) {
                $dataForm = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($dataForm);
                $entityManager->flush();
                echo "POPOPO";
                };

		$add =$this->render('add.html.twig', [
            'form' => $form->createView(),
        ]);

     	return $add;


	}


    /**
     * @Route("/showone/{id}", name="Blog_showOne")
     */

     public function showOne($id){
     	$article = $this->getDoctrine()
     		->getRepository(Article::class)
     		->find($id);
     		$test = $article->getdate();
     		$result = $test->format('Y-m-d H:i:s');

     	//$newdate = date("Y-m-d", strtotime($article->getdate()));


     	if (!$article) {
        	throw $this->createNotFoundException(
            'No article found for id '.$id);
    	}
    	 return new Response($article->gettitre().'<br>'.$article->getauteur().'<br>'.$article->getcontenu().'<br>'.$result);
     }

     public function show()
    {
        $article = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Article::class);

        $ArticleList = $article->findAll();
        foreach ($ArticleList as $azer) {
        echo $azer->gettitre()."<br>";
        echo $azer->getauteur()."<br>";
        echo $azer->getcontenu()."<br>";
        echo $azer->getdate()->format('Y-m-d H:i:s')."<br><br>";
        }
     $show =$this->render('show.html.twig');
     return new Response($show);
       }

}
