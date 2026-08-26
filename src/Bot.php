<?php

namespace Mk4U\TGram;

use Mk4U\TGram\Core\Entities\Update;
use Mk4U\TGram\Exceptions\ExceptionHandler;
use Mk4U\TGram\Exceptions\BotException;
use Mk4U\TGram\Core\Actions\Traits\CallbackHandler;
use Mk4U\TGram\Core\Actions\Traits\MessageHandler;
use Mk4U\TGram\Core\Actions\Traits\MiddlewareHandler;
use Mk4U\TGram\Core\Actions\Handlers;
use Mk4U\TGram\Core\Actions\Traits\MethodsHandler;
use Mk4U\Http\Request;
use Mk4U\Http\Response;
use Mk4U\Http\Status;

class Bot
{
    public const NAME = 'TGram';

    public const VERSION = 'alpha';

    public ?Update $update = null;

    use CallbackHandler,
        MessageHandler,
        MiddlewareHandler,
        MethodsHandler;

    /**
     * Inicializa el bot
     */
    public function __construct(array $config = [])
    {
        ExceptionHandler::start();
        Config::init($config ?: xConfig());
        //
        $this->setMiddleware(base('bot/middleware.php'));
        $this->setCommands(base('storage/commands.json'));
        $this->setCallbacks(base('storage/callbacks.json'));
    }

    private function getUpdate(): void
    {
        $request = Request::create();

        if (!empty(Config::get('secret'))) {
            $header = $request->getHeaderLine('X-Telegram-Bot-Api-Secret-Token') ?? '';

            if (!hash_equals(Config::get('secret', ''), $header)) {
                echo Response::json(
                    ['message' => 'unauthorized resource'],
                    Status::Forbidden
                );
                exit();
            }
        }

        $data = $request->jsonData(true);

        if (empty($data)) {
            throw new BotException("Update empty! The webhook should not be called manually, only by Telegram.");
        }
        $this->update = new Update($data);
    }

    /**
     * Obtener tipo de manejador para la actualizacion entrante
     */
    private function getHandler(string $type): callable
    {
        return match ($type) {
            'message' => function () {
                $this->resolveMessage();
            },
            'callback_query' => function () {
                $this->resolveCallback();
            },
            default => function () use ($type) {
                $this->resolveHandler($type);
            }
        };
    }

    /**
     * Obtiene el objeto Update de Telegram y procesa los mensajes
     */
    public function run(?Update $update = null): void
    {
        if ($update === null) {
            $this->getUpdate();       // modo webhook (actual)
        } else {
            $this->update = $update;  // modo polling
        }
        $type = $this->update->type();

        if ($type === null) {
            throw new BotException("Received update with unknown type: " . json_encode($this->update->getProperties()));
        }

        // Determinar si es un comando y extraer el nombre del comando
        $command = null;
        if ($type === 'message' && $this->update->message->isCommand()) {
            preg_match(
                '/^\/([a-zA-Z0-9_]+)/',
                $this->update->message->text,
                $matches
            );
            //$command = substr($matches[1],0,1) ?? null;
            $command = $matches[1] ?? null;
        }

        // Obtener el handler final basado en el tipo
        $handler = $this->getHandler($type);

        // Obtener los middleware para este tipo y comando
        $middlewares = $this->getMiddlewareFor($type, $command);

        // Ejecutar el pipeline
        $this->executePipeline($middlewares, $handler);
    }

    /**
     * Resuelve mensaje
     */
    private function resolveMessage(): void
    {
        if ($this->isTalking()) {
            $this->getConversation();
            return;
        }

        if ($this->update->message->isCommand()) {
            $this->handleCommand();
            return;
        }
        //mensage generico 
        $this->handleMessage();
    }

    /**
     * Resuelve Callback Query
     */
    private function resolveCallback(): void
    {
        $this->handleCallback();
    }

    /**
     * Resolver Handlers 
     */
    private function resolveHandler(string $type): void
    {
        $handler = preg_replace_callback('/_([a-z])/', function ($match) {
            return strtoupper($match[1]);
        }, $type);

        $class = 'Bot\\Handlers\\' . ucfirst($handler);
        classValidator($class, Handlers::class, 'Handler');


        (new $class($this->update))->execute();
    }
}
