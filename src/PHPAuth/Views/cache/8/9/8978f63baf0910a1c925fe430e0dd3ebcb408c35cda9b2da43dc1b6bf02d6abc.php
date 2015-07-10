<?php

/* roles/new.html */
class __TwigTemplate_8978f63baf0910a1c925fe430e0dd3ebcb408c35cda9b2da43dc1b6bf02d6abc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html", "roles/new.html", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "New Role";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
    <style type=\"text/css\">
        .important { color: #336699; }
    </style>
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "    <form action=\"/roles/create\" method=\"post\">
    \t<label for=\"role\">Role: </label> <input type=\"text\" id=\"role\" name=\"role\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "getRole", array(), "method"), "html", null, true);
        echo "\"/>
    \t<input type=\"submit\" name=\"commit\" />
    </form>
";
    }

    public function getTemplateName()
    {
        return "roles/new.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 12,  52 => 11,  49 => 10,  39 => 5,  36 => 4,  30 => 3,  11 => 1,);
    }
}
