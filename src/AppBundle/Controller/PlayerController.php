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
        //Recuperation du ripositiry pour les operations lecture 
        //le repository est un instrument de  (objet ) permettant de recuper
        // les donn"es . I propose de nombreux methodes de recuperation de données
        // exemple( finAll; findById)
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
     * @Route("/test/player/add", name="testaddPlayer")
     */
    public function testAddAction(Request $request)
    {
        $player = new Player();
        $player->setNom('diego');
        $player->setPrenom('maradona');
        $player->setAge(54);
        $player->setNumeroMaillot(10);

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

    /**
     * @Route("/player/add", name="addPlayer")
     */
    public function addAction(Request $request)
    {
        //Determiner si cette route a ete demande en  POST ou en GET
        if($request->isMethod('POST'))
        {
            $player = new Player();
            $player->setNom($request->get('nom'));
            $player->setPrenom($request->get('prenom'));
            $player->setAge($request->get('age'));
            $player->setNumeroMaillot($request->get('numero_maillot'));

            $em = $this->getDoctrine()->getManager();
            $em ->persist($player);
            $em->flush();

            //Redirection vers la page d'accueil
            return $this->redirectToRoute('homepage');
        }
        else
        {
             echo 'requete en GET';
             // si la requete est en GET on affiche le formulaire
            return $this->render('player/forms/add.html.twig');
        }
       
    }


    /**
     * @Route("/player/{id}", name="detail_player")
     */

    public function detailAction($id)
    {
        $repository = $this
                            ->getDoctrine()// Recupere l'ORM
                            ->getManager()//Outil pour operation en ecriture
                            ->getRepository('AppBundle:Player'); //Outil pour operation en ecriture
        // Recuperation de l'id
        //$id = $request->query->get('id'); // Renvoi null
        //var_dump($id);
        //Trouver le joueur correspondant  en base de données
        $player = $repository->find($id); // Findd == findById() cherche toujours dans la colonne id de la table
       //var_dump($player);
        // Afficher les informations via une vue/ template(ichier twig)

        return $this->render('player/detail.html.twing',array(
                    'player'    =>$player
                    ));
    }



}
