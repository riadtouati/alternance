<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewArticleController extends AbstractController
{
    /**
     * @Route("/new/article", name="new_article")
     */
    public function index()
    {
        $usArticleer = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $file = $video->getVideo();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            try {
                $file->move(
                    $this->getParameter('../public/uploads'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $video->setVideo($fileName);

            // ... persist the $product variable or any other work

            return $this->redirect($this->generateUrl('home'));
        }

        return $this->render(
            'new_article/index.html.twig',
            array('form' => $form->createView())
        );
    }
}
