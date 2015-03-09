<?php

namespace Ardemis\MainBundle\API;

use Ardemis\MainBundle\Entity\Candidate;
use Ardemis\MainBundle\Form\CandidateType;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateController
 */
class CandidateController extends FOSRestController
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
     *              "required"=false,
     *          },
     *          {
     *              "name"="zipcode",
     *              "dataType"="string",
     *              "required"=false,
     *          },
     *          {
     *              "name"="city",
     *              "dataType"="string",
     *              "required"=true,
     *          },
     *          {
     *              "name"="phoneNumber",
     *              "dataType"="string",
     *              "required"=true,
     *          },
     *          {
     *              "name"="skypeUsername",
     *              "dataType"="string",
     *              "required"=false
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
     *          },
     *          {
     *              "name"="grade",
     *              "dataType"="string",
     *              "required"=true,
     *              "description"="Accepted values : grade.fr.bac, grade.fr.dut, grade.fr.bac_2, grade.fr.bac_3, grade.fr.bac_4, grade.fr.bac_5_plus, grade.fr.engineer, grade.uk.bachelor, grade.uk.bachelor_honour, grade.uk.master_science, grade.uk.master_art, grade.uk.master, grade.uk.doctorate"
     *          },
     *          {
     *              "name"="gradeComplement",
     *              "dataType"="string",
     *              "required"=false,
     *          },
     *          {
     *              "name"="income",
     *              "dataType"="string",
     *              "required"=true,
     *              "description"="Accepted values : candidate.income.1520, candidate.income.2030, candidate.income.3035, candidate.income.3545, candidate.income.4560, candidate.income.6080, candidate.income.80100, candidate.income.100PLUS, candidate.income.daily.300400"
     *          },
     *          {
     *              "name"="languages",
     *              "dataType"="string",
     *              "required"=true,
     *          },
     *          {
     *              "name"="keySkills",
     *              "dataType"="string",
     *              "required"=true,
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
     *              "name"="jobOffer",
     *              "dataType"="integer",
     *              "required"=true,
     *              "description"="ID of an offer related to this candidate"
     *          },
     *          {
     *              "name"="comments",
     *              "dataType"="string",
     *              "required"=false
     *          }
     *      }
     * )
     */
    public function postCandidateAction(Request $request)
    {
        $candidate = new Candidate();
        $form = $this->container->get('form.factory')->create(new CandidateType(), $candidate, []);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->container->get('doctrine.orm.entity_manager');

            try {
                $em->persist($candidate);
                $em->flush();
            } catch (\Exception $e) {
                $em->rollback();
            }

            $response = new JsonResponse(['message' => 'created']);
            $response->setStatusCode(Response::HTTP_CREATED);

            return $response;
        }

        $view = $this->view($form, 400)
            ->setFormat('json');

        return $this->handleView($view);
    }
}
