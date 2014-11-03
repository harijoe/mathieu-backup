<?php

namespace Ardemis\MainBundle\API;

use Ardemis\MainBundle\Entity\Candidate;
use Ardemis\MainBundle\Form\CandidateType;
use FOS\RestBundle\FOSRestBundle;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CandidateController
 */
class CandidateController extends FOSRestBundle
{
    /**
     * @param Request $request
     *
     * @return View
     */
    public function postCandidateAction(Request $request)
    {
        $candidate = new Candidate();
        $form = $this->container->get('form.factory')->create(new CandidateType(), $candidate, []);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $fileHandler = $this->container->get('ardemis_mainbundle.service.filehandler');
            $filesUploaded = $fileHandler->handleUploadedFiles(["cv" => $candidate->getCv(), "motivation" => $candidate->getMotivation()]);

            $candidate->setCv($filesUploaded['cv']);
            $candidate->setMotivation($filesUploaded['motivation']);

            $em = $this->container->get('doctrine.orm.entity_manager');

            try {
                $em->persist($candidate);
                $em->flush();
            } catch (\Exception $e) {
                $em->rollback();
            }

            $response = new Response();
            $response->setStatusCode('201');

            return $response;
        }

        return View::create($form, 400);
    }
}
