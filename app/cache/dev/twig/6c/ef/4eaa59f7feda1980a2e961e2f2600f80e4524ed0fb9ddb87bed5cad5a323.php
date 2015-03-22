<?php

/* ::nav.html.twig */
class __TwigTemplate_6cef4eaa59f7feda1980a2e961e2f2600f80e4524ed0fb9ddb87bed5cad5a323 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- Template nav : Barre de navigation + module de connexion / inscription -->
<nav class=\"navbar navbar-default\" role=\"navigation\">
  <div class=\"container\">

    <!-- Brand and toggle get grouped for better mobile display
    ==========================================-->
    <div class=\"navbar-header\">
      <a class=\"navbar-brand\" href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("acme_accueil");
        echo "\">Appartoo</a>
    </div>

    <ul class=\"nav navbar-nav navbar-right\">

      <!-- Nom utilisateur et menu
      ==========================================-->
      <li class=\"dropdown\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
          ";
        // line 17
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 18
            echo "            > ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
            echo "
          ";
        } else {
            // line 20
            echo "            > Anonyme
          ";
        }
        // line 22
        echo "          <span class=\"caret\"></span>
        </a>

        <!-- Menu utilisateur connecté
        ==========================================-->
        <ul class=\"dropdown-menu\" role=\"menu\">
          <li><a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("acme_accueil");
        echo "\">Accueil</a></li>
          ";
        // line 29
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 30
            echo "            <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("profil_user");
            echo "\">Profil</a></li>
            <li><a href=\"";
            // line 31
            echo $this->env->getExtension('routing')->getPath("carnet_user");
            echo "\">Carnet</a></li>
            <li><a href=\"";
            // line 32
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">Se déconnecter</a></li>

        <!-- Menu utilisateur NON connecté
        ==========================================-->
          ";
        } else {
            // line 37
            echo "            <!-- Button trigger modal -->
            <li><a data-toggle=\"modal\" data-target=\"#myLoginModal\">Se connecter</a></li>
            <li><a href=\"register\">S'inscrire</a></li>
          ";
        }
        // line 41
        echo "        </ul>
      </li>
    </ul>
  </div><!-- /.container -->
</nav>
";
    }

    public function getTemplateName()
    {
        return "::nav.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 41,  83 => 37,  75 => 32,  71 => 31,  66 => 30,  64 => 29,  60 => 28,  52 => 22,  48 => 20,  42 => 18,  40 => 17,  28 => 8,  19 => 1,);
    }
}
