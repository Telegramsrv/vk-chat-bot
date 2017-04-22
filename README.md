# VK Bot

Простой бот для ВКонтакте. Список комманд находится в **src/Commands**

Чтобы создать новую комманду нужно добавить новый класс в папку **src/Commands**. 

Пример:

```php
//src/Commands/HelloCommand.php

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
     * Паттерн, по которому комманда будет давать ответ
     *
     * @var string
     */
    protected $regexp = '/бот/ui';

    /**
     * Текст, который ответит комманда если найдет в сообщении совпадения с $regexp
     *
     * @param array ...$args
     *
     * @return string
     */
    public function getAnswer(...$args)
    {
        return 'Привет!';
    }
}

```
