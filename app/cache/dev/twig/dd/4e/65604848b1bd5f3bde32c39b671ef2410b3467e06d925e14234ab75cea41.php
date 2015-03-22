<?php

/* AcmeUserBundle:Default:ajout_contact.html.twig */
class __TwigTemplate_dd4e65604848b1bd5f3bde32c39b671ef2410b3467e06d925e14234ab75cea41 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("AcmeUserBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Carnet d'adresses";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<!-- Redéclaration du bloc body -->

  <div style=\"margin: auto; width: 700px;\">

    <!-- Affichage de la variable libelle -->
    <h3 class=\"h3_mc\">";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["libelle"]) ? $context["libelle"] : $this->getContext($context, "libelle")), "html", null, true);
        echo "</h3><br />

    <form action=\"nouveau-contact\" method=\"post\">
      <input id=\"id\" type=\"hidden\" name=\"id\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()), "html", null, true);
        echo "\" /> <br />

      <label for=\"email\">Entrer un nom de l'utilisateur (inscrit sur le site) :</label>
      <input id=\"nom\" type=\"text\" name=\"nom\"  /> <br /> <br />

      <input type=\"submit\" value=\"Ajouter\" /> <br /> <br />
    </form>

    <!-- Lien contenant le nom d'une route -->
    <a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("carnet_user");
        echo "\" >Retour au carnet d'adresse</a>

  </div>

<!-- fin body -->
";
    }

    public function getTemplateName()
    {
        return "AcmeUserBundle:Default:ajout_contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 23,  59 => 14,  53 => 11,  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
