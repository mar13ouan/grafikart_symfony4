<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Request;

class ImportController extends AbstractController
{

    /**
     * @Route ("/import", name="import")
     * @param \App\Repository\PropertyRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PropertyRepository $repository, Request $request): Response
    {
        $launch = $request->query->get('launch');
        $data = [];
        $data['data'] = null;
        $data['error'] = "";
        $data['status'] = false;

        if ($launch ) {
            try {
                $data['status'] = true;
            } catch (\Throwable $th) {
                $data['error'] = $th;
            }
        }
        return $this->render(
            'import.html.twig',
            ['data' => $data]
        );
    }
}
