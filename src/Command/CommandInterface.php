<?php

namespace Iillexial\VKBot\Command;

/**
 * Interface CommandInterface
 *
 * @package Iillexial\VKBot\Command
 * @author Ivan Klymenchenko <iillexial@gmail.com>
 */
interface CommandInterface
{
    /**
     * @return string
     */
    public function getRegexp();

    /**
     * @param string $regexp
     *
     * @return void
     */
    public function setRegexp($regexp);

    /**
     * @param array ...$args
     *
     * @return mixed
     */
    public function getAnswer(...$args);
}