<?php

namespace App\Controller;

use App\Entity\EBook;
use App\Form\EBookType;
use App\Repository\EBookRepository; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/admin", name="admin_")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminEBookController extends AbstractController
{
    /**
     * @Route("/e_books", name="e_books")
     * @return Response
     */
    public function eBookIndex(EBookRepository $eBookRepository): Response
    {
        return $this->render('admin/e_books.html.twig', [
            'e_books' => $eBookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/e_book/ajouter", name="e_book_new", methods={"GET","POST"})
     * @return Response
     */
    public function eBookNew(Request $request, EntityManagerInterface $entityManager): Response
    {
        $eBook = new EBook();
        $form = $this->createForm(EBookType::class, $eBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($eBook);
            $entityManager->flush();

            return $this->redirectToRoute('admin_e_books');
        }

        return $this->render('admin/e_book_new.html.twig', [
            'e_book' => $eBook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/e_book/{id}", name="e_book_show", methods={"GET"})
     * @return Response
     */
    public function eBookShow(EBook $eBook): Response
    {
        return $this->render('admin/e_book_show.html.twig', [
            'e_book' => $eBook,
        ]);
    }

    /**
     * @Route("/e_book/modifier/{id}", name="e_book_edit", methods={"GET","POST"})
     * @return Response
     */
    public function eBookEdit(Request $request, EBook $eBook, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EBookType::class, $eBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($eBook);
            $entityManager->flush();

            return $this->redirectToRoute('admin_e_books');
        }

        return $this->render('admin/e_book_edit.html.twig', [
            'e_book' => $eBook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/e_book/supprimer/{id}", name="e_book_delete", methods={"DELETE"})
     * @return Response
     */
    public function eBookDelete(Request $request, EBook $eBook, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eBook->getId(), $request->request->get('_token'))) {
            $entityManager->remove($eBook);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_e_books');
    }
}
