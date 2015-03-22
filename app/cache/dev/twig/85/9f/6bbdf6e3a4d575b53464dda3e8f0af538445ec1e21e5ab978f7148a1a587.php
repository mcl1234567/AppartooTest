<?php

/* AcmeUserBundle:Default:echec_ajout_contact.html.twig */
class __TwigTemplate_859f6bbdf6e3a4d575b53464dda3e8f0af538445ec1e21e5ab978f7148a1a587 extends Twig_Template
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

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "  <div style=\"margin: auto; width: 700px;\">
  <h3 class=\"h3_mc\">";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["libelle"]) ? $context["libelle"] : $this->getContext($context, "libelle")), "html", null, true);
        echo "</h3><br />
    ";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["nomContact"]) ? $context["nomContact"] : $this->getContext($context, "nomContact")), "html", null, true);
        echo " n'est pas enregistré sur la plateforme.

  </div>

";
    }

    public function getTemplateName()
    {
        return "AcmeUserBundle:Default:echec_ajout_contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 7,  49 => 6,  46 => 5,  43 => 4,  37 => 3,  11 => 1,);
    }
}
