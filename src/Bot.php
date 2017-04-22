<?php

namespace Iillexial\VKBot;

use Iillexial\VKBot\Command\CommandInterface;

/**
 * Class Bot
 *
 * @package Iillexial\VKBot
 * @author Ivan Klymenchenko <iillexial@gmail.com>
 */
final class Bot
{
    /**
     * @var CommandInterface[]
     */
    private $commandStack;

    /**
     * @return CommandInterface[]
     */
    public function getCommandStack()
    {
        return $this->commandStack;
    }

    /**
     * @param CommandInterface $command
     */
    public function addCommand($command)
    {
        $this->commandStack[] = $command;
    }

    /**
     * @param CommandInterface $command
     * @param $matchedString
     *
     * @return mixed
     */
    public function matchCommand(CommandInterface $command, $matchedString)
    {
        preg_match($command->getRegexp(), $matchedString, $result);

        return $result;
    }
}