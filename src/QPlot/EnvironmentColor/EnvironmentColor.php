<?php namespace QPlot\EnvironmentColor;

/*
 */

/**
 * Class Setting
 * @package QPlot\EnvironmentColor
 */
class EnvironmentColor {

    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct($app=null){
        if(!$app){
            $app = app();   //Fallback when $app is not given
        }
        $this->app = $app;
    }

    /**
     * Modify the response and inject the debugbar (or data in headers)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function modifyResponse($request, $response) {
        $content = $response->getContent();

        $renderedContent = '<div style="width: 100%; height:10px; background-color: purple"></div>';

        $position = $this->app['config']->get('environment-color::config.position');

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