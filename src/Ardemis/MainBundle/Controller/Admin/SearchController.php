<?php

namespace Ardemis\MainBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class AdminController
 *
 */
class SearchController extends Controller
{
    /**
     * @Route("/search", name="search")
     *
     * @return array
     */
    public function indexAction()
    {
        return $this->render('ArdemisMainBundle:Admin/Search:index.html.twig');
    }
}
