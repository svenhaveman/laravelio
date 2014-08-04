<?php namespace Lio\Articles\UseCases;

use Lio\Articles\Repositories\ArticleRepository;
use Lio\CommandBus\Handler;

class EditArticleHandler implements Handler
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function handle($command)
    {
        $article = $this->articleRepository->getById($command->articleId);
        $article->edit($command->title, $command->content, $command->tagIds);
        $this->articleRepository->save($article);
        return new EditArticleResponse($article);
    }
}
