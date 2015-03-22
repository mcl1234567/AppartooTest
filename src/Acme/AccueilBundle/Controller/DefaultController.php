<?php

namespace Acme\AccueilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 *  Controleur gérant l'accueil de la plateforme.
 */
class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        // Pour la gestion du module de connexion / navigation
        // --------------------------------------------------------------------------------------------------------
            //Provient de -> FOSUserBundle/Controller/SecurityController.php
            // @var $session \Symfony\Component\HttpFoundation\Session\Session
        $session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        $csrfToken = $this->has('form.csrf_provider')
            ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        $fosuser_var = array('last_username' => $lastUsername, 'error' => $error, 'csrf_token' => $csrfToken);
        // --------------------------------------------------------------------------------------------------------

        // Récupération des objets utilisateurs de la BDD
        $manager = $this->getDoctrine()->getManager();
        $users = $manager->getRepository("AcmeUserBundle:User")->findAll();

        // Envoi des données au template avec les variables définies.
        return $this->render('AcmeAccueilBundle:Default:index.html.twig', array('fosuser_var' => $fosuser_var, 'users' => $users));
    }
}
