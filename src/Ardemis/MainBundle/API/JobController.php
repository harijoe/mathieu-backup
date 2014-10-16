<?php

namespace Ardemis\MainBundle\API;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class JobController
 */
class JobController extends FOSRestController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Retrieves all jobs from agency",
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
     * @param integer $agencyId
     * @param integer $jobId
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Retrieves a job",
     *      parameters={
     *              {"name"="agencyId", "dataType"="integer", "required"=true, "description"="Agency id"},
     *              {"name"="jobId", "dataType"="integer", "required"=true, "description"="Job id"}
     *      }
     * )
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getJobAction($agencyId, $jobId)
    {
        $jobRepository = $this->getDoctrine()->getRepository('ArdemisMainBundle:Job');
        $data = $jobRepository->findOneBy(['agency' => $agencyId, 'id' => $jobId]);
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }
}
