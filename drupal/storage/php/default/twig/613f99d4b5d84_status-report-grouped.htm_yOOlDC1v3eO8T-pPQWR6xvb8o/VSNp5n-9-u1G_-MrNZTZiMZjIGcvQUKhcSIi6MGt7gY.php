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

/* core/modules/system/templates/status-report-grouped.html.twig */
class __TwigTemplate_20bdb1dfd60b4a91da03f7f9b6c1125af942e1fab80325ee1c66c8c52a5ae213 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/drupal.collapse"), "html", null, true);
        echo "

<div>
  ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["grouped_requirements"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 23
            echo "    <div>
      <h3 id=\"";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["group"], "type", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["group"], "title", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            echo "</h3>
      ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["group"], "items", [], "any", false, false, true, 25));
            foreach ($context['_seq'] as $context["_key"] => $context["requirement"]) {
                // line 26
                echo "        <details class=\"system-status-report__entry\" open>
          ";
                // line 28
                $context["summary_classes"] = [0 => "system-status-report__status-title", 1 => ((twig_in_filter(twig_get_attribute($this->env, $this->source,                 // line 30
$context["group"], "type", [], "any", false, false, true, 30), [0 => "warning", 1 => "error"])) ? (("system-status-report__status-icon system-status-report__status-icon--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["group"], "type", [], "any", false, false, true, 30), 30, $this->source))) : (""))];
                // line 33
                echo "          <summary";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["class" => ($context["summary_classes"] ?? null)]), "html", null, true);
                echo " role=\"button\">
            ";
                // line 34
                if (twig_get_attribute($this->env, $this->source, $context["requirement"], "severity_title", [], "any", false, false, true, 34)) {
                    // line 35
                    echo "              <span class=\"visually-hidden\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["requirement"], "severity_title", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
                    echo "</span>
            ";
                }
                // line 37
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["requirement"], "title", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
                echo "
          </summary>
          <div class=\"system-status-report__entry__value\">
            ";
                // line 40
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["requirement"], "value", [], "any", false, false, true, 40), 40, $this->source), "html", null, true);
                echo "
            ";
                // line 41
                if (twig_get_attribute($this->env, $this->source, $context["requirement"], "description", [], "any", false, false, true, 41)) {
                    // line 42
                    echo "              <div class=\"description\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["requirement"], "description", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
                    echo "</div>
            ";
                }
                // line 44
                echo "          </div>
        </details>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['requirement'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/status-report-grouped.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 49,  108 => 47,  100 => 44,  94 => 42,  92 => 41,  88 => 40,  81 => 37,  75 => 35,  73 => 34,  68 => 33,  66 => 30,  65 => 28,  62 => 26,  58 => 25,  52 => 24,  49 => 23,  45 => 22,  39 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/modules/system/templates/status-report-grouped.html.twig", "/var/www/public_html/core/modules/system/templates/status-report-grouped.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 22, "set" => 28, "if" => 34);
        static $filters = array("escape" => 19);
        static $functions = array("attach_library" => 19, "create_attribute" => 33);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['escape'],
                ['attach_library', 'create_attribute']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
