<?php

/* roles/edit.html */
class __TwigTemplate_b0c9c98ecc2ccdff404cad3d4c60d73027228e9b815e638ed73489132e261352 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html", "roles/edit.html", 1);
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
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    <form action=\"/roles/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "getId", array(), "method"), "html", null, true);
        echo "\" method=\"post\">
    \t<input type='hidden' name='_METHOD' value='PUT'/>
    \t<label for=\"role\">Role: </label> <input type=\"text\" id=\"role\" name=\"role\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "getRole", array(), "method"), "html", null, true);
        echo "\"/><br/>
    \t<label>
      \t\t<input type=\"checkbox\" id=\"active\" name=\"active\" checked=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "getActive", array(), "method"), "html", null, true);
        echo "\"> Active
    \t</label> <br/>
    \t<input type=\"submit\" name=\"commit\" />
    </form>
";
    }

    public function getTemplateName()
    {
        return "roles/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 12,  55 => 10,  49 => 8,  46 => 7,  39 => 5,  36 => 4,  30 => 3,  11 => 1,);
    }
}
