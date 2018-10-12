<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */


namespace App\Security;


use App\Api\Command;
use App\Api\Request;
use App\Oauth\Factory;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    /**
     * @var Factory
     */
    private $factory;

    /**
     * UserProvider constructor.
     * @param SessionInterface $session
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    public function loadUserByUsername($username)
    {
        $this->factory->getAccessToken();

        $command = new Command('general.getPlayer', [], ['player.id', 'player.name']);
        $this->factory->execute(new Request($command));
        $data = $command->getResult();
        $player = $data['context']['player'];

        return new User($player['name']);
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException();
        }

        return $user;
    }

    public function supportsClass($class)
    {
        return $class === User::class;
    }
}