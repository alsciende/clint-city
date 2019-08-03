<?php

declare(strict_types=1);

namespace Api\Oauth;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Storage
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * Storage constructor.
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function get(): ?Token
    {
        return $this->session->get('oauth');
    }

    public function set(Token $token): void
    {
        $this->session->set('oauth', $token);
    }
}
