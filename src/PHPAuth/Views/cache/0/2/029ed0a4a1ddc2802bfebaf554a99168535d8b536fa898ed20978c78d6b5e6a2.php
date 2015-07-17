<?php

/* groups/_form.html */
class __TwigTemplate_029ed0a4a1ddc2802bfebaf554a99168535d8b536fa898ed20978c78d6b5e6a2 extends Twig_Template
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
\t<label for=\"name\">Group Name: </label> <input type=\"text\" id=\"name\" name=\"name\" value=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "getName", array(), "method"), "html", null, true);
        echo "\"/>
\t
\t";
        // line 4
        if ((isset($context["edit_mode"]) ? $context["edit_mode"] : null)) {
            // line 5
            echo "\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["roles"]) ? $context["roles"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                // line 6
                echo "\t\t\t";
                if ($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "containRole", array(0 => $context["role"]), "method")) {
                    // line 7
                    echo "\t\t\t\t<INPUT type=\"checkbox\" name=\"roles_selected[]\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "getId", array(), "method"), "html", null, true);
                    echo "\" checked=\"1\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "getRole", array(), "method"), "html", null, true);
                    echo "
\t\t\t";
                } else {
                    // line 9
                    echo "\t\t\t\t<INPUT type=\"checkbox\" name=\"roles_selected[]\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "getId", array(), "method"), "html", null, true);
                    echo "\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "getRole", array(), "method"), "html", null, true);
                    echo "
\t\t\t";
                }
                // line 11
                echo "\t\t\t
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "\t\t<input type='hidden' name='_METHOD' value='PUT'/>
\t\t<br/>
\t\t<label>
\t  \t\t<input type=\"checkbox\" id=\"active\" name=\"active\" checked=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "getActive", array(), "method"), "html", null, true);
            echo "\" value=\"1\"> Active
\t\t</label> <br/>
\t";
        } else {
            // line 19
            echo "\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["roles"]) ? $context["roles"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                // line 20
                echo "\t\t\t<INPUT type=\"checkbox\" name=\"roles_selected[]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "getId", array(), "method"), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "getRole", array(), "method"), "html", null, true);
                echo "
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "\t";
        }
        // line 23
        echo "\t<input type=\"submit\" name=\"commit\" />
\t
</form>
";
    }

    public function getTemplateName()
    {
        return "groups/_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 23,  89 => 22,  78 => 20,  73 => 19,  67 => 16,  62 => 13,  55 => 11,  47 => 9,  39 => 7,  36 => 6,  31 => 5,  29 => 4,  24 => 2,  19 => 1,);
    }
}
