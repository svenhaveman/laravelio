<?php namespace Lio\Forum\Threads\Handlers;

use Lio\Core\Handler;
use Lio\Events\Dispatcher;
use Lio\Forum\Forum;
use Lio\Forum\EloquentThreadRepository;

class CreateThreadHandler implements Handler
{
    /**
     * @var \Lio\Forum\Forum
     */
    private $forum;
    /**
     * @var \Lio\Forum\EloquentThreadRepository
     */
    private $repository;
    /**
     * @var \Lio\Events\Dispatcher
     */
    private $dispatcher;

    public function __construct(Forum $forum, EloquentThreadRepository $repository, Dispatcher $dispatcher)
    {
        $this->forum = $forum;
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $thread = $this->forum->addThread($command->subject, $command->body, $command->author, $command->isQuestion, $command->laravelVersion, $command->tagIds);
        $this->repository->save($thread);
        $this->dispatcher->dispatch($this->forum->releaseEvents());
        return $thread;
    }
}
