<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DocumentationController extends Controller
{
    /**
     * @Route("/doc")
     */
    public function documentation()
    {
        return $this->render('doc.html.twig');
    }
}