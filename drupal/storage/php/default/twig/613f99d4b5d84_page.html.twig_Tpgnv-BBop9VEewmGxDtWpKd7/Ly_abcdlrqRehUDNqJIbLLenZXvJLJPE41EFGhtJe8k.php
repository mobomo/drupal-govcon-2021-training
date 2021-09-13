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

/* themes/contrib/lark/templates/page.html.twig */
class __TwigTemplate_b4a266fd72d04740474d3f9e9152ff734b117d498997d55cdffb55279e5cea4e extends \Twig\Template
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
        // line 1
        echo "<div class=\"l-page\">
  <div class=\"l-banner\">
    <div class=\"site-banner\">
      ";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 4), 4, $this->source), "html", null, true);
        echo "
    </div>
  </div>
  <div class=\"grid--full\">
    <div class=\"col l-sidebar\">
      <div class=\"l-sidebar__container\">
        <div>
          <a class=\"button button--sidebar\" href=\"/node/add\"><span class=\"fas fa-plus\"></span> Add Content</a>
        </div>
        <nav class=\"sidebar-menu\">
          <div class=\"h6 sidebar-menu__title\">Menu</div>
          <ul class=\"sidebar-menu__parent-list\">
            <li class=\"sidebar-menu__item\">
              <a class=\"sidebar-menu__item-link\" href=\"/admin/content\" title=\"Content\">Content</a>
            </li>
            <li class=\"sidebar-menu__item\">
              <a class=\"sidebar-menu__item-link\" href=\"/admin/people\" title=\"People\">People</a>
            </li>
            <li class=\"sidebar-menu__item\">
              <a class=\"sidebar-menu__item-link\" href=\"/admin/structure\" title=\"Structure\">Structure</a>
            </li>
            <li class=\"sidebar-menu__item\">
              <a class=\"sidebar-menu__item-link\" href=\"/admin/help\" title=\"Help\">Help</a>
            </li>
            <li class=\"sidebar-menu__item\">
              <div class=\"sidebar-menu__moreless\">More</div>
              <ul class=\"sidebar-menu__sub-list\">
                <li class=\"sidebar-menu__item\">
                  <a class=\"sidebar-menu__item-link\" href=\"/admin/reports\" title=\"Reports\">Reports</a>
                </li>
                <li class=\"sidebar-menu__item\">
                  <a class=\"sidebar-menu__item-link\" href=\"/admin/config\" title=\"Configuration\">Configuration</a>
                </li>
                <li class=\"sidebar-menu__item\">
                  <a class=\"sidebar-menu__item-link\" href=\"/admin/modules\" title=\"Extend\">Extend</a>
                </li>
                <li class=\"sidebar-menu__item\">
                  <a class=\"sidebar-menu__item-link\" href=\"/admin/appearance\" title=\"Appearance\">Appearance</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <hr class=\"hr margin-lg--left\" />
        <div class=\"r-sidebar\">
          <div class=\"shortcuts\">
            ";
        // line 50
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["shortcuts"] ?? null), 50, $this->source), "html", null, true);
        echo "
          </div>
          ";
        // line 52
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
        echo "
        </div>
      </div>
    </div>
    <div class=\"col l-content\">
      ";
        // line 57
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
        echo "
      ";
        // line 58
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 58), 58, $this->source), "html", null, true);
        echo "
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/lark/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 58,  106 => 57,  98 => 52,  93 => 50,  44 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/lark/templates/page.html.twig", "/var/www/public_html/themes/contrib/lark/templates/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 4);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
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
