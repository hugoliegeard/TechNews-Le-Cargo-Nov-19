<?php

namespace App\Newsletter;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class NewsletterSubscriber implements EventSubscriberInterface
{

    private $session;

    /**
     * NewsletterSubscriber constructor.
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
            KernelEvents::RESPONSE => 'onKernelResponse'
        ];
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        # On s 'assure que la requète viens de l'utilisateur et non de Symfony
        if(!$event->isMasterRequest() || $event->getRequest()->isXmlHttpRequest()) {
            return ;
        }

        # Incrémentation du nombre de pages visitées par mon utilisateur
        $this->session->set('countVisitedPages',
            $this->session->get('countVisitedPages', 0) + 1);

        # Inviter l'utilisateur
        if($this->session->get('countVisitedPages') === 3) {
            $this->session->set('inviteUserModal', true);
        }
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        # On s 'assure que la requète viens de l'utilisateur et non de Symfony
        if(!$event->isMasterRequest() || $event->getRequest()->isXmlHttpRequest()) {
            return ;
        }

        # On passe à false l'inviteUserModal
        # if($this->session->get('countVisitedPages') >= 3 ) {
        #     $this->session->set('inviteUserModal', false);
        # }
        $this->session->set('inviteUserModal', false);

    }
}