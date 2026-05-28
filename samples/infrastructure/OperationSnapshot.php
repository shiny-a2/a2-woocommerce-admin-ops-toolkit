<?php

declare(strict_types=1);

namespace A2\Showcase\AdminOps\Infrastructure;

final class OperationSnapshot
{
    public static function fromOrderState(int $orderId, array $state): array
    {
        unset($state['billing_email'], $state['billing_phone'], $state['payment_token']);

        return array(
            'order_ref' => hash('sha256', 'order:' . $orderId),
            'state' => $state,
            'captured_at' => gmdate('c'),
        );
    }
}
