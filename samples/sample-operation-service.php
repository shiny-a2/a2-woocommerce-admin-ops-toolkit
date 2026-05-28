<?php

final class A2_Sample_Order_Operation_Service {
    public function __construct(
        private A2_Sample_Order_Ops_Repository $repository,
        private A2_Sample_Order_Audit_Logger $audit
    ) {
    }

    public function apply_flag(int $order_id, string $flag, int $actor_id): void {
        $order = wc_get_order($order_id);
        if (!$order) {
            throw new InvalidArgumentException('Order not found.');
        }

        if (!user_can($actor_id, 'edit_shop_orders')) {
            throw new RuntimeException('Actor cannot edit shop orders.');
        }

        $safe_flag = sanitize_key($flag);
        $this->repository->save_flag($order_id, $safe_flag);
        $this->audit->record($order_id, $actor_id, 'ops_flag_changed', array('flag' => $safe_flag));
    }
}

