<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */


namespace App\Controller;


use App\Oauth\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends Controller
{
    /**
     * @Route("/login")
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
        throw new \LogicException("Controller should not be called.");
    }
}