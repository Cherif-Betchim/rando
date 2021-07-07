<?php

namespace App\Controller;

use App\Entity\Hiking;
use App\Repository\HikingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HikinggController extends AbstractController {

    /**
     * @Route ("/paths", name="hiking.index")
     * return Response
     */

    public function index (HikingRepository $repository):Response
    {
//        $this->repository
        return $this->render ('hiking/index.html.twig'.[
            'current_menu' =>'hikings'
            ]);
    }
}
