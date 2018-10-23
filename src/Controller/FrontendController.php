<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\res;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Inscripcion;

class FrontendController extends Controller {   
    
    /**
     *
     * @Route("/", name="index")
     */
    public function indexAction(Request $request) {
        // just setup a fresh $task object (remove the dummy data)
    $inscripcion = new Inscripcion();

    $form = $this->createFormBuilder($inscripcion)
        ->add('nombre', TextType::class, array(
            'attr' => array(
                "class" => "form-control"
            )
        ))
        ->add('apellido', TextType::class, array(
            'attr' => array(
                "class" => "form-control"
            )
        ))
        ->add('email', EmailType::class, array(
            'attr' => array(
                "class" => "form-control"
            )
        ))
        ->add('telefono', TextType::class, array(
            'attr' => array(
                "class" => "form-control"
            )
        ))
        ->add('jurisdiccionOrganismo', TextType::class, array(
            'attr' => array(
                "class" => "form-control"
            )
        ))
        ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $inscripcion = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($inscripcion);
        $entityManager->flush();

        //return $this->redirectToRoute('task_success');
    }

    return $this->render('inscripcion.html.twig', array(
        'form' => $form->createView(),
    ));
       
    }
}
