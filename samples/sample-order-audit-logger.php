<?php

final class A2_Sample_Order_Audit_Logger {
    public function record(int $order_id, int $actor_id, string $event, array $context = array()): void {
        $order = wc_get_order($order_id);
        if (!$order) {
            return;
        }

        $message = sprintf(
            'Operation event: %s by user #%d. Context: %s',
            sanitize_key($event),
            $actor_id,
            wp_json_encode(array_map('sanitize_text_field', $context))
        );

        $order->add_order_note($message);
        $order->save();
    }
}

