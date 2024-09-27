<?php

use Actions\User\CreateUserAction;
use Domain\Entities\User;

class CreateUserController
{
    public function __construct(
        private readonly CreateUserAction $createUserAction,
        private readonly UserTransformer $userTransformer
    ) {
    }

    public function __invoke(): JsonResponse {
        $data = $this->getValidatedData();

        $user = $this->createUser($data);

        return response()->json(
            $this->userTransformer->transform($user)
        );
    }

    private function createUser(array $data): User
    {
        //Alternatively, you could pass CreateUserDto
        $user = new User(
            name: $data['name'],
            email: $data['email'],
        );

        return $this->createUserAction->act($user);
    }

    //This method could be extracted to a Request class
    private function getValidatedData(): array
    {
        return request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
    }
}
