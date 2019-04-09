<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PropertyRepository;
use App\Entity\Property;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    /**
     * Undocumented function
     *
     * @param \App\Repository\PropertyRepository $repository
     * @param \Doctrine\Common\Persistence\ObjectManager $em
     */
    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @Route("/biens", name="property.index")
     * @return Response
     */
    public function index(): Response
    {
        // dump($this->repository);
        // $property = $this->repository->findAllVisible();
        // $property[0]->setSold(true);
        // $this->em->flush();

        // dump($property);
        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @param Property $property
     * @Route ("/biens/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Property $property, string $slug, $id): Response
    {
        // $property=$this->repository->findOneById($id);
        if ($property->getSlug() !== $slug) {
            return $this->redirectToRoute(
                'property.show',
                [   
                    'id' => $property->getId(),
                    'slug' => $property->getSlug()
                ], 301
            );
        }
        return $this->render(
            'property/show.html.twig',
            [
                'property' => $property,
                'current_menu' => 'properties'
            ]
        );
    }
}
