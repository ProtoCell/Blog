<?php // src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TaskController extends AbstractController
{

    public function new(Request $request)
    {
        // creates a task and gives it some dummy data for this example
     

        $form = new Task();
        $form->settitre('');
        $form->setauteur('');
        $form->setcontenu('Write an article');
        $form->setdate(new \DateTime('now'));

        $form = $this->createFormBuilder($form)
            ->add('titre', TextType::class)
             ->add('auteur', TextType::class)
              ->add('contenu', TextType::class)
            ->add('date', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'valider'])
            ->getForm();

        $add =$this->render('add.html.twig');

        return new Response($add, ['form' => $form->createView()]);
    }
}

 ?>