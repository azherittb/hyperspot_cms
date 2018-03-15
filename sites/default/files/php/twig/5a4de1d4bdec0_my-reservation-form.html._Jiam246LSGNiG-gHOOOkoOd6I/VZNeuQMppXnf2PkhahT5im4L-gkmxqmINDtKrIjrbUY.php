<?php

/* modules/custom/hyperspot_core/templates/my-reservation-form.html.twig */
class __TwigTemplate_754896319a4eb40224b0c4b28706247fdbcd2cfccdb80d7206a6187121f0a1e9 extends Twig_Template
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
        $filters = array("without" => 24);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array(),
                array('without'),
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
\t<div class=\"row\">
\t   <div class=\"col-md-12 profilereservation\">
\t   <h3>Be Our Guest</h3>
          <h1> ";
        // line 5
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "restaurant", array()), "#value", array(), "array"), "html", null, true));
        echo "</h1>
\t\t   <p>Booking a table online is easy and takes just a couple of minutes.</p>
        </div>
\t   <div class=\"col-md-6 namedate\">          
\t\t";
        // line 9
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["form"] ?? null), "date", array()), "html", null, true));
        echo "
\t\t</div>
\t\t<div class=\"col-md-6 namearrival\"> 
\t\t";
        // line 12
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["form"] ?? null), "arrival", array()), "html", null, true));
        echo "
        </div>
        <div class=\"col-md-12 nameperson\">          
\t\t";
        // line 15
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["form"] ?? null), "person", array()), "html", null, true));
        echo "
\t\t</div>
\t\t <div class=\"col-md-12 nameaction\">          
\t\t";
        // line 18
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["form"] ?? null), "actions", array()), "html", null, true));
        echo "
\t\t</div>
\t\t<div class=\"clearfix\"></div>
\t</div>
</div>

";
        // line 24
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_without(($context["form"] ?? null), "restaurant", "date", "arrival", "person", "actions"), "html", null, true));
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/custom/hyperspot_core/templates/my-reservation-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 24,  74 => 18,  68 => 15,  62 => 12,  56 => 9,  49 => 5,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/hyperspot_core/templates/my-reservation-form.html.twig", "/var/www/html/hyperspot/modules/custom/hyperspot_core/templates/my-reservation-form.html.twig");
    }
}
