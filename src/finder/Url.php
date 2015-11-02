<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 31.10.15
 * Time: 13:24
 */
namespace mxkh\url\finder;

/**
 * Class Url
 * @package mxkh\url\finder
 * @property string $pattern
 * @property string $subject
 */
class Url implements UrlInterface
{
    /**
     * @var string $pattern
     */
    protected $pattern = '/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/';
    /**
     * @var null $subject
     */
    protected $subject = null;

    /**
     * Returns all URL found in the te
     * @return null|array
     */
    protected function extractAll()
    {
        if (preg_match_all($this->pattern, $this->subject, $matches)) {
            return $matches;
        }
        return null;
    }

    /**
     * Returns first URL found in the text
     * @return null|array
     */
    protected function extract()
    {
        if (preg_match($this->pattern, $this->subject, $matches)) {
            return ['url' => [$matches['0']], 'id' => [$matches['1']]];
        }
        return null;
    }

    /**
     * @param string $subject
     * @return Url
     */
    public function find($subject)
    {
        if (!is_string($subject)) {
            throw new \InvalidArgumentException('Param must be a "string"');
        }
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param string $pattern
     * @return Url
     */
    public function pattern($pattern = null)
    {
        $this->pattern = $pattern;
        return $this;
    }

    /**
     * @return array|null
     */
    public function all()
    {
        return $this->extractAll();
    }

    /**
     * @return array|null
     */
    public function one()
    {
        return $this->extract();
    }
}