<?php

/* groups/new.html */
class __TwigTemplate_d3ed94620bf1a5b8400dc1081013e718ec678772d6e796f998aef9c03c422a67 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html", "groups/new.html", 1);
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
        echo "New Group";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
   
";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $this->loadTemplate("groups/_form.html", "groups/new.html", 9)->display($context);
    }

    public function getTemplateName()
    {
        return "groups/new.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 9,  47 => 8,  39 => 5,  36 => 4,  30 => 3,  11 => 1,);
    }
}
