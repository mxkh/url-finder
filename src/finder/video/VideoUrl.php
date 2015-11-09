<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 01.11.15
 * Time: 16:46
 */

namespace mxkh\url\finder\video;

use mxkh\url\finder\Url;
use mxkh\url\finder\video\services\RuTubeVideoUrl;
use mxkh\url\finder\video\services\VimeoVideoUrl;
use mxkh\url\finder\video\services\YoutubeVideoUrl;

/**
 * Class VideoUrl
 * @package mxkh\url\finder\video
 * @property string $serviceId
 * @property YoutubeVideoUrl|VimeoVideoUrl|RuTubeVideoUrl $service
 */
class VideoUrl extends Url
{
    const YOUTUBE_SERVICE_ID = 'youtube';
    const VIMEO_SERVICE_ID = 'vimeo';
    const RUTUBE_SERVICE_ID = 'rutube';

    /**
     * @var string
     */
    protected $serviceId;

    /**
     * @var YoutubeVideoUrl|VimeoVideoUrl|RuTubeVideoUrl
     */
    protected $service;

    public function __construct($serviceId)
    {
        $this->serviceId = $serviceId;
    }

    /**
     * @return array|null
     */
    public function extract()
    {
        $url = parent::extract();
        if (!$url) {
            return null;
        }
        $this->service = $this->getServiceInstance($this->serviceId);
        $matches = $this->service->subject($url['0'])->one();
        return ['url' => $matches['0'], 'id' => $matches['1']];
    }

    /**
     * @return array|null
     */
    public function extractAll()
    {
        $urls = parent::extractAll();
        if (is_null($urls)) {
            return $urls;
        }

        $matches = null;
        if (is_array($urls)) {
            $this->service = $this->getServiceInstance($this->serviceId);
            foreach ($urls['0'] as $url) {
                $match = $this->service->subject($url)->one();
                if (is_null($match)) {
                    continue;
                }
                $matches['url'][] = $match['0'];
                $matches['id'][] = $match['1'];
            }
        }

        return $matches;
    }

    /**
     * @return array
     */
    public
    function services()
    {
        return [
            self::YOUTUBE_SERVICE_ID => YoutubeVideoUrl::class,
            self::VIMEO_SERVICE_ID => VimeoVideoUrl::class,
            self::RUTUBE_SERVICE_ID => RuTubeVideoUrl::class,
        ];
    }

    /**
     * @param $serviceId
     * @return YoutubeVideoUrl|VimeoVideoUrl|RuTubeVideoUrl
     */
    public
    function getServiceInstance(
        $serviceId
    ) {
        if ($service = $this->services()[$serviceId]) {
            return new $service;
        }
        return null;
    }
}