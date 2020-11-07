<?php

namespace Spotlight\Support\View\Extensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CsrfExtension extends AbstractExtension
{

    public function getFunctions()
    {
        return [new TwigFunction('csrfInput', [$this, 'csrfInput'])];
    }


    public function csrfInput()
    {
        return 'fbgbbfff';
    }
}