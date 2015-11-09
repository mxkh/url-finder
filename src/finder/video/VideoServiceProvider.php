<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 09.11.15
 * Time: 19:55
 */

namespace mxkh\url\finder\video;


use mxkh\url\finder\ProviderInterface;

/**
 * Class VideoServiceProvider
 * @package mxkh\url\finder\video
 */
class VideoServiceProvider implements ProviderInterface
{
    /**
     * @param string $service
     * @return VideoService
     */
    public static function factory($service)
    {
        return new VideoService(new $service);
    }
}