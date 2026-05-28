<?php

declare(strict_types=1);

namespace A2\Showcase\AdminOps\Infrastructure;

final class AuditEventRecorder
{
    public function event(string $operation, int $actorId, string $result): array
    {
        return array(
            'operation' => $operation,
            'actor_ref' => hash('sha256', 'actor:' . $actorId),
            'result' => $result,
            'recorded_at' => gmdate('c'),
        );
    }
}
