<?php namespace Lio\Forum\Replies\Validators;

use Illuminate\Validation\Factory;
use Lio\CommandBus\CommandValidationFailedException;
use Lio\Forum\Replies\Commands\CreateReplyCommand;

class CreateReplyValidator
{
    private $validationFactory;

    public function __construct(Factory $validationFactory)
    {
        $this->validationFactory = $validationFactory;
    }

    public function validate(CreateReplyCommand $command)
    {
        $validator = $this->validationFactory->make(
            [
                'body' => $command->body,
                'author' => $command->author->id,
            ], [
                'body'  => 'required',
                'author' => 'exists:users,id',
            ]
        );

        if ($validator->fails()) {
            throw new CommandValidationFailedException($validator->messages()->toJson());
        }
    }
} 
