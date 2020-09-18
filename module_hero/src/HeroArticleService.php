<?php

namespace Drupal\module_hero;

use Drupal\Core\Entity\Query\QueryFactory;
use Drupal\Core\Entity\EntityManager;

class HeroArticleService
{
	private QueryFactory $entityQuery;
	private EntityManager $entityManager;

	public function __construct(QueryFactory $entityQuery, EntityManager $entityManager)
	{
		$this->entityQuery = $entityQuery;
		$this->entityManager = $entityManager;
	}	

	public function getHeroArticles(): array
	{
		$articleNids = $this->entityQuery->get('node')->condition('type', 'article')->execute();

		return $this->entityManager->getStorage('node')->loadMultiple($articleNids);
	}	
}	
