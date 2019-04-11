<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Property;
use App\Form\PropertyType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class AdminPropertyController extends AbstractController
{
    /**
     *
     * @var PropertyRepository
     */
    private $repository;

    /**
     * 
     *
     * @var ObjectManager
     */
    private $em;

    public function __construct(PropertyRepository $repository, ObjectManager $em )
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin",name="admin.property.index")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(): Response
    {
        $properties = $this->repository->findAll();
        return $this->render('admin/property/index.html.twig', compact('properties'));
    }

    /**
     * @Route ("/admin/property/create", name="admin.property.new")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request): Response
    {
        $property = new Property();
        $form = $this->createForm(PropertyType::class , $property);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            $this->em->persist($property);
            $this->em->flush();
            $this->addFlash('success','Bien Créé avec succés');

            return $this->redirectToRoute('admin.property.index');
        }

        return $this->render('admin/property/new.html.twig',[
            'property' => $property,
            'form'=> $form->createView()
        ]);

    }


    /**
     * @Route("/admin/property/{id}",name="admin.property.edit", methods="GET|POST")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Property $property, Request $request) : Response
    {
        $form = $this->createForm(PropertyType::class , $property);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success','Bien Modifié avec succés');
            return $this->redirectToRoute('admin.property.index');
        }

        return $this->render('admin/property/edit.html.twig',[
            'property' => $property,
            'form'=> $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}",name="admin.property.delete", methods="DELETE")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dete(Property $property, Request $request)
    {
        if ($this->isCsrfTokenValid('delete'. $property->getId(),$request->get('_token')))
        {
            dump('suppression');
            $this->em->remove($property);
            $this->em->flush();
            $this->addFlash('success','Bien Supprimé avec succés');

            // return new Response('Suppression');
        }
        return $this->redirectToRoute('admin.property.index');

    }
}
