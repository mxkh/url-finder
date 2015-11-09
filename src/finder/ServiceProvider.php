<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 09.11.15
 * Time: 19:10
 */

namespace mxkh\url\finder;

use mxkh\url\finder\video\VideoServiceProvider;
use mxkh\url\finder\video\services\RuTubeVideoUrl;
use mxkh\url\finder\video\services\VimeoVideoUrl;
use mxkh\url\finder\video\services\YoutubeVideoUrl;

class ServiceProvider implements ProviderInterface
{
    const DEFAULT_SERVICE_ID = 'url';
    const YOUTUBE_SERVICE_ID = 'youtube';
    const VIMEO_SERVICE_ID = 'vimeo';
    const RUTUBE_SERVICE_ID = 'rutube';

    /**
     * Returns array of supported services
     * @return array
     */
    protected static function services()
    {
        return [
            self::DEFAULT_SERVICE_ID => Url::class,
            self::YOUTUBE_SERVICE_ID => YoutubeVideoUrl::class,
            self::VIMEO_SERVICE_ID => VimeoVideoUrl::class,
            self::RUTUBE_SERVICE_ID => RuTubeVideoUrl::class,
        ];
    }

    /**
     * Returns array of supported factories
     * @return array
     */
    protected static function factories()
    {
        return [
            self::DEFAULT_SERVICE_ID => Url::class,
            self::YOUTUBE_SERVICE_ID => VideoServiceProvider::class,
            self::VIMEO_SERVICE_ID => VideoServiceProvider::class,
            self::RUTUBE_SERVICE_ID => VideoServiceProvider::class,
        ];
    }

    /**
     * @param $serviceId
     * @return mixed
     */
    public static function factory($serviceId)
    {
        /** @var VideoServiceProvider $factory */
        $factory = self::factories()[$serviceId];
        if (self::DEFAULT_SERVICE_ID == $serviceId) {
            return new $factory;
        }
        $service = self::services()[$serviceId];
        return $factory::factory($service);
    }
}