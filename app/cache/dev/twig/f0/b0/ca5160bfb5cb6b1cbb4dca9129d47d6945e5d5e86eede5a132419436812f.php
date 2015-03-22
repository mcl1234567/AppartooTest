<?php

/* AcmeAccueilBundle:Default:index.html.twig */
class __TwigTemplate_f0b0ca5160bfb5cb6b1cbb4dca9129d47d6945e5d5e86eede5a132419436812f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
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
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Accueil";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<!-- Redéclaration du bloc body -->

    <div class=\"container\">
      <div class=\"blog-header\">
         <h1 class=\"\">Accueil</h1>
      </div>

      <div class=\"row\">
        <div class=\"col-sm-8 blog-main\">
          <div class=\"blog-post\">

          </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <div class=\"col-sm-3 col-sm-offset-1 blog-sidebar\">
          <div class=\"sidebar-module sidebar-module-inset\">
            <h4>About</h4>
            <p>Atiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class=\"sidebar-module\">
             <h4>Archives</h4>
             <ol class=\"list-unstyled\">
              <li><a href=\"#\">March 2014</a></li>
              <li><a href=\"#\">February 2014</a></li>
            </ol>
          </div>
        <div class=\"sidebar-module\">
          <h4>Elsewhere</h4>
          <ol class=\"list-unstyled\">
            <li><a href=\"https://github.com/morvancalmel\">GitHub</a></li>
            <li><a href=\"#\">Twitter</a></li>
            <li><a href=\"#\">Facebook</a></li>
          </ol>
        </div>
      </div><!-- /.blog-sidebar -->
    </div><!-- /.row -->
  </div><!-- /.container -->

<!-- fin body -->
";
    }

    public function getTemplateName()
    {
        return "AcmeAccueilBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
