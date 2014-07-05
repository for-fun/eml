<?php
namespace Maps\PageBundle\Twig;

class DeleteFormExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            'totime' => new \Twig_Function_Method($this, 'toTime')
        );
    }

    public function toTime($number)
    {
        return "aaaa";
    }

    public function getName()
    {
        return 'deleteform_extension';
    }
}