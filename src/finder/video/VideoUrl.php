<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 01.11.15
 * Time: 16:46
 */

namespace mxkh\url\finder\video;

use mxkh\url\finder\Url;

class VideoUrl extends Url
{
    /**
     * @return array|null
     */
    public function one()
    {
        $url = new Url();
        $url = $url->find($this->subject)->one();
        parent::find($url['url']['0']);
        return parent::one();
    }

    /**
     * @return array|null
     */
    public function all()
    {
        $url = new Url();
        $urls = $url->find($this->subject)->all();
        if (is_null($urls)) {
            return $urls;
        }

        $videoUrls = null;
        foreach ($urls['0'] as $url) {
            parent::find($url);
            $match = parent::one();
            if (is_null($match)) {
                continue;
            }
            $videoUrls['url'][] = $match['url']['0'];
            $videoUrls['id'][] = $match['id']['0'];
        }

        return $videoUrls;
    }
}