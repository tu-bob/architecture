<?php

namespace Mappers\Traits;

use Carbon\Carbon;
use Domain\Entities\Contracts\EntityWithTimestamps;
use Models\Model;


trait Timestamps
{
    public static function setTimestampsOnModel(EntityWithTimestamps $entity, Model $model): void
    {
        $model->created_at = $entity->getCreatedAt() === null ? null : Carbon::parse($entity->getCreatedAt());
        $model->updated_at = $entity->getUpdatedAt() === null ? null : Carbon::parse($entity->getUpdatedAt());
        $model->deleted_at = $entity->getDeletedAt() === null ? null : Carbon::parse($entity->getDeletedAt());
    }

    public static function setTimestampsOnEntity(Model $model, EntityWithTimestamps $entity): void
    {
        $entity->setCreatedAt($model->created_at?->toDateTimeImmutable());
        $entity->setUpdatedAt($model->updated_at?->toDateTimeImmutable());
        $entity->setDeletedAt($model->deleted_at?->toDateTimeImmutable());
    }
}
