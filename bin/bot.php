<?php

require __DIR__.'/../vendor/autoload.php';

use Iillexial\VkBot\Bot;
use Iillexial\VkBot\Command\HelloCommand;
use Iillexial\VkBot\VKApi\API;
use Iillexial\VkBot\Http\HttpClient;
use Iillexial\VkBot\Command\CommandInterface;

$bot = new Bot();
$bot->addCommand(new HelloCommand());

$vkApi = new API(new HttpClient());
$vkApi->setAccessToken(
    '72a1988d42efbb577ad9266ba78313449bf6f991de4c1f91d0db7a35cd9075f09be681d2b5a5388597c64'
);

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