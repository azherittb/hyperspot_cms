<?php

/* modules/custom/hyperspot_core/templates/my-event-confirm.html.twig */
class __TwigTemplate_2c182bb3e6fbe9128e35d53a2ff83f1b597e611de64682474751e91d65db2c45 extends Twig_Template
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
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array(),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-12 profilereservation\">
            <h3>Thank You For</h3>
            <h2>Booking</h2>
            <p>For just a kindly reminder, here is a short summary about your reservation</p>
        </div>
        <div class=\"col-md-12 namedate\">          
            ";
        // line 9
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["items"] ?? null), "date", array()), "html", null, true));
        echo "
        </div>
        <div class=\"col-md-12 namearrival\"> 
            ";
        // line 12
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["items"] ?? null), "arrival", array()), "html", null, true));
        echo "
        </div>
        <div class=\"col-md-12 nameperson\">          
            ";
        // line 15
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["items"] ?? null), "persons", array()), "html", null, true));
        echo "
        </div>

        <div class=\"col-md-12 seeyou\">          
            <h3>See you at the</h3>
            <h2>Specified Time</h2>
        </div>

        <div class=\"col-md-12 done\">          
            ";
        // line 24
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["items"] ?? null), "done", array()), "html", null, true));
        echo "
        </div>

        <div class=\"clearfix\"></div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/hyperspot_core/templates/my-event-confirm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 24,  65 => 15,  59 => 12,  53 => 9,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/hyperspot_core/templates/my-event-confirm.html.twig", "/var/www/html/hyperspot/modules/custom/hyperspot_core/templates/my-event-confirm.html.twig");
    }
}
