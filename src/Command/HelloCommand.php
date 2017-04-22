<?php

namespace Iillexial\VKBot\Command;

/**
 * Class HelloCommand
 *
 * @package Iillexial\VKBot\Command
 * @author Ivan Klymenchenko <iillexial@gmail.com>
 */
final class HelloCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected $regexp = '/бот/ui';

    /**
     * @param array ...$args
     *
     * @return string
     */
    public function getAnswer(...$args)
    {
        return 'Привет!';
    }
}