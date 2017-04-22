<?php

namespace Iillexial\VkBot;

use Iillexial\VkBot\Command\CommandInterface;

/**
 * Class Bot
 *
 * @package Iillexial\VkBot
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