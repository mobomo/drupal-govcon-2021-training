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

/* themes/contrib/lark/templates/menu-local-tasks.html.twig */
class __TwigTemplate_be728b2eedd091a51d1bcb92cac96dd34e7f7b39a3d64d233044b5e52e5e80f8 extends \Twig\Template
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
        // line 16
        if (($context["primary"] ?? null)) {
            // line 17
            echo "  ";
            $context["items"] = [];
            // line 18
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["primary"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 19
                echo "    ";
                $context["items"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["items"] ?? null), 19, $this->source), [0 => ["href" => twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 =                 // line 20
$context["item"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["#link"] ?? null) : null), "url", [], "any", false, false, true, 20), "label" => twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 =                 // line 21
$context["item"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["#link"] ?? null) : null), "title", [], "any", false, false, true, 21), "active" => (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b =                 // line 22
$context["item"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["#active"] ?? null) : null), "hide" => ((twig_get_attribute($this->env, $this->source, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 =                 // line 23
$context["item"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["#access"] ?? null) : null), "isAllowed", [], "any", false, false, true, 23)) ? (true) : (false))]]);
                // line 25
                echo "    ";
                $context["access"] = (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = $context["item"]) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["#access"] ?? null) : null);
                // line 26
                echo "  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "
  ";
            // line 28
            $context["data"] = ["type" => "primary", "items" =>             // line 30
($context["items"] ?? null)];
            // line 32
            echo "
  <nav class=\"drupal-tabs drupal-tabs--primary\" role=\"navigation\">
    <ul class=\"drupal-tabs__items\">
      ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "items", [], "any", false, false, true, 35));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 36
                echo "        ";
                if (twig_get_attribute($this->env, $this->source, $context["item"], "hide", [], "any", false, false, true, 36)) {
                    // line 37
                    echo "          <li class=\"drupal-tabs__item\">
            <a href=\"";
                    // line 38
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                    echo "\" class=\"drupal-tabs__link";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, $context["item"], "active", [], "any", false, false, true, 38)) ? (" drupal-tabs__link--active") : ("")));
                    echo "\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                    echo "</a>
          </li>
        ";
                }
                // line 41
                echo "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "    </ul>
  </nav>

";
        }
        // line 46
        if (($context["secondary"] ?? null)) {
            // line 47
            echo "
  <span id=\"secondary-tabs-title\" class=\"visually-hidden\">";
            // line 48
            echo t("Secondary tabs", array());
            echo "</span>
  <nav role=\"navigation\" class=\"is-horizontal\" aria-labelledby=\"secondary-tabs-title\" data-drupal-nav-tabs>
    <ul class=\"drupal-tabs drupal-tabs--secondary clearfix\">";
            // line 50
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary"] ?? null), 50, $this->source), "html", null, true);
            echo "</ul>
  </nav>

";
        }
    }

    public function getTemplateName()
    {
        return "themes/contrib/lark/templates/menu-local-tasks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 50,  113 => 48,  110 => 47,  108 => 46,  102 => 42,  96 => 41,  86 => 38,  83 => 37,  80 => 36,  76 => 35,  71 => 32,  69 => 30,  68 => 28,  65 => 27,  59 => 26,  56 => 25,  54 => 23,  53 => 22,  52 => 21,  51 => 20,  49 => 19,  44 => 18,  41 => 17,  39 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/lark/templates/menu-local-tasks.html.twig", "/var/www/public_html/themes/contrib/lark/templates/menu-local-tasks.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 16, "set" => 17, "for" => 18, "trans" => 48);
        static $filters = array("merge" => 19, "escape" => 38);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for', 'trans'],
                ['merge', 'escape'],
                []
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
