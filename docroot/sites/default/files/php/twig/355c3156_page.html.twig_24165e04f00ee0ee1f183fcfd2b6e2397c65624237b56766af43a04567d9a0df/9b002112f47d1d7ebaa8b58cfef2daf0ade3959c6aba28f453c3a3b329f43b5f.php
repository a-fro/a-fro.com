<?php

/* themes/formata/templates/page.html.twig */
class __TwigTemplate_7e8fcb36661238e39e96f56de50cef64ccccb530546189db41861611b890f925 extends Twig_Template
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
        $tags = array("if" => 9);
        $filters = array("t" => 8);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array('t'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 6
        echo "<div class=\"sidebar\">
    <div class=\"branding\">
        <a class=\"logo\" href=\"";
        // line 8
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["front_page"]) ? $context["front_page"] : null), "html", null, true));
        echo "\" title=\"";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Home")));
        echo "\" rel=\"home\">formata</a>
        ";
        // line 9
        if ((isset($context["site_slogan"]) ? $context["site_slogan"] : null)) {
            // line 10
            echo "            <div class=\"slogan\">
                ";
            // line 11
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["site_slogan"]) ? $context["site_slogan"] : null), "html", null, true));
            echo "
            </div>
        ";
        }
        // line 14
        echo "    </div>
    ";
        // line 15
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "nav", array())) {
            // line 16
            echo "        ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "nav", array()), "html", null, true));
            echo "
    ";
        }
        // line 18
        echo "    <div class=\"social-links\">
      <a class=\"social\" href=\"https://twitter.com/\"><i class=\"fa fa-twitter\"></i></a>
      <a class=\"social\" href=\"https://github.com/ \"><i class=\"fa fa-github-alt\"></i></a>
      <a class=\"social\"  href=\"http://www.linkedin.com/\"><i class=\"fa fa-linkedin-square\"></i></a>
    </div>
</div>
<div class=\"main-content\">
    ";
        // line 25
        if ((isset($context["messages"]) ? $context["messages"] : null)) {
            // line 26
            echo "        <div id=\"messages\">
            <div class=\"contain\">
                ";
            // line 28
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["messages"]) ? $context["messages"] : null), "html", null, true));
            echo "
            </div>
        </div>
    ";
        }
        // line 32
        echo "    ";
        if ((isset($context["tabs"]) ? $context["tabs"] : null)) {
            // line 33
            echo "        <nav class=\"tabs\" role=\"navigation\">
            ";
            // line 34
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["tabs"]) ? $context["tabs"] : null), "html", null, true));
            echo "
        </nav>
    ";
        }
        // line 37
        echo "    ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array()), "html", null, true));
        echo "
    ";
        // line 38
        if ((isset($context["action_links"]) ? $context["action_links"] : null)) {
            // line 39
            echo "        <ul class=\"action-links\">
            ";
            // line 40
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["action_links"]) ? $context["action_links"] : null), "html", null, true));
            echo "
        </ul>
    ";
        }
        // line 43
        echo "    <main class=\"content\"  role=\"main\">
        ";
        // line 44
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true));
        echo "
        ";
        // line 45
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 46
            echo "            <h1 class=\"title\" class=\"page-title\">
                ";
            // line 47
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
            echo "
            </h1>
        ";
        }
        // line 50
        echo "        ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true));
        echo "
        ";
        // line 51
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true));
        echo "
    </main>
    <footer  footer=\"footer\">
        ";
        // line 54
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array())) {
            // line 55
            echo "            ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()), "html", null, true));
            echo "
        ";
        }
        // line 57
        echo "    </footer>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/formata/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 57,  156 => 55,  154 => 54,  148 => 51,  143 => 50,  137 => 47,  134 => 46,  132 => 45,  128 => 44,  125 => 43,  119 => 40,  116 => 39,  114 => 38,  109 => 37,  103 => 34,  100 => 33,  97 => 32,  90 => 28,  86 => 26,  84 => 25,  75 => 18,  69 => 16,  67 => 15,  64 => 14,  58 => 11,  55 => 10,  53 => 9,  47 => 8,  43 => 6,);
    }
}
/* {#*/
/* /***/
/*  * @file display a single page.*/
/*  *//* */
/* #}*/
/* <div class="sidebar">*/
/*     <div class="branding">*/
/*         <a class="logo" href="{{ front_page }}" title="{{ 'Home'|t }}" rel="home">formata</a>*/
/*         {% if site_slogan %}*/
/*             <div class="slogan">*/
/*                 {{ site_slogan }}*/
/*             </div>*/
/*         {% endif %}*/
/*     </div>*/
/*     {% if page.nav %}*/
/*         {{ page.nav }}*/
/*     {% endif %}*/
/*     <div class="social-links">*/
/*       <a class="social" href="https://twitter.com/"><i class="fa fa-twitter"></i></a>*/
/*       <a class="social" href="https://github.com/ "><i class="fa fa-github-alt"></i></a>*/
/*       <a class="social"  href="http://www.linkedin.com/"><i class="fa fa-linkedin-square"></i></a>*/
/*     </div>*/
/* </div>*/
/* <div class="main-content">*/
/*     {% if messages %}*/
/*         <div id="messages">*/
/*             <div class="contain">*/
/*                 {{ messages }}*/
/*             </div>*/
/*         </div>*/
/*     {% endif %}*/
/*     {% if tabs %}*/
/*         <nav class="tabs" role="navigation">*/
/*             {{ tabs }}*/
/*         </nav>*/
/*     {% endif %}*/
/*     {{ page.help }}*/
/*     {% if action_links %}*/
/*         <ul class="action-links">*/
/*             {{ action_links }}*/
/*         </ul>*/
/*     {% endif %}*/
/*     <main class="content"  role="main">*/
/*         {{ title_prefix }}*/
/*         {% if title %}*/
/*             <h1 class="title" class="page-title">*/
/*                 {{ title }}*/
/*             </h1>*/
/*         {% endif %}*/
/*         {{ title_suffix }}*/
/*         {{ page.content }}*/
/*     </main>*/
/*     <footer  footer="footer">*/
/*         {% if page.footer %}*/
/*             {{ page.footer }}*/
/*         {% endif %}*/
/*     </footer>*/
/* </div>*/
/* */
