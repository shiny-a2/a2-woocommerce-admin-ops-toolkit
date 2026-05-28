<?php

declare(strict_types=1);

namespace A2\Showcase\AdminOps\Infrastructure;

final class AdminMutationGuard
{
    public function allow(array $request, callable $can): array
    {
        if (! $can('manage_woocommerce')) {
            return array('allowed' => false, 'reason' => 'capability');
        }

        if (($request['nonce_valid'] ?? false) !== true) {
            return array('allowed' => false, 'reason' => 'nonce');
        }

        if (empty($request['operation'])) {
            return array('allowed' => false, 'reason' => 'operation');
        }

        return array('allowed' => true, 'reason' => 'ok');
    }
}
