<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleRepository;
use App\Repository\EBookRepository; 
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Form\ContactType;
use App\DataClass\Contact;
use DateTime;

/**
 * Creates views that allow users to see the different pages
 * @Route(name="seducer_")
 */
class FrontController extends AbstractController
{

    /**
     * Displays contact page
     * @Route("/me-contacter", name="contact")
     * @return Response
     */
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // add date of message submission
            $contact->setSubmitDate(new DateTime('now'));

            // add type of message (for after_submit view purposes)
            $contact->setType('contact'); 

            // send mail
            $email = (new Email())
                ->from('email_from@example.com')
                ->to('email_to@example.com')
                ->subject($contact->getSubject())
                ->html($this->renderView('email.html.twig', [
                    'data' => $contact,
                ]));
                
            $mailer->send($email);
        }

        return $this->render('front/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findBy([],
        ['lastUpdateDate' => 'desc'], 2, 0);

        return $this->render('front/home.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/blog", name="blog")
     * @return Response
     */
    public function blog(ArticleRepository $articleRepository): Response
    {
        return $this->render('front/blog.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/article/{id}", name="article")
     * @return Response
     */
    public function article(ArticleRepository $articleRepository, int $id): Response
    {
        $article = $articleRepository->findOneBy(['id' => $id]);
        $content = html_entity_decode($article->getContent());

        return $this->render('front/article.html.twig', [
            'article' => $article,
            'content' => $content,
        ]);
    }

    /**
     * @Route("/formations-de-seduction", name="formations")
     * @return Response
     */
    public function formations(EBookRepository $eBookRepository): Response
    {
        return $this->render('front/formations.html.twig', [
            'e_books' => $eBookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/e_book/{id}", name="e_book")
     * @return Response
     */
    public function e_book(EBookRepository $eBookRepository, int $id): Response
    {
        $e_book = $eBookRepository->findOneBy(['id' => $id]);
        $content = html_entity_decode($e_book->getContent());

        return $this->render('front/e_book.html.twig', [
            'e_book' => $e_book,
            'content' => $content,
        ]);
    }
}