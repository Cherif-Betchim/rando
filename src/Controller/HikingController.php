<?php

namespace App\Controller;

use App\Entity\Hiking;
use App\Form\HikingType;
use App\Repository\HikingRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hiking")
 */
class HikingController extends AbstractController
{
    /**
     * @Route("/", name="hiking_index", methods={"GET"})
     */
    public function index(Request $request, HikingRepository $hikingRepository, PaginatorInterface $paginator): Response
    {

        $rando = $hikingRepository->findAll();
        $rando = $paginator->paginate(
            $rando,
            $request->query->getInt('page', 1), 5
        );
        return $this->render('hiking/index.html.twig', [
//            'hikings' => $hikingRepository->findAll(),
            'hikings' => $rando,

        ]);
    }


    // App\Controller\ArticleController.php

    public function listAction(EntityManagerInterface $em, PaginatorInterface $paginator, Request $request)
    {
        $dql   = "SELECT a FROM AcmeMainBundle:Article a";
        $query = $em->createQuery($dql);

        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        // parameters to template
        return $this->render('article/list.html.twig', ['pagination' => $pagination]);
    }


    /**
     * @Route("/new", name="hiking_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hiking = new Hiking();
        $form = $this->createForm(HikingType::class, $hiking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hiking);
            $entityManager->flush();

            return $this->redirectToRoute('hiking_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hiking/new.html.twig', [
            'hiking' => $hiking,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="hiking_show", methods={"GET"})
     */
    public function show(Hiking $hiking): Response
    {
        return $this->render('hiking/show.html.twig', [
            'hiking' => $hiking,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hiking_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Hiking $hiking): Response
    {
        $form = $this->createForm(HikingType::class, $hiking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hiking_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hiking/edit.html.twig', [
            'hiking' => $hiking,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="hiking_delete", methods={"POST"})
     */
    public function delete(Request $request, Hiking $hiking): Response
    {
        if ($this->isCsrfTokenValid('delete' . $hiking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hiking);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hiking_index', [], Response::HTTP_SEE_OTHER);
    }
}
