<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Article;

class FiveArticleService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getFiveLastArticle()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder
            ->select('DISTINCT *')
            ->from(Article::class, 'a')
            ->limit(5);
        return $queryBuilder->getQuery()->getResult();
    }

}