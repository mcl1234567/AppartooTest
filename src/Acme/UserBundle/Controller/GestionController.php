<?php

namespace Acme\UserBundle\Controller;

use Acme\UserBundle\Entity\Carnet;
use Acme\UserBundle\Entity\Profil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 * Controleur gérant le profil, le carnet et les utilisateurs de la plateforme.
 */
class GestionController extends Controller
{
    /**
     *  Permet d'initialiser les variables utilisateurs de la plateforme.
     */
    public function initUser(Request $request)
    {
      // Pour la gestion du module de connexion / navigation
      // --------------------------------------------------------------------------------------------------------
          // Provient de -> FOSUserBundle/Controller/SecurityController.php
          // @var $session \Symfony\Component\HttpFoundation\Session\Session
      $session = $request->getSession();

      // get the error if any (works with forward and redirect -- see below)
      if($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
        $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
      } elseif(null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
        $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
      } else {
        $error = null;
      }

      if(!$error instanceof AuthenticationException) {
        $error = null; // The value does not come from the security component.
      }

      // last username entered by the user
      $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);
      $csrfToken = $this->has('form.csrf_provider') ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate') : null;
      $fosuser_var = array('last_username' => $lastUsername, 'error' => $error, 'csrf_token' => $csrfToken);
      // --------------------------------------------------------------------------------------------------------

      // Récupération des utilisateurs inscrits dans la BDD
      $manager = $this->getDoctrine()->getManager();
      $users = $manager->getRepository("AcmeUserBundle:User")->findAll();

      return array($fosuser_var, $users);
    }

    /**
     *  Affichage du profil modifiable.
     */
    public function profilAction(Request $request)
    {
        list($fosuser_var, $users) = self::initUser($request);

        // Récupération de l'id du membre connecté.
        $user = $this->container->get('security.context')->getToken()->getUser();
        $idUser = $user->getId();

        // Récupération du profil dans la BDD
        $manager = $this->getDoctrine()->getManager();
        $profil = $manager->getRepository("AcmeUserBundle:Profil")->findOneByIdUser($idUser);

        // Si le profil n'existe pas, on le crée selon les données déjà enregistrées.
        if (!$profil) {
          $profil = new Profil();
          $profil->setIdUser($user->getId());
          $profil->setEmail($user->getEmail());
          $profil->setTelephone("");
          $profil->setAdresse("");
          $profil->setSiteweb("");

          $manager->persist($profil);
          $manager->flush();
        }

        // Envoi des données au template avec les variables définies.
        return $this->render('AcmeUserBundle:Default:profil.html.twig',
        array('libelle'           => "Profil",
              'fosuser_var'       => $fosuser_var,
              'profil_email'      => $profil->getEmail(),
              'profil_telephone'  => $profil->getTelephone(),
              'profil_adresse'    => $profil->getAdresse(),
              'profil_siteweb'    => $profil->getSiteweb()
          ));
    }

    /**
     *  Modification du profil vers la BDD.
     */
    public function profilModifiedAction(Request $request)
    {
        list($fosuser_var, $users) = self::initUser($request);

        // Récupération de l'id du membre connecté.
        $idUser = $this->container->get('security.context')->getToken()->getUser()->getId();

        // Récupération du profil dans la BDD
        $manager = $this->getDoctrine()->getManager();
        $profil = $manager->getRepository("AcmeUserBundle:Profil")->findOneByIdUser($idUser);

        // Echec :
        if(!$profil) {
          return $this->render('AcmeUserBundle:Default:echec.html.twig',
          array('libelle' => "Echec ",
                'message'=> ""
          ));
        }

        // Modification des données profil
        if(isset($_POST['site']) && isset($_POST['tel']) && isset($_POST['adresse']) && isset($_POST['email'])) {
          $profil->setEmail($_POST['email']);
          $profil->setTelephone($_POST['tel']);
          $profil->setAdresse($_POST['adresse']);
          $profil->setSiteweb($_POST['site']);
          $manager->flush();
        }

        // Envoi des données au template avec les variables définies.
        return $this->render('AcmeUserBundle:Default:profil.html.twig',
        array('libelle'           => "Profil",
              'fosuser_var'       => $fosuser_var,
              'profil_email'      => $profil->getEmail(),
              'profil_telephone'  => $profil->getTelephone(),
              'profil_adresse'    => $profil->getAdresse(),
              'profil_siteweb'    => $profil->getSiteweb()
          ));
    }

    /**
     * Affiche les contacts de l'utilisateur.
     */
    public function carnetAffichageAction(Request $request)
    {
        list($fosuser_var, $users) = self::initUser($request);

        // Récupération de l'id du membre connecté.
        $user = $this->container->get('security.context')->getToken()->getUser();

        // Si l'utilisateur n'est pas loggé
        if($user == "anon.") {
            // Envoi des données au template avec les variables définies.
            return $this->render('AcmeUserBundle:Default:echec.html.twig',
              array('libelle' => "Erreur",
                    'message'=> "Vous n'êtes pas connecté."
              ));
        }

        // Si l'utilisateur est loggé
        else {
            $idUser = $user->getId();

            // Récupération du carnet de l'utilisateur dans la BDD
            $manager = $this->getDoctrine()->getManager();
            $carnet = $manager->getRepository("AcmeUserBundle:Carnet")->findByIdUserCarnet($idUser);

            // Récupération des contacts de l'utilisateur dans la BDD
            $users = $manager->getRepository("AcmeUserBundle:User")->findAll();
            $contacts = array();
            for($i=0; $i<sizeof($users); $i++) {
              for($j=0; $j<sizeof($carnet); $j++) {
                if($users[$i]->getId() == $carnet[$j]->getIdUserContact()) {
                  array_push($contacts, $users[$i]);
                }
              }
            }

            $libelle = "";
            // Si le carnet est vide :
            if(!$carnet)  { $libelle = "Carnet d'adresses vide"; }
            else          { $libelle = "Carnet d'adresses"; }

            // Envoi des données au template avec les variables définies.
            return $this->render('AcmeUserBundle:Default:carnet.html.twig',
              array('libelle'     => $libelle,
                    'fosuser_var' => $fosuser_var,
                    'contacts'    => $contacts
              ));
        }
    }

    /**
     * Formulaire d'ajout d'un contact au carnet de l'utilisateur.
     */
    public function ajoutContactAction(Request $request)
    {
        list($fosuser_var, $users) = self::initUser($request);

        // Envoi des données au template avec les variables définies.
        return $this->render('AcmeUserBundle:Default:ajout_contact.html.twig',
        array('libelle'           => "Ajout d'un contact",
              'fosuser_var'       => $fosuser_var
        ));
    }

    /**
     * Ajout du nouveau contact ( qui doit être enregistré ) au carnet de l'utilisateur.
     * Puis affichage du carnet.
     */
    public function nouveauContactAction(Request $request)
    {
        list($fosuser_var, $users) = self::initUser($request);

        // Récupération du membre connecté.
        $user = $this->container->get('security.context')->getToken()->getUser();

        $manager = $this->getDoctrine()->getManager();

        // Si le champ est complété et que le contact n'est pas son propre profil.
        if(isset($_POST['nom']) && $user->getUsername() != $_POST['nom']) {
            // Récupération de l'id du connecté
            $idUser = $user->getId();

            // Récupération du contact à ajouter - de l'objet user dans la BDD -
            $contact = $manager->getRepository("AcmeUserBundle:User")->findOneByUsername($_POST['nom']);

            // Echec ajout contact
            if(!$contact) {
              // Envoi des données au template avec les variables définies.
              return $this->render('AcmeUserBundle:Default:echec.html.twig',
              array('libelle' => "Echec d'ajout du contact",
                    'message'=> $_POST['nom'] . " n'est pas enregistré sur la plateforme."
              ));
            }
            // Récupération du carnet existant et vérification si cela n'est pas un doublon.
            // Puis ajout du contact au carnet de l'utilisateur.
            else {
              $doublon = $manager->getRepository("AcmeUserBundle:Carnet")->findOneBy(
                      array('idUserCarnet' => $idUser, 'idUserContact' => $contact->getId()));
              if(!$doublon) {
                $nvContact = new Carnet();
                $nvContact->setIdUserCarnet($idUser);
                $nvContact->setIdUserContact($contact->getId());
                $manager->persist($nvContact);
                $manager->flush();
              }
              else {
                // Envoi des données au template avec les variables définies.
                return $this->render('AcmeUserBundle:Default:echec.html.twig',
                array('libelle' => "Doublon du contact",
                      'message'=> $_POST['nom'] . " est déjà enregistré dans le carnet."
                ));
              }
            }
        }
        else {
            // Envoi des données au template avec les variables définies.
            return $this->render('AcmeUserBundle:Default:echec.html.twig',
            array('libelle' => "Echec d'ajout du contact",
                  'message'=> "Vous ne pouvez pas vous ajouter vous-même."
            ));
        }

        // Affichage après ajout.
        return $this->carnetAffichageAction($request);
    }

    /**
     * Formulaire d'ajout d'un contact au carnet de l'utilisateur.
     */
    public function supprimerContactAction(Request $request)
    {
        list($fosuser_var, $users) = self::initUser($request);
        $manager = $this->getDoctrine()->getManager();

        // Récupération de l'id du membre connecté.
        $user = $this->container->get('security.context')->getToken()->getUser();
        $idUser = $user->getId();
        // Récupération du carnet de l'utilisateur dans la BDD
        $carnet = $manager->getRepository("AcmeUserBundle:Carnet")->findByIdUserCarnet($idUser);

        // Récupération des contacts du carnet de l'utilisateur dans la BDD.
        $users = $manager->getRepository("AcmeUserBundle:User")->findAll();
        $contacts = array();
        for($i=0; $i<sizeof($users); $i++) {
          for($j=0; $j<sizeof($carnet); $j++) {
            if($users[$i]->getId() == $carnet[$j]->getIdUserContact()) {
              array_push($contacts, $users[$i]);
            }
          }
        }

        $libelle = "";
        // Si le carnet est vide :
        if(!$carnet)  { $libelle = "Carnet d'adresses vide"; }
        else          { $libelle = "Carnet d'adresses"; }

        // Envoi des données au template avec les variables définies.
        return $this->render('AcmeUserBundle:Default:suppression_contact.html.twig',
        array('libelle'           => "Suppression d'un contact",
              'fosuser_var'       => $fosuser_var,
              'contacts'          => $contacts
        ));
    }

    /**
     * Supprimer un contact du carnet de l'utilisateur.
     */
    public function suppressionContactAction(Request $request)
    {
        list($fosuser_var, $users) = self::initUser($request);

        // Récupération de l'id du membre connecté.
        $idUser = $this->container->get('security.context')->getToken()->getUser()->getId();

        // Récupération du contact du carnet de l'utilisateur dans la BDD
        $manager = $this->getDoctrine()->getManager();
        $carnet = $manager->getRepository("AcmeUserBundle:Carnet")->findOneBy(array('idUserCarnet' => $idUser, 'idUserContact' => $_POST['carnet_id']));

        if(!$carnet) {
          return $this->render('AcmeUserBundle:Default:echec.html.twig',
          array('libelle' => "Echec de suppression du contact",
                'message' => ""
          ));
        }

        // Suppression du contact du carnet de l'utilisateur.
        $manager->remove($carnet);
        $manager->flush();

        // Affichage après suppression.
        return $this->carnetAffichageAction($request);
    }
}
