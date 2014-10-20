<?php

namespace Ardemis\MainBundle\API;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class JobController
 */
class JobController extends FOSRestController
{
    /**
     * @param integer $agencyId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Retrieves all jobs from agency by agency id",
     *      parameters={
     *              {"name"="agencyId", "dataType"="integer", "required"=true, "description"="Agency id"}
     *      }
     * )
     */
    public function getJobsAction($agencyId)
    {
        $jobRepository = $this->getDoctrine()->getRepository('ArdemisMainBundle:Job');
        $data = $jobRepository->findBy(['agency' => $agencyId]);
        $view = $this->view($data, 200);

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
