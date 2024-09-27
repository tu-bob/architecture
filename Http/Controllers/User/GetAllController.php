<?php

use Actions\User\GetAllUsersAction;

class GetAllController
{
    public function __construct(
        private readonly GetAllUsersAction $getAllUsersAction,
        private readonly UserTransformer $userTransformer
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $data = [];

        foreach ($this->getAllUsersAction->act() as $user) {
            $data[] = $this->userTransformer->transform($user);
        }

        return response()->json($data);
    }
}
