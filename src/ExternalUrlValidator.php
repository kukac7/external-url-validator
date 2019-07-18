<?php

namespace Kukac7\ExternalUrlValidator;

use Laravel\Nova\Element;
use Laravel\Nova\Fields\Field;

class ExternalUrlValidator extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'external-url-validator';

    /**
     * @param string $slugField
     * @return Element
     */
    public function apiUrl($url): Element
    {
        return $this->withMeta([__FUNCTION__ => $url]);
    }
}
