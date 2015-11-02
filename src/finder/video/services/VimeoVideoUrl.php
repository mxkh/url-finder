<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 01.11.15
 * Time: 16:43
 */
namespace mxkh\url\finder\video\services;

use mxkh\url\finder\video\VideoUrl;

/**
 * Class VimeoVideoUrl
 * @package mxkh\url\finder\video\services
 */
class VimeoVideoUrl extends VideoUrl
{
    /**
     * This is regular expression let you find vimeo video URL
     * Thanks to wwdboer(https://gist.github.com/wwdboer) for this regexp
     * @var string $pattern regexp
     */
    protected $pattern =
        '~                          # Match Vimeo link and embed code
		(?:<iframe [^>]*src=")?         # If iframe match up to first quote of src
		(?:                             # Group vimeo url
				https?:\/\/             # Either http or https
				(?:[\w]+\.)*            # Optional subdomains
				vimeo\.com              # Match vimeo.com
				(?:[\/\w]*\/videos?)?   # Optional video sub directory this handles groups links also
				\/                      # Slash before Id
				([0-9]+)                # $1: VIDEO_ID is numeric
				[^\s]*                  # Not a space
		)                               # End group
		"?                              # Match end quote if part of src
		(?:[^>]*></iframe>)?            # Match the end of the iframe
		(?:<p>.*</p>)?                  # Match any title information stuff
		~ix';
}