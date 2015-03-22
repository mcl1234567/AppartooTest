<?php

/* AcmeUserBundle:Default:carnet.html.twig */
class __TwigTemplate_74294b3a6c968edef4c75fc4f63ce294468c070e12d637b768aadc458258cd0c extends Twig_Template
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

      <!-- Lister tous les contacts de l'utilisateur -->
      ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["contacts"]) ? $context["contacts"] : $this->getContext($context, "contacts")));
        foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
            // line 15
            echo "          Nom du contact : ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "username", array()), "html", null, true);
            echo " <br />
          Email du contact : ";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "email", array()), "html", null, true);
            echo " <br /> <br />
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "
      <!-- Lien contenant le nom d'une route -->
      <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("ajout_contact");
        echo "\" >Ajouter un contact</a>
      <br />

      <!-- Lien contenant le nom d'une route -->
      <a href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("supprimer_contact");
        echo "\" >Supprimer un contact</a>

    </form>
  </div>

<!-- fin body -->
";
    }

    public function getTemplateName()
    {
        return "AcmeUserBundle:Default:carnet.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 24,  80 => 20,  76 => 18,  68 => 16,  63 => 15,  59 => 14,  53 => 11,  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
