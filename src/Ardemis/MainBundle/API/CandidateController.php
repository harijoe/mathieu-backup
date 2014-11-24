<?php

namespace Ardemis\MainBundle\API;

use Ardemis\MainBundle\Entity\Candidate;
use Ardemis\MainBundle\Form\CandidateType;
use FOS\RestBundle\FOSRestBundle;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class CandidateController
 */
class CandidateController extends FOSRestBundle
{
    /**
     * @param Request $request
     *
     * @return View
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Posts a new candidate",
     *
     *      parameters={
     *          {
     *              "name"="firstname",
     *              "dataType"="string",
     *              "required"=true,
     *          },
     *          {
     *              "name"="lastname",
     *              "dataType"="string",
     *              "required"=true,
     *          },
     *          {
     *              "name"="address",
     *              "dataType"="string",
     *              "required"=true,
     *          },
     *          {
     *              "name"="zipcode",
     *              "dataType"="string",
     *              "required"=true,
     *          },
     *          {
     *              "name"="city",
     *              "dataType"="string",
     *              "required"=true,
     *          },
     *          {
     *              "name"="region",
     *              "dataType"="string",
     *              "required"=true,
     *          },
     *          {
     *              "name"="email",
     *              "dataType"="string",
     *              "required"=true,
     *          },
     *          {
     *              "name"="disponibility",
     *              "dataType"="string",
     *              "required"=true,
     *              "description"="Accepted values : candidate.dispo.immediate, candidate.dispo.onemonth, candidate.dispo.twomonth, candidate.dispo.threemonth"
     *          },
     *          {
     *              "name"="disponibilityNegociable",
     *              "dataType"="boolean",
     *              "required"=true,
     *          },
     *          {
     *              "name"="experience",
     *              "dataType"="string",
     *              "required"=true,
     *              "description"="Accepted values : candidate.exp.novice, candidate.exp.junior, candidate.exp.intermediaire, candidate.exp.confirm, candidate.exp.senior"
     *          },
     *          {
     *              "name"="mobility",
     *              "dataType"="string",
     *              "required"=true,
     *              "description"="Accepted values : candidate.mobility.departement, candidate.mobility.regional, candidate.mobility.national, candidate.mobility.international"
     *          },
     *          {
     *              "name"="mobilityComplement",
     *              "dataType"="string",
     *              "required"=false,
     *
     *          },
     *          {
     *              "name"="grade",
     *              "dataType"="string",
     *              "required"=true,
     *              "description"="Accepted values : grade.fr.bac, grade.fr.dut, grade.fr.bac_2, grade.fr.bac_3, grade.fr.bac_4, grade.fr.bac_5_plus, grade.fr.engineer (more to come)"
     *          },
     *          {
     *              "name"="gradeComplement",
     *              "dataType"="string",
     *              "required"=false,
     *
     *          },
     *          {
     *              "name"="income",
     *              "dataType"="string",
     *              "required"=true,
     *              "description"="Accepted values : candidate.income.1520, candidate.income.2030, candidate.income.3035, candidate.income.3545, candidate.income.4560, candidate.income.6080, candidate.income.80100, candidate.income.100PLUS"
     *          },
     *          {
     *              "name"="languages",
     *              "dataType"="string",
     *              "required"=true,
     *
     *          },
     *          {
     *              "name"="keySkills",
     *              "dataType"="string",
     *              "required"=false,
     *
     *          },
     *          {
     *              "name"="cv",
     *              "dataType"="file",
     *              "required"=true,
     *              "description"="mime types : application/pdf, application/x-pdf (can add more just ask)"
     *          },
     *          {
     *              "name"="motivation",
     *              "dataType"="file",
     *              "required"=true,
     *              "description"="mime types : application/pdf, application/x-pdf (can add more just ask)"
     *          },
     *          {
     *              "name"="handicap",
     *              "dataType"="boolean",
     *              "required"=true,
     *          },
     *      }
     * )
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
