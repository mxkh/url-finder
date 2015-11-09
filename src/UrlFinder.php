<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 31.10.15
 * Time: 09:32
 */
namespace mxkh\url;

use mxkh\url\finder\ServiceProvider;
use mxkh\url\finder\Url;
use mxkh\url\finder\video\services\RuTubeVideoUrl;
use mxkh\url\finder\video\services\VimeoVideoUrl;
use mxkh\url\finder\video\services\YoutubeVideoUrl;

/**
 * Class UrlFinder
 * @package mxkh\url
 * @property Url $url
 * @property YoutubeVideoUrl $youtube
 * @property VimeoVideoUrl $vimeo
 * @property RuTubeVideoUrl $rutube
 */
class UrlFinder
{
    /**
     * @var Url
     */
    public $url;
    /**
     * @var YoutubeVideoUrl
     */
    public $youtube;
    /**
     * @var VimeoVideoUrl
     */
    public $vimeo;
    /**
     * @var RuTubeVideoUrl
     */
    public $rutube;

    /**
     * UrlFinder constructor.
     * @param string $serviceId
     */
    public function __construct($serviceId = ServiceProvider::DEFAULT_SERVICE_ID)
    {
        $this->addservice($serviceId);
    }

    /**
     * @param string $serviceId
     * @return $this
     */
    public function addService($serviceId)
    {
        if (!$this->{$serviceId}) {
            $this->{$serviceId} = ServiceProvider::factory($serviceId);
        }
        return $this;
    }
}