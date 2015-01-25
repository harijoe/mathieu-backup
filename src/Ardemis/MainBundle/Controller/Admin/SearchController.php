<?php

namespace Ardemis\MainBundle\Controller\Admin;

use Ardemis\MainBundle\Form\SearchType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 *
 */
class SearchController extends Controller
{
    /**
     * @param Request $request
     *
     * @return array
     *
     * @Route("/search", name="search")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new SearchType());
        $form->handleRequest($request);

        $paginator = $this->get('knp_paginator');

        $candidateRepository = $this->getDoctrine()->getRepository('ArdemisMainBundle:Candidate');
        $clientRepository = $this->getDoctrine()->getRepository('ArdemisMainBundle:Client');
        $jobRepository = $this->getDoctrine()->getRepository('ArdemisMainBundle:Job');

        $candidatesQuery = $candidateRepository->getSearchQuery($form->getData());
        $clientsQuery = $clientRepository->getSearchQuery($form->getData());
        $jobsQuery = $jobRepository->getSearchQuery($form->getData());

        $candidates = $paginator->paginate(
            $candidatesQuery,
            $request->query->get('pageCandidates', 1),
            10,
            ['pageParameterName' => 'pageCandidates']
        );

        $clients = $paginator->paginate(
            $clientsQuery,
            $request->query->get('pageClients', 1),
            10,
            ['pageParameterName' => 'pageClients']
        );

        $jobs = $paginator->paginate(
            $jobsQuery,
            $request->query->get('pageJobs', 1),
            10,
            ['pageParameterName' => 'pageJobs']
        );

        return $this->render(
            'ArdemisMainBundle:Admin/Search:index.html.twig',
            [
                'form' => $form->createView(),
                'candidates' => $candidates,
                'clients' => $clients,
                'jobs' => $jobs
            ]
        );
    }
}
