<?php

/* AcmeUserBundle:Default:suppression_contact.html.twig */
class __TwigTemplate_3281896a506f3b0c9d9e4429295834c16daea6016e02965f292fd162806a7782 extends Twig_Template
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

      <!-- Formulaire et liste de tous les contacts -->
      <form method=\"post\" action=\"suppression-contact\">

        <!-- Boucle -->
        ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["contacts"]) ? $context["contacts"] : $this->getContext($context, "contacts")));
        foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
            // line 18
            echo "          <input type=\"radio\" name=\"carnet_id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "id", array()), "html", null, true);
            echo "\">
          Nom du contact : ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "username", array()), "html", null, true);
            echo " <br />
          Email du contact : ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "email", array()), "html", null, true);
            echo " <br /> <br />
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "
        <input type=\"submit\" value=\"Supprimer\" />
      </form>

      <br />

      <!-- Lien contenant le nom d'une route -->
      <a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("carnet_user");
        echo "\" >Retour au carnet</a>

    </form>
  </div>

";
    }

    public function getTemplateName()
    {
        return "AcmeUserBundle:Default:suppression_contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 29,  83 => 22,  75 => 20,  71 => 19,  66 => 18,  62 => 17,  53 => 11,  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
