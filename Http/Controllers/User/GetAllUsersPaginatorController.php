<?php

use Actions\User\GetAllUsersPaginatorAction;

class GetAllUsersPaginatorController
{
    public function __construct(
        private readonly GetAllUsersPaginatorAction $getAllUsersPaginatorAction,
        private readonly UserPaginatorTransformer $userPaginatorTransformer
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $page = request()->query('page', 1);
        $perPage = request()->query('per_page', 10);

        $users = $this->getAllUsersPaginatorAction->act($page, $perPage);

        return response()->json(
            $this->userPaginatorTransformer->transform($users)
        );
    }
}
