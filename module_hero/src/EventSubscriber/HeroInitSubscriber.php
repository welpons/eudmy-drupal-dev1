<?php

namespace Drupa\module_hero\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\GenericEvent;

class HeroInitSubscriber implements EventSubscriberInterface
{

	public static function getSubscribedEvents() 
	{
		$events[KernelEvents::REQUEST][] = ['onRequest'];

		return $events;
	}	

	public function onRequest(GenericEvent $event)
	{
		throw new \Exception("Here exception");
	}

}	
