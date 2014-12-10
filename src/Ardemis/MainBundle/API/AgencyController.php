<?php
namespace Ardemis\MainBundle\API;

use Ardemis\MainBundle\Entity\Agency;
use FOS\RestBundle\Controller\FOSRestController;
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
        $query = $agencyRepository->getAllQuery();

        /** @var SlidingPagination $pagination */
        $pagination = $this->get('knp_paginator')->paginate(
            $query,
            $request->query->get('page', 1),
            $request->query->get('limit', 10)
        );

        $view = $this->view($pagination->getItems(), 200);

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
