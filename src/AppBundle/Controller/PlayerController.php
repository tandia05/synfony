<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Player;

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

        //Chargement des joueurs depuis la base
        //Recuperation du ripositiry
        $repository = $this
                            ->getDoctrine()
                            ->getManager()
                            ->getRepository('AppBundle:Player');
        $players = $repository->findAll();


        return $this->render('player/index.html.twig', array(
           'title'      => $title,
           'message'    => 'Synfony semble formidable',
           'joueur1'    =>  $joueur1,
           'joueurs'    =>  $joueurs,
            'players'   =>  $players
            ));
    }


    /**
     * @Route("/Player/add", name="addPlayer")
     */
    public function addAction(Request $request)
    {
        $player = new Player();
        $player->setNom('Verrati');
        $player->setPrenom('marco');
        $player->setAge(25);

        // Recuperation de l'Entity Manager
        //objet permettant  in fine f'interagir avec la base
        $em = $this->getDoctrine()->getManager();
        // etape 1 : on persiste les données en base
        $em ->persist($player);
        // Etape 2 : Netoyage
        $em->flush();
        // on doit retourner une reponse HTTP au client
        return new Response('Joueur ajouté avec succé');

    }
}
