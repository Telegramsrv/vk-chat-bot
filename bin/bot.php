<?php

require __DIR__.'/../vendor/autoload.php';

use Iillexial\VkBot\Bot;
use Iillexial\VkBot\Command\HelloCommand;

$bot = new Bot();
$bot->addCommand(HelloCommand::class);

$messages = ['бот'];

foreach ($messages as $message) {
    foreach ($bot->getCommandStack() as $command) {
        if ($bot->matchCommand($command, $message)) {
            echo $command->getAnswer();
            // TODO: Send message $command->getAnswer();
        }
    }
}