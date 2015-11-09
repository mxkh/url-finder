<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 31.10.15
 * Time: 09:32
 */
namespace mxkh\url;

use mxkh\url\finder\Url;
use mxkh\url\finder\video\services\RuTubeVideoUrl;
use mxkh\url\finder\video\services\VimeoVideoUrl;
use mxkh\url\finder\video\services\YoutubeVideoUrl;
use mxkh\url\finder\video\VideoUrl;

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

    public function __construct()
    {
        $this->url = new Url();
        $this->youtube = new VideoUrl(VideoUrl::YOUTUBE_SERVICE_ID);
        $this->vimeo = new VideoUrl(VideoUrl::VIMEO_SERVICE_ID);
        $this->rutube = new VideoUrl(VideoUrl::RUTUBE_SERVICE_ID);
    }
}