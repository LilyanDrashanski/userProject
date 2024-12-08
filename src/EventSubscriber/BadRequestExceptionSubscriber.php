<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class BadRequestExceptionSubscriber implements EventSubscriberInterface
{
    public function onKernelException(ExceptionEvent $event): void
    {
        if ($event->getThrowable() instanceof BadRequestHttpException)
            {
                $exception = $event->getThrowable()->getPrevious();

                $errors = [];

                foreach ($exception->getViolations() as $violation) {
                    $errors[$violation->getPropertyPath()] = $violation->getMessage();
                }

                $event->setResponse(new JsonResponse(['errors' => [$errors]]));
            }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }
}
