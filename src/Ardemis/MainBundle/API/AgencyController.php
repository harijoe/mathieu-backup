<?php
namespace Ardemis\MainBundle\API;

use Ardemis\MainBundle\Entity\Agency;
use FOS\RestBundle\Controller\FOSRestController;
use Hateoas\Representation\CollectionRepresentation;
use Hateoas\Representation\PaginatedRepresentation;
use Knp\Component\Pager\Pagination\SlidingPagination;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class AgencyController
 */
class AgencyController extends FOSRestController
{

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     * resource=true,
     * description="Retrieves all agencies",
     *      filters={
     *          {"name"="page", "dataType"="integer"},
     *          {"name"="limit", "dataType"="integer"}
     *      }
     * )
     */
    public function getAgenciesAction(Request $request)
    {
        $agencyRepository = $this->getDoctrine()->getRepository('ArdemisMainBundle:Agency');
        $limit = $request->query->get('limit', 10);
        $page  = $request->query->get('page', 1);
        $count = $agencyRepository->countAll();
        $pages = ceil($count / $limit);
        $query = $agencyRepository->getAllQuery();

        /** @var SlidingPagination $pagination */
        $pagination = $this->get('knp_paginator')->paginate(
            $query,
            $request->query->get('page', 1),
            $request->query->get('limit', 10)
        );

        $paginatedCollection = new PaginatedRepresentation(
            new CollectionRepresentation(
                $pagination->getItems(),
                'agencies', // embedded rel
                'agencies' // xml element name
            ),
            'get_agencies', // route
            array(), // route parameters
            $page, // page
            $limit, // limit
            $pages, // total pages
            'page', // page route parameter name, optional, defaults to 'page'
            'limit', // limit route parameter name, optional, defaults to 'limit'
            false    // generate relative URIs
        );

        $view = $this->view($paginatedCollection, 200);

        return $this->handleView($view);
    }

    /**
     * @param integer $agencyId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Retrieves an agency by id",
     *      parameters={
     *          {"name"="agencyId", "dataType"="integer", "required"=true, "description"="Agency id"}
     *      }
     * )
     */
    public function getAgencyAction($agencyId)
    {
        $data = $this->getDoctrine()->getRepository('ArdemisMainBundle:Agency')->findOneBy(['id' => $agencyId]);

        if (!$data || !$data instanceof Agency) {
            throw $this->createNotFoundException('Agency not found');
        }

        $view = $this->view($data, 200)
                     ->setFormat('json');

        return $this->handleView($view);
    }
}
