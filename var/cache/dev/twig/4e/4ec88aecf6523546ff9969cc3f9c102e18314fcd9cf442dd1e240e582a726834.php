<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* User/sing-up.html.twig */
class __TwigTemplate_085ecdc2a06b82e716a026792b6516afddaabc3a28115f58a5c9e819017a6133 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "User/sing-up.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "User/sing-up.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "User/sing-up.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "S'inscrire";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
  ";
        // line 7
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 7, $this->source); })()), "user", [], "any", false, false, false, 7)) {
            // line 8
            echo "
   <h1>Inscription</h1>
    ";
            // line 10
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formAddUser"]) || array_key_exists("formAddUser", $context) ? $context["formAddUser"] : (function () { throw new RuntimeError('Variable "formAddUser" does not exist.', 10, $this->source); })()), 'form_start');
            echo "

    ";
            // line 12
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formAddUser"]) || array_key_exists("formAddUser", $context) ? $context["formAddUser"] : (function () { throw new RuntimeError('Variable "formAddUser" does not exist.', 12, $this->source); })()), "name", [], "any", false, false, false, 12), 'row', ["attr" => ["placeholder" => "Votre nom"]]);
            echo "

    ";
            // line 14
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formAddUser"]) || array_key_exists("formAddUser", $context) ? $context["formAddUser"] : (function () { throw new RuntimeError('Variable "formAddUser" does not exist.', 14, $this->source); })()), "mdp", [], "any", false, false, false, 14), 'row', ["attr" => ["placeholder" => "Choisir un mot de passe"]]);
            echo "

    ";
            // line 16
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formAddUser"]) || array_key_exists("formAddUser", $context) ? $context["formAddUser"] : (function () { throw new RuntimeError('Variable "formAddUser" does not exist.', 16, $this->source); })()), "email", [], "any", false, false, false, 16), 'row', ["attr" => ["placeholder" => "Votre email"]]);
            echo "

    <button type=\"submit\" class=\"btn btn-success\">
        S'inscrire</button>

    ";
            // line 21
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formAddUser"]) || array_key_exists("formAddUser", $context) ? $context["formAddUser"] : (function () { throw new RuntimeError('Variable "formAddUser" does not exist.', 21, $this->source); })()), 'form_end');
            echo "

                        ";
        } else {
            // line 24
            echo "                        <div class=\"no-access bg-primary\">
                        <p> <i class=\"fas fa-user-times\"></i>  </p>
                        
                        <p>Seul l'administrateur peut accéder à cette page. <br> Si vous êtes l'administrateur, veuillez vous connecter en <a class=\"link\" href=\"sign-in\">cliquant ici</a> puis réessayer.</p>
                        <p>Sinon, vous pouvez vous dirigez vers la page d'accueil.</p>
                        <a class=\"btn btn-secondary\" href=\"";
            // line 29
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
            echo "\">Retour à la page d'accueil</a>
                        </div>


                        ";
        }
        // line 34
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "User/sing-up.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 34,  133 => 29,  126 => 24,  120 => 21,  112 => 16,  107 => 14,  102 => 12,  97 => 10,  93 => 8,  91 => 7,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}S'inscrire{% endblock %}

{% block body %}

  {% if app.user %}

   <h1>Inscription</h1>
    {{ form_start(formAddUser) }}

    {{ form_row(formAddUser.name, {'attr': {'placeholder': 'Votre nom'}}) }}

    {{ form_row(formAddUser.mdp, {'attr': {'placeholder': 'Choisir un mot de passe'}}) }}

    {{ form_row(formAddUser.email, {'attr': {'placeholder': 'Votre email'}}) }}

    <button type=\"submit\" class=\"btn btn-success\">
        S'inscrire</button>

    {{ form_end(formAddUser) }}

                        {% else %}
                        <div class=\"no-access bg-primary\">
                        <p> <i class=\"fas fa-user-times\"></i>  </p>
                        
                        <p>Seul l'administrateur peut accéder à cette page. <br> Si vous êtes l'administrateur, veuillez vous connecter en <a class=\"link\" href=\"sign-in\">cliquant ici</a> puis réessayer.</p>
                        <p>Sinon, vous pouvez vous dirigez vers la page d'accueil.</p>
                        <a class=\"btn btn-secondary\" href=\"{{ path('home') }}\">Retour à la page d'accueil</a>
                        </div>


                        {% endif %}


{% endblock %}", "User/sing-up.html.twig", "/Applications/MAMP/htdocs/blog/templates/User/sing-up.html.twig");
    }
}
