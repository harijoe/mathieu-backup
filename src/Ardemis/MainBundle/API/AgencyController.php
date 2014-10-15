<?php
namespace Ardemis\MainBundle\API;

use Ardemis\MainBundle\Entity\Agency;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


/**
 * Class AgencyController
 */
class AgencyController extends FOSRestController
{

    /**
     * @ApiDoc(
     * resource=true,
     * description="Retrieves all agencies")
     *
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAgenciesAction()
    {
        $agencyRepository = $this->getDoctrine()->getRepository('ArdemisMainBundle:Agency');

        $data = $agencyRepository->findAll();

        $view = $this->view($data, 200)
                     ->setFOrmat('json');

        return $this->handleView($view);
    }

    /**
     * @ApiDoc(
     *      resource=true,
     *      description="Retrieves an agency by id",
     *      parameters={
     *          {"name"="agencyId", "dataType"="integer", "required"=true, "description"="Agency id"}
     * })
     *
     * @param integer $agencyId
     *
     * @return \Symfony\Component\HttpFoundation\Response
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
