<?php

namespace Ardemis\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class MainController
 */
class MainController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function indexAction()
    {
        $url = $this->get('router')->generate('fos_user_security_login');
        $url = preg_replace("#//#", "/", $url);
        return $this->redirect($url);
    }
}
