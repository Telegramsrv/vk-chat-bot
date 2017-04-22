<?php

namespace Iillexial\VkBot\Command;

/**
 * Class AbstractCommand
 *
 * @package Iillexial\VkBot\Command
 * @author Ivan Klymenchenko <iillexial@gmail.com>
 */
abstract class AbstractCommand implements CommandInterface
{
    /**
     * @var string
     */
    protected $regexp;

    /**
     * @var string
     */
    private $answer;

    /**
     * @return mixed
     */
    public function getRegexp()
    {
        return $this->regexp;
    }

    /**
     * @param mixed $regexp
     */
    public function setRegexp($regexp)
    {
        $this->regexp = $regexp;
    }

    /**
     * @param array ...$args
     *
     * @return string
     */
    public function getAnswer(...$args)
    {
        return $this->answer;
    }

}