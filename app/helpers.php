<?php
/**
 * Created by PhpStorm.
 * User: wangjinhao
 * Date: 2017/5/18
 * Time: 18:23
 */
if ( ! function_exists('config_path'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}