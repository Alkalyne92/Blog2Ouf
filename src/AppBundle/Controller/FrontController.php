<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Article;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FrontController extends Controller
{

    /**
     * @Route("/", name="list")
     */
    public function listArticle(Request $request)
    {

      $article = $this
      ->getDoctrine()
      ->getRepository('AppBundle:Article')
      ->findAll();

        return $this->render('front/list.html.twig', array(
          'article' => $article,
        ));
    }


    /**
     * @Route("/create", name="create")
     */
    public function createArticle(Request $request)
    {
          // create a task and give it some dummy data for this example
        $article = new Article();
        $article->setAuthor('user');


        $form = $this->createFormBuilder($article)
            ->add('name', TextType::class, array('label' => 'Nom'))
            ->add('content', TextareaType::class, array('label' => 'Contenu'))
            ->add('date', DateType::class, array('label' => 'Date de parution'))
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
            ->getForm();

            $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
           // $form->getData() holds the submitted values
           // but, the original `$task` variable has also been updated
           $task = $form->getData();

           // ... perform some action, such as saving the task to the database
           // for example, if Task is a Doctrine entity, save it!
           $em = $this->getDoctrine()->getManager();
           $em->persist($article);
           $em->flush();

           return $this->redirectToRoute('list');
       }

       return $this->render('front/create.html.twig', array(
           'form' => $form->createView(),
       ));

}

}
