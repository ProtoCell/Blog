<?php

// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;



class BlogController extends AbstractController
{

    public function index()
    {
     $base =$this->render('base.html.twig');
     return new Response($base);
    }

     public function add()
    {
        $add =$this->render('add.html.twig');
     return new Response($add);
    }

    public function show($url)
    {
     $show =$this->render('show.html.twig', ['slug' => $url]);
     return new Response($show);
       }

    public function edit($id)
    {
        $edit =$this->render('edit.html.twig', ['slug' => $id]);
     return new Response($edit);
        }

    public function remove($id)
    {
        $remove =$this->render('remove.html.twig');
     return new Response($remove);
    }
}
   
