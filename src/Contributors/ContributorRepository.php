<?php namespace Lio\Contributors;

use Lio\Core\EloquentRepository;

class ContributorRepository extends EloquentRepository
{
    public function __construct(Contributor $model)
    {
        $this->model = $model;
    }

    public function getByGitHubId($githubId)
    {
        return $this->model->where('github_id', '=', $githubId)->first();
    }

    public function getAllByContributionsPaginated($perPage = 40)
    {
        return $this->model->orderBy('contribution_count', 'desc')->paginate($perPage);
    }
}
