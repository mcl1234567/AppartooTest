<?php

/* AcmeUserBundle:Default:profil.html.twig */
class __TwigTemplate_72823e6c494e9388cd13724b2945d3ce25bdb78f1568f8ff2264b4e53e5d4b6f extends Twig_Template
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
        echo "Profil";
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

    <!-- Affichage du formulaire du profil avec les variables définies -->
    <form action=\"profil-modified\" method=\"post\">
      <input id=\"id\" type=\"hidden\" name=\"id\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()), "html", null, true);
        echo "\" /> <br />

      <label for=\"email\">Email</label>
      <input id=\"email\" type=\"text\" name=\"email\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["profil_email"]) ? $context["profil_email"] : $this->getContext($context, "profil_email")), "html", null, true);
        echo "\" /> <br />

      <label for=\"adresse\">Adresse</label>
      <input id=\"adresse\" type=\"text\" name=\"adresse\"  value=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["profil_adresse"]) ? $context["profil_adresse"] : $this->getContext($context, "profil_adresse")), "html", null, true);
        echo "\" /> <br />

      <label for=\"tel\">Téléphone</label>
      <input type=\"text\" name=\"tel\"  value=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["profil_telephone"]) ? $context["profil_telephone"] : $this->getContext($context, "profil_telephone")), "html", null, true);
        echo "\" /> <br />

      <label for=\"site\">Site web</label>
      <input type=\"text\" name=\"site\"  value=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["profil_siteweb"]) ? $context["profil_siteweb"] : $this->getContext($context, "profil_siteweb")), "html", null, true);
        echo "\" /> <br /><br />

      <input type=\"submit\"  value=\"Modifier le profil\" /> <br />
    </form>
  </div>

<!-- fin body -->
";
    }

    public function getTemplateName()
    {
        return "AcmeUserBundle:Default:profil.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 27,  78 => 24,  72 => 21,  66 => 18,  60 => 15,  53 => 11,  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
