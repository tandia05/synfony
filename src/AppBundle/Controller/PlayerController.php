<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlayerController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */

    public function indexAction(Request $request)
    {
        $title = 'Liste des joueurs';

        $joueur1 = ['nom' => 'Bonucci', 'prenom' => 'leo', 'age' => 25];
        $joueur2 = ['nom' => 'Diego', 'prenom' => 'maradona', 'age' => 55];
        $joueur3 = ['nom' => 'Cristiano', 'prenom' => 'cristiano', 'age' => 25];

        $joueurs = [ $joueur1,  $joueur2,  $joueur3];


        return $this->render('player/index.html.twig', array(
           'title'      => $title,
           'message'    => 'Synfony semble formidable',
           'joueur1'    =>  $joueur1,
           'joueurs'    =>  $joueurs));
    }

}
