<?php

/* SonataUserBundle:Admin:Security/login.html.twig */
class __TwigTemplate_bacc91858b25f411ef125ba0be7819ffd43238fa3947a8798a404abfcf1ccdcc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'sonata_nav' => array($this, 'block_sonata_nav'),
            'logo' => array($this, 'block_logo'),
            'sonata_left_side' => array($this, 'block_sonata_left_side'),
            'body_attributes' => array($this, 'block_body_attributes'),
            'sonata_wrapper' => array($this, 'block_sonata_wrapper'),
            'sonata_user_login_form' => array($this, 'block_sonata_user_login_form'),
            'sonata_user_login_error' => array($this, 'block_sonata_user_login_error'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : null), "SonataUserBundle:Admin:Security/login.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_sonata_nav($context, array $blocks = array())
    {
    }

    // line 6
    public function block_logo($context, array $blocks = array())
    {
    }

    // line 9
    public function block_sonata_left_side($context, array $blocks = array())
    {
    }

    // line 12
    public function block_body_attributes($context, array $blocks = array())
    {
        echo "class=\"sonata-bc login-page\"";
    }

    // line 14
    public function block_sonata_wrapper($context, array $blocks = array())
    {
        // line 15
        echo "
<div class=\"login-box\">
    <div class=\"login-logo\">
        <a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("sonata_admin_dashboard");
        echo "\">
            ";
        // line 19
        if ((("single_text" == $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "getOption", array(0 => "title_mode"), "method")) || ("both" == $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "getOption", array(0 => "title_mode"), "method")))) {
            // line 20
            echo "                <span>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "title", array()), "html", null, true);
            echo "</span>
            ";
        }
        // line 22
        echo "        </a>
    </div><!-- /.login-logo -->
    <div class=\"login-box-body\">
        ";
        // line 25
        $this->displayBlock('sonata_user_login_form', $context, $blocks);
        // line 62
        echo "    </div>
</div>

";
    }

    // line 25
    public function block_sonata_user_login_form($context, array $blocks = array())
    {
        // line 26
        echo "            ";
        $this->displayBlock('sonata_user_login_error', $context, $blocks);
        // line 31
        echo "            <p class=\"login-box-msg\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title_user_authentication", array(), "SonataUserBundle"), "html", null, true);
        echo "</p>
            <form action=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("sonata_user_admin_security_check");
        echo "\" method=\"post\" role=\"form\">
                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\"/>

                <div class=\"form-group has-feedback\">
                    <input type=\"text\" class=\"form-control\" id=\"username\"  name=\"_username\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" required=\"required\" placeholder=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "SonataUserBundle"), "html", null, true);
        echo "\"/>
                    <span class=\"glyphicon glyphicon-user form-control-feedback\"></span>
                </div>

                <div class=\"form-group has-feedback\">
                    <input type=\"password\" class=\"form-control\" id=\"password\" name=\"_password\" required=\"required\" placeholder=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "SonataUserBundle"), "html", null, true);
        echo "\"/>
                    <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
                </div>

                <div class=\"row\">
                    <div class=\"col-xs-8\">
                        <div class=\"checkbox icheck\">
                            <label>
                                <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\"/>
                                ";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "
                            </label>
                        </div>
                    </div>
                    <div class=\"col-xs-4\">
                        <button type=\"submit\" class=\"btn btn-primary btn-block btn-flat\">";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "</button>
                    </div>
                </div>
            </form>

            <a href=\"";
        // line 60
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_request");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("forgotten_password", array(), "SonataUserBundle"), "html", null, true);
        echo "</a>
        ";
    }

    // line 26
    public function block_sonata_user_login_error($context, array $blocks = array())
    {
        // line 27
        echo "                ";
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 28
            echo "                    <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : null), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
                ";
        }
        // line 30
        echo "            ";
    }

    public function getTemplateName()
    {
        return "SonataUserBundle:Admin:Security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 30,  161 => 28,  158 => 27,  155 => 26,  147 => 60,  139 => 55,  131 => 50,  119 => 41,  109 => 36,  103 => 33,  99 => 32,  94 => 31,  91 => 26,  88 => 25,  81 => 62,  79 => 25,  74 => 22,  68 => 20,  66 => 19,  62 => 18,  57 => 15,  54 => 14,  48 => 12,  43 => 9,  38 => 6,  33 => 3,  24 => 1,);
    }
}
