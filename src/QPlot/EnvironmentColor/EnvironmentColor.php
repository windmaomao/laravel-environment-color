<?php namespace QPlot\EnvironmentColor;

/*
 */

/**
 * Class Setting
 * @package QPlot\EnvironmentColor
 */
class EnvironmentColor {

    public function modifyResponse($request, $response) {
        $content = $response->getContent();

        $renderedContent = '<div style="width: 100%; height:10px; background-color: purple"></div>';

        $position = 'top';

        if ($position == 'top') {
            $pos = mb_strrpos($content, '<body>');
            if (false !== $pos) {
                $content = mb_substr($content, 0, $pos) . $renderedContent . mb_substr($content, $pos);
            }else{
                $content = $renderedContent . $content;
            }
        }
        if ($position == 'bottom') {
            $pos = mb_strripos($content, '</body>');
            if (false !== $pos) {
                $content = mb_substr($content, 0, $pos) . $renderedContent . mb_substr($content, $pos);
            }else{
                $content = $content . $renderedContent;
            }
        }

        $response->setContent($content);
    }

}