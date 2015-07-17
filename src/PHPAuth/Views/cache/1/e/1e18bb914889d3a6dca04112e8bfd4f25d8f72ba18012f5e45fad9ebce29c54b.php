<?php

/* users/_form.html */
class __TwigTemplate_1e18bb914889d3a6dca04112e8bfd4f25d8f72ba18012f5e45fad9ebce29c54b extends Twig_Template
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
\t<label for=\"username\">Username: </label> <input type=\"text\" id=\"username\" name=\"username\" value=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getUsername", array(), "method"), "html", null, true);
        echo "\" /><br/>
\t<label for=\"password\">Password: </label> <input type=\"password\" id=\"password\" name=\"password\" value=\"\" /><br/>

\t";
        // line 5
        if ((isset($context["newer"]) ? $context["newer"] : null)) {
            // line 6
            echo "\t\t<label for=\"passconfirm\">Password Confirmation: </label> <input type=\"password\" id=\"passconfirm\" name=\"passconfirm\" value=\"\" /><br/>
\t\t";
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 8
                echo "\t\t\t<INPUT type=\"checkbox\" name=\"groups_selected[]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "getId", array(), "method"), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "getName", array(), "method"), "html", null, true);
                echo "
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "\t";
        }
        // line 11
        echo "
\t";
        // line 12
        if ((isset($context["edit_mode"]) ? $context["edit_mode"] : null)) {
            // line 13
            echo "\t\t<input type='hidden' name='_METHOD' value='PUT'/>
\t\t<label for=\"passconfirm\">Password Confirmation: </label> <input type=\"password\" id=\"passconfirm\" name=\"passconfirm\" value=\"\" /><br/>
\t\t";
            // line 15
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 16
                echo "\t\t\t";
                if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "containGroup", array(0 => $context["group"]), "method")) {
                    // line 17
                    echo "\t\t\t\t<INPUT type=\"checkbox\" name=\"groups_selected[]\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "getId", array(), "method"), "html", null, true);
                    echo "\" checked=\"1\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "getName", array(), "method"), "html", null, true);
                    echo "
\t\t\t";
                } else {
                    // line 19
                    echo "\t\t\t\t<INPUT type=\"checkbox\" name=\"groups_selected[]\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "getId", array(), "method"), "html", null, true);
                    echo "\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "getName", array(), "method"), "html", null, true);
                    echo "
\t\t\t";
                }
                // line 21
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "\t\t<label>
\t  \t\t<input type=\"checkbox\" id=\"active\" name=\"active\" checked=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "isActive", array(), "method"), "html", null, true);
            echo "\" value=\"1\"> Active
\t\t</label> <br/>
\t";
        }
        // line 26
        echo "\t<br/>
\t<input type=\"submit\" name=\"commit\" />
\t
</form>";
    }

    public function getTemplateName()
    {
        return "users/_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 26,  94 => 23,  91 => 22,  85 => 21,  77 => 19,  69 => 17,  66 => 16,  62 => 15,  58 => 13,  56 => 12,  53 => 11,  50 => 10,  39 => 8,  35 => 7,  32 => 6,  30 => 5,  24 => 2,  19 => 1,);
    }
}
