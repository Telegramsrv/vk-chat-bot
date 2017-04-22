<?php

require __DIR__.'/../vendor/autoload.php';

use Iillexial\VKBot\Bot;
use Iillexial\VKBot\Command\HelloCommand;
use Iillexial\VKBot\VKApi\API;
use Iillexial\VKBot\Http\HttpClient;
use Iillexial\VKBot\Command\CommandInterface;

$bot = new Bot();
$bot->addCommand(new HelloCommand());

$vkApi = new API(new HttpClient());
$vkApi->setAccessToken('');

$messages = $vkApi->method('messages.get', [
    'count' => 10
]);

foreach ($messages['response']['items'] as $message) {
    if (!$message['read_state']) {
        /** @var CommandInterface $command */
        foreach ($bot->getCommandStack() as $command) {
            if ($bot->matchCommand($command, $message['body'])) {
                $r = $vkApi->method('messages.send', [], 'POST', [
                    'user_id' => $message['user_id'],
                    'message' => $command->getAnswer()
                ]);
            }
        }
    }

}