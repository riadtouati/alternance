<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HommeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function chain(FiveArticleService $fiveArticleService)
    {
        
        $chain = $fiveArticleService->getFiveArticleService();
        return $this->render('homme/index.html.twig', [
            'articles' => $article
        ]);
    }
}
