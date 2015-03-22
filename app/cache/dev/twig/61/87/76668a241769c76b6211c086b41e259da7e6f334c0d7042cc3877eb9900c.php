<?php

/* AcmeUserBundle:Default:echec.html.twig */
class __TwigTemplate_618776668a241769c76b6211c086b41e259da7e6f334c0d7042cc3877eb9900c extends Twig_Template
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
        echo "</h3>
    <br />

    <!-- Affichage de la variable message -->
    ";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
        echo "

    <br /> <br />

    <!-- Lien contenant le nom d'une route -->
    <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("carnet_user");
        echo "\">Retour au carnet</a>

  </div>

<!-- fin body -->
";
    }

    public function getTemplateName()
    {
        return "AcmeUserBundle:Default:echec.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 20,  60 => 15,  53 => 11,  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
