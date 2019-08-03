<?php

declare(strict_types=1);

namespace App\Controller;

use Sdk\Oauth\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Factory $oauthFactory)
    {
        $token = $oauthFactory->getRequestToken();

        return $this->redirect($oauthFactory->getAuthorizeUrl(
            $token,
            'http://localhost:8000/login_check'
        ));
    }

    /**
     * @Route("/login_check")
     */
    public function loginCheck()
    {
        return $this->redirect('/');
    }

    /**
     * @Route("/logout")
     */
    public function logout()
    {
        throw new \LogicException('Controller should not be called.');
    }
}
