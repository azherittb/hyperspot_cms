<?php

/* modules/contrib/ds/templates/ds-3col-stacked-fluid.html.twig */
class __TwigTemplate_9557b02b1aee029dfb2a0f4930ba490da32addeaf1c07c444056eba9dcef69e5 extends Twig_Template
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
        $tags = array("set" => 27, "if" => 31);
        $filters = array("render" => 27);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'if'),
                array('render'),
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

        // line 26
        echo "
";
        // line 27
        $context["left"] = $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["left"] ?? null));
        // line 28
        $context["middle"] = $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["middle"] ?? null));
        // line 29
        $context["right"] = $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["right"] ?? null));
        // line 30
        echo "
";
        // line 31
        if (((($context["left"] ?? null) &&  !($context["right"] ?? null)) || (($context["right"] ?? null) &&  !($context["left"] ?? null)))) {
            // line 32
            echo "  ";
            $context["layout_class"] = "group-one-sidebar";
        } elseif ((        // line 33
($context["left"] ?? null) && ($context["right"] ?? null))) {
            // line 34
            echo "  ";
            $context["layout_class"] = "group-two-sidebars";
        } elseif (        // line 35
($context["left"] ?? null)) {
            // line 36
            echo "  ";
            $context["layout_class"] = "group-sidebar-left";
        } elseif (        // line 37
($context["right"] ?? null)) {
            // line 38
            echo "  ";
            $context["layout_class"] = "group-sidebar-right";
        }
        // line 40
        echo "
<";
        // line 41
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["outer_wrapper"] ?? null), "html", null, true));
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["attributes"] ?? null), "addClass", array(0 => ($context["layout_class"] ?? null), 1 => "ds-3col-stacked-fluid", 2 => "clearfix"), "method"), "html", null, true));
        echo ">

  ";
        // line 43
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["title_suffix"] ?? null), "contextual_links", array()), "html", null, true));
        echo "

  <";
        // line 45
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["header_wrapper"] ?? null), "html", null, true));
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["header_attributes"] ?? null), "addClass", array(0 => "group-header"), "method"), "html", null, true));
        echo ">
    ";
        // line 46
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["header"] ?? null), "html", null, true));
        echo "
  </";
        // line 47
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["header_wrapper"] ?? null), "html", null, true));
        echo ">

  ";
        // line 49
        if (($context["left"] ?? null)) {
            // line 50
            echo "    <";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["left_wrapper"] ?? null), "html", null, true));
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["left_attributes"] ?? null), "addClass", array(0 => "group-left"), "method"), "html", null, true));
            echo ">
      ";
            // line 51
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["left"] ?? null), "html", null, true));
            echo "
    </";
            // line 52
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["left_wrapper"] ?? null), "html", null, true));
            echo ">
  ";
        }
        // line 54
        echo "
  ";
        // line 55
        if (($context["middle"] ?? null)) {
            // line 56
            echo "    <";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["middle_wrapper"] ?? null), "html", null, true));
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["middle_attributes"] ?? null), "addClass", array(0 => "group-middle"), "method"), "html", null, true));
            echo ">
      ";
            // line 57
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["middle"] ?? null), "html", null, true));
            echo "
    </";
            // line 58
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["middle_wrapper"] ?? null), "html", null, true));
            echo ">
  ";
        }
        // line 60
        echo "
  ";
        // line 61
        if (($context["right"] ?? null)) {
            // line 62
            echo "    <";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["right_wrapper"] ?? null), "html", null, true));
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["right_attributes"] ?? null), "addClass", array(0 => "group-right"), "method"), "html", null, true));
            echo ">
      ";
            // line 63
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["right"] ?? null), "html", null, true));
            echo "
    </";
            // line 64
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["right_wrapper"] ?? null), "html", null, true));
            echo ">
  ";
        }
        // line 66
        echo "
  <";
        // line 67
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["footer_wrapper"] ?? null), "html", null, true));
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["footer_attributes"] ?? null), "addClass", array(0 => "group-footer"), "method"), "html", null, true));
        echo ">
    ";
        // line 68
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["footer"] ?? null), "html", null, true));
        echo "
  </";
        // line 69
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["footer_wrapper"] ?? null), "html", null, true));
        echo ">

</";
        // line 71
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["outer_wrapper"] ?? null), "html", null, true));
        echo ">
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/ds/templates/ds-3col-stacked-fluid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 71,  173 => 69,  169 => 68,  164 => 67,  161 => 66,  156 => 64,  152 => 63,  146 => 62,  144 => 61,  141 => 60,  136 => 58,  132 => 57,  126 => 56,  124 => 55,  121 => 54,  116 => 52,  112 => 51,  106 => 50,  104 => 49,  99 => 47,  95 => 46,  90 => 45,  85 => 43,  79 => 41,  76 => 40,  72 => 38,  70 => 37,  67 => 36,  65 => 35,  62 => 34,  60 => 33,  57 => 32,  55 => 31,  52 => 30,  50 => 29,  48 => 28,  46 => 27,  43 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contrib/ds/templates/ds-3col-stacked-fluid.html.twig", "/var/www/html/hyperspot/modules/contrib/ds/templates/ds-3col-stacked-fluid.html.twig");
    }
}
