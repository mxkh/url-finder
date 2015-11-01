<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 01.11.15
 * Time: 17:25
 */
namespace mxkh\url\finder\video\services;

use mxkh\url\finder\video\VideoUrl;

/**
 * Class RuTubeVideoUrl
 */
class RuTubeVideoUrl extends VideoUrl
{
    protected $pattern = '~https?:\/\/(?:www\.)?rutube\.ru\/video\/([a-f0-9]{32})~ix';
}