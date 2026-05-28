<?php

final class A2_Sample_Order_Ops_Controller {
    public function boot(): void {
        add_action('wp_ajax_a2_sample_order_flag', array($this, 'save_flag'));
    }

    public function save_flag(): void {
        check_ajax_referer('a2_sample_order_ops', 'nonce');

        if (!current_user_can('edit_shop_orders')) {
            wp_send_json_error(array('message' => 'Access denied.'), 403);
        }

        $order_id = absint($_POST['order_id'] ?? 0);
        $flag = sanitize_key($_POST['flag'] ?? '');

        $order = wc_get_order($order_id);
        if (!$order || $flag === '') {
            wp_send_json_error(array('message' => 'Invalid order or flag.'), 400);
        }

        $order->update_meta_data('_a2_sample_ops_flag', $flag);
        $order->add_order_note(sprintf('Operational flag updated: %s', $flag));
        $order->save();

        wp_send_json_success(array('order_id' => $order_id, 'flag' => $flag));
    }
}

