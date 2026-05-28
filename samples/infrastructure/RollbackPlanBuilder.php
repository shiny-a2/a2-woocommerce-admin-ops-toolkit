<?php

declare(strict_types=1);

namespace A2\Showcase\AdminOps\Infrastructure;

final class RollbackPlanBuilder
{
    public function build(array $snapshot, array $failedSteps): array
    {
        return array(
            'can_auto_rollback' => count($failedSteps) === 1,
            'snapshot_ref' => $snapshot['order_ref'] ?? null,
            'steps_to_review' => array_values($failedSteps),
        );
    }
}
