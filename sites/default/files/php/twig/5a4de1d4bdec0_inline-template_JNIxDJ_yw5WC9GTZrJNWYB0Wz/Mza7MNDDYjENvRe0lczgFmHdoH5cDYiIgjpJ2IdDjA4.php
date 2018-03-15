<?php

/* {# inline_template_start #}<div class="row">
<div class="col-md-6 col-sm-6">
{{ field_image }}
</div>
<div class="col-md-6 col-sm-6">
<h3>{{ title }} </h3>
<h5>{{ field_location }} </h5>
<div class="eventdatetime">
<span class="eventdate">
{{ field_date }}
</span>
<span class="eventtime">
{{ field_time }} 
</span>
</div>
{{ body }} 
<div class="thumbcheck">
<a class="checkarrow get_value_{{ nid }}  {{ nid }} like_us" href="#"><i class="fa fa-check"></i></a>
<a class="thumbsarrow get_thumb_value_{{ nid }}  {{ nid }} may_be" href="#"><i class="fa fa-thumbs-o-up"></i></a>
</div>
</div>
</div> */
class __TwigTemplate_cbe6d62f0a316aa96eb7eb63281931441a9018d10def3421c064225b65e8b4ad extends Twig_Template
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
        echo "<div class=\"row\">
<div class=\"col-md-6 col-sm-6\">
";
        // line 3
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["field_image"] ?? null), "html", null, true));
        echo "
</div>
<div class=\"col-md-6 col-sm-6\">
<h3>";
        // line 6
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true));
        echo " </h3>
<h5>";
        // line 7
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["field_location"] ?? null), "html", null, true));
        echo " </h5>
<div class=\"eventdatetime\">
<span class=\"eventdate\">
";
        // line 10
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["field_date"] ?? null), "html", null, true));
        echo "
</span>
<span class=\"eventtime\">
";
        // line 13
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["field_time"] ?? null), "html", null, true));
        echo " 
</span>
</div>
";
        // line 16
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["body"] ?? null), "html", null, true));
        echo " 
<div class=\"thumbcheck\">
<a class=\"checkarrow get_value_";
        // line 18
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["nid"] ?? null), "html", null, true));
        echo "  ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["nid"] ?? null), "html", null, true));
        echo " like_us\" href=\"#\"><i class=\"fa fa-check\"></i></a>
<a class=\"thumbsarrow get_thumb_value_";
        // line 19
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["nid"] ?? null), "html", null, true));
        echo "  ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["nid"] ?? null), "html", null, true));
        echo " may_be\" href=\"#\"><i class=\"fa fa-thumbs-o-up\"></i></a>
</div>
</div>
</div>";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}<div class=\"row\">
<div class=\"col-md-6 col-sm-6\">
{{ field_image }}
</div>
<div class=\"col-md-6 col-sm-6\">
<h3>{{ title }} </h3>
<h5>{{ field_location }} </h5>
<div class=\"eventdatetime\">
<span class=\"eventdate\">
{{ field_date }}
</span>
<span class=\"eventtime\">
{{ field_time }} 
</span>
</div>
{{ body }} 
<div class=\"thumbcheck\">
<a class=\"checkarrow get_value_{{ nid }}  {{ nid }} like_us\" href=\"#\"><i class=\"fa fa-check\"></i></a>
<a class=\"thumbsarrow get_thumb_value_{{ nid }}  {{ nid }} may_be\" href=\"#\"><i class=\"fa fa-thumbs-o-up\"></i></a>
</div>
</div>
</div>";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 19,  101 => 18,  96 => 16,  90 => 13,  84 => 10,  78 => 7,  74 => 6,  68 => 3,  64 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "{# inline_template_start #}<div class=\"row\">
<div class=\"col-md-6 col-sm-6\">
{{ field_image }}
</div>
<div class=\"col-md-6 col-sm-6\">
<h3>{{ title }} </h3>
<h5>{{ field_location }} </h5>
<div class=\"eventdatetime\">
<span class=\"eventdate\">
{{ field_date }}
</span>
<span class=\"eventtime\">
{{ field_time }} 
</span>
</div>
{{ body }} 
<div class=\"thumbcheck\">
<a class=\"checkarrow get_value_{{ nid }}  {{ nid }} like_us\" href=\"#\"><i class=\"fa fa-check\"></i></a>
<a class=\"thumbsarrow get_thumb_value_{{ nid }}  {{ nid }} may_be\" href=\"#\"><i class=\"fa fa-thumbs-o-up\"></i></a>
</div>
</div>
</div>", "");
    }
}
