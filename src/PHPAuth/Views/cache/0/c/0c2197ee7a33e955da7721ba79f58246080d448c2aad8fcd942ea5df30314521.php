<?php

/* roles/_form.html */
class __TwigTemplate_0c2197ee7a33e955da7721ba79f58246080d448c2aad8fcd942ea5df30314521 extends Twig_Template
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
        // line 1
        echo "<form action=\"";
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : null), "html", null, true);
        echo "\" method=\"post\">
\t<label for=\"role\">Role: </label> <input type=\"text\" id=\"role\" name=\"role\" value=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "getRole", array(), "method"), "html", null, true);
        echo "\"/><br/>
\t";
        // line 3
        if ((isset($context["edit_mode"]) ? $context["edit_mode"] : null)) {
            // line 4
            echo "\t\t<input type='hidden' name='_METHOD' value='PUT'/>
\t
\t\t<label>
\t  \t\t<input type=\"checkbox\" id=\"active\" name=\"active\" checked=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "getActive", array(), "method"), "html", null, true);
            echo "\"> Active
\t\t</label> <br/>
\t";
        }
        // line 10
        echo "\t<input type=\"submit\" name=\"commit\" />
</form>";
    }

    public function getTemplateName()
    {
        return "roles/_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 10,  35 => 7,  30 => 4,  28 => 3,  24 => 2,  19 => 1,);
    }
}
