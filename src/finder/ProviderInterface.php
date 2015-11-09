<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 09.11.15
 * Time: 20:05
 */

namespace mxkh\url\finder;


interface ProviderInterface
{
    /**
     * @param string $id
     * @return mixed
     */
    public static function factory($id);
}