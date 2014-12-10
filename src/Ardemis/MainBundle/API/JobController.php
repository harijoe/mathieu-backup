<?php

namespace Ardemis\MainBundle\API;

use FOS\RestBundle\Controller\FOSRestController;
use Knp\Component\Pager\Pagination\SlidingPagination;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class JobController
 */
class JobController extends FOSRestController
{
    /**
     * @param Request $request
     * @param integer $agencyId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Retrieves all jobs from agency by agency id",
     *      parameters={
     *              {"name"="agencyId", "dataType"="integer", "required"=true, "description"="Agency id"}
     *      },
     *      filters={
     *          {"name"="page", "dataType"="integer"},
     *          {"name"="limit", "dataType"="integer"}
     *      }
     * )
     */
    public function getJobsAction(Request $request, $agencyId)
    {
        $jobRepository = $this->getDoctrine()->getRepository('ArdemisMainBundle:Job');
        $query = $jobRepository->findJobsFromAgencyById($agencyId);

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
     * @param integer $jobId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @Rest\Get("/jobs/{jobId}")
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Retrieves a job by id",
     *      parameters={
     *          {"name" = "jobId", "dataType" = "integer", "required" = true, "description" = "Job id"}
     *      }
     * )
     */
    public function getJobAction($jobId)
    {
        $jobRepository = $this->getDoctrine()->getRepository('ArdemisMainBundle:Job');
        $data = $jobRepository->findOneBy(['id' => $jobId]);
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }
}
