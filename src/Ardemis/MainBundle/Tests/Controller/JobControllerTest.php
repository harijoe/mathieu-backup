<?php

namespace Ardemis\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JobControllerTest extends WebTestCase
{

    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/offres/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /job/");
        $crawler = $client->click($crawler->selectLink('Create a new Job')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Save')->form(array(
            'ardemis_mainbundle_job[title]' => 'Titre',
            'ardemis_mainbundle_job[type]' => 'Type',
            'ardemis_mainbundle_job[location]' => 'Location',
            'ardemis_mainbundle_job[summary]' => 'Résumé',
            'ardemis_mainbundle_job[description]' => 'Description'
            //todo : add new fields
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('div:contains("Titre")')->count(), 'Missing element div:contains("Titre")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Save')->form(array(
            'ardemis_mainbundle_job[title]' => 'Foo',
            'ardemis_mainbundle_job[type]' => 'Type',
            'ardemis_mainbundle_job[location]' => 'Location',
            'ardemis_mainbundle_job[summary]' => 'Résumé',
            'ardemis_mainbundle_job[description]' => 'Description'
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('span:contains("Foo")')->count(), 'Missing element span:contains("FOo")');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
    }


}
