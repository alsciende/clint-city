<?php

declare(strict_types=1);

namespace App\Security;

use Api\Oauth\Storage;
use Api\Oauth\Token;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

class OauthAuthenticator extends AbstractGuardAuthenticator implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @var Security
     */
    private $security;

    /**
     * @var Storage
     */
    private $storage;

    /**
     * OauthAuthenticator constructor.
     *
     * @param Security $security
     */
    public function __construct(Security $security, Storage $storage)
    {
        $this->security = $security;
        $this->storage = $storage;
    }

    public function supports(Request $request)
    {
        if ($this->security->getUser() instanceof UserInterface) {
            return false;
        }

        return $request->query->has('oauth_token');
    }

    /**
     * @param Request $request
     * @return Token
     */
    public function getCredentials(Request $request)
    {
        $token = $this->storage->get();

        if (!$token instanceof Token) {
            throw new \UnexpectedValueException('No session token. Try again.');
        }

        if ($token->getToken() !== $request->query->get('oauth_token')) {
            throw new \UnexpectedValueException('Token mismatch.');
        }

        return $token;
    }

    /**
     * @param Token                 $credentials
     * @param UserProviderInterface $userProvider
     * @return UserInterface|null
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $userProvider->loadUserByUsername($credentials->getToken());
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return true;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return null;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return new RedirectResponse('/');
    }

    public function supportsRememberMe()
    {
        return false;
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new RedirectResponse('/login');
    }
}
