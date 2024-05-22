<?php

/**
 * To display svg image
 */
function echo_svg($path, $class = false)
{
    echo return_svg($path, $class);
}

function return_svg($path, $class = false)
{
    if (!file_exists($path)) return '';
    $svg = file_get_contents($path);

    if (!$svg) return;

    if ($class) {
        $dom = new DOMDocument();
        @$dom->loadHTML($svg);
        foreach ($dom->getElementsByTagName('svg') as $element) {
            $element->setAttribute('class', $class);
        }
        $dom->saveHTML();
        $svg = $dom->saveHTML();
    }

    return $svg;
}
