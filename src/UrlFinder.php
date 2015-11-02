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
     * @var Url $url
     */
    public $url;
    /**
     * @var YoutubeVideoUrl $youtube
     */
    public $youtube;
    /**
     * @var VimeoVideoUrl $vimeo
     */
    public $vimeo;
    /**
     * @var RuTubeVideoUrl $rutube
     */
    public $rutube;

    public function __construct()
    {
        $this->url = new Url();
        $this->youtube = new YoutubeVideoUrl();
        $this->vimeo = new VimeoVideoUrl();
        $this->rutube = new RuTubeVideoUrl();
    }
}