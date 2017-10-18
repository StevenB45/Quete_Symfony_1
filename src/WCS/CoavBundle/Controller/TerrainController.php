<?php

namespace WCS\CoavBundle\Controller;

use WCS\CoavBundle\Entity\Terrain;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Terrain controller.
 *
 * @Route("terrain")
 */
class TerrainController extends Controller
{
    /**
     * Lists all terrain entities.
     *
     * @Route("/", name="terrain_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $terrains = $em->getRepository('WCSCoavBundle:Terrain')->findAll();

        return $this->render('terrain/index.html.twig', array(
            'terrains' => $terrains,
        ));
    }

    /**
     * Finds and displays a terrain entity.
     *
     * @Route("/{id}", name="terrain_show")
     * @Method("GET")
     */
    public function showAction(Terrain $terrain)
    {

        return $this->render('terrain/show.html.twig', array(
            'terrain' => $terrain,
        ));
    }
}
