<?php

namespace Iillexial\VkBot\Command;

/**
 * Interface CommandInterface
 *
 * @package Iillexial\VkBot\Command
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