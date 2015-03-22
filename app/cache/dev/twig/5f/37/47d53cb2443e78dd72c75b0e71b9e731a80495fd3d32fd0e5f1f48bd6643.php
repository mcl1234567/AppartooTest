<?php

/* ::base.html.twig */
class __TwigTemplate_5f3747d53cb2443e78dd72c75b0e71b9e731a80495fd3d32fd0e5f1f48bd6643 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'styles' => array($this, 'block_styles'),
            'nav' => array($this, 'block_nav'),
            'body' => array($this, 'block_body'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
  <head>
    <meta charset=\"UTF-8\" />
      <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
      <meta name=\"description\" content=\"\">
      <meta name=\"author\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <!-- Cascade Stylesheets
    =========================================================-->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\" ";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo " \"> <!-- Bootstrap core CSS -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\" ";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/blog.css"), "html", null, true);
        echo " \"> <!-- Blog Bootstrap -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\" ";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/modif_css.css"), "html", null, true);
        echo " \"> <!-- bidouillage Bootstrap -->

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
        <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
      <![endif]-->

    <link rel=\"icon\" href=\"\">
    ";
        // line 25
        $this->displayBlock('styles', $context, $blocks);
        // line 26
        echo "  </head>
  <body>
    ";
        // line 28
        $this->displayBlock('nav', $context, $blocks);
        // line 29
        echo "    ";
        $this->displayBlock('body', $context, $blocks);
        // line 30
        echo "
    <!-- Module de connexion
    ===============================================================-->
    <div class=\"modal fade\" id=\"myLoginModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
      <div class=\"modal-dialog\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
            <h4 class=\"modal-title\" id=\"myModalLabel\">Connexion</h4>
          </div>
          <div class=\"modal-body\">
            ";
        // line 41
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 59
        echo "          </div>
        </div>
      </div>
    </div>
    <!-- Fin Module de connexion -->

    <!-- JavaScript
      Placed at the end of the document so the pages load faster
    =========================================================-->
    <script type=\"text/javascript\" src=\"//code.jquery.com/jquery-2.1.1.min.js\"></script>
    <!-- Bootstrap core JavaScript -->
    <script type=\"text/javascript\" src=\" ";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo " \"></script>
    <!-- Holder - client side image placeholders -->
      <script src=\" ";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/docs.min.js"), "html", null, true);
        echo " \"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src=\" ";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/ie10-viewport-bug-workaround.js"), "html", null, true);
        echo " \"></script>
      <!-- Ajout des cripts supplémentaires dans les templates qui héritent -->
    ";
        // line 76
        $this->displayBlock('scripts', $context, $blocks);
        // line 77
        echo "  </body>
</html>
";
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
    }

    // line 25
    public function block_styles($context, array $blocks = array())
    {
    }

    // line 28
    public function block_nav($context, array $blocks = array())
    {
        $this->env->loadTemplate("::nav.html.twig")->display($context);
    }

    // line 29
    public function block_body($context, array $blocks = array())
    {
    }

    // line 41
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 42
        echo "        ";
        if ($this->getAttribute((isset($context["fosuser_var"]) ? $context["fosuser_var"] : $this->getContext($context, "fosuser_var")), "error", array())) {
            // line 43
            echo "          <div class=\"alert alert-warning msg_mc\" role=\"alert\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array()), "security"), "html", null, true);
            echo "</div>
        ";
        }
        // line 45
        echo "
        <form action=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\"  class=\"form_mc\">
          <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["fosuser_var"]) ? $context["fosuser_var"] : $this->getContext($context, "fosuser_var")), "csrf_token", array()), "html", null, true);
        echo "\" /> <br /><br />

          <label for=\"username\">Nom d'utilisateur : </label>
          <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["fosuser_var"]) ? $context["fosuser_var"] : $this->getContext($context, "fosuser_var")), "last_username", array()), "html", null, true);
        echo "\" required=\"required\" placeholder=\"pseudonyme\" />
          <br /><br />

          <label for=\"password\">Mot de passe : </label>
          <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" placeholder=\"*******\"  /> <br /><br />

          <p> <button type=\"submit\" id=\"_submit\" name=\"_submit\" class=\"btn btn-primary btn-lg\">Connexion</button> </p>
        </form>
        ";
    }

    // line 76
    public function block_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 76,  171 => 50,  165 => 47,  161 => 46,  158 => 45,  152 => 43,  149 => 42,  146 => 41,  141 => 29,  135 => 28,  130 => 25,  125 => 9,  119 => 77,  117 => 76,  112 => 74,  107 => 72,  102 => 70,  89 => 59,  87 => 41,  74 => 30,  71 => 29,  69 => 28,  65 => 26,  63 => 25,  51 => 16,  47 => 15,  43 => 14,  35 => 9,  25 => 1,);
    }
}
