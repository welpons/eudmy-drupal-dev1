<?php

namespace Drupal\module_hero\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\module_hero\HeroArticleService;
use Drupal\Core\Config\ConfigFactory;

class HeroController extends ControllerBase
{
	private $heroArticleService;
	protected $configFactory;
	protected $currentUser;

	public static function create(ContainerInterface $container)
	{
		return new static(
			$container->get('module_hero.hero_articles'),
			$container->get('config.factory'),
			$container->get('current_user')
		);
	}	

	public function __construct(HeroArticleService $heroArticleService, ConfigFactory $configFactory, $currentUser)
	{
		$this->heroArticleService = $heroArticleService;
		$this->configFactory = $configFactory;
		$this->currentUser = $currentUser;
	}	

	public function heroList()
	{
		if ($this->currentUser->hasPermission('can see hero list')) {
		
		}

		$heroes = [
			['name' => 'Hulk'],
			['name' => 'Thor'],
			['name' => 'Iron Man'],
			['name' => 'Luke Cage'],
			['name' => 'Black Widow'],
			['name' => 'Daredevil'],
			['name' => 'Captain America'],
			['name' => 'Wolverine']
		];	

                if ($this->currentUser->hasPermission('can see hero list')) {
	                return [
        	                '#theme' => 'hero_list',
                	        '#items' => $heroes,
                        	'#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
                	];
		} else {
	                return [
        	                '#theme' => 'hero_list',
                	        '#items' => [],
                        	'#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
                	];
		}

	}	
}	
