<?php

final class A2_Sample_Order_Ops_Repository {
    private wpdb $db;
    private string $table;

    public function __construct(wpdb $db) {
        $this->db = $db;
        $this->table = $db->prefix . 'a2_order_ops_sample';
    }

    public function save_flag(int $order_id, string $flag): void {
        $this->db->replace($this->table, array(
            'order_id' => $order_id,
            'flag' => sanitize_key($flag),
            'updated_at' => gmdate('Y-m-d H:i:s'),
        ));
    }

    public function flag_for_order(int $order_id): ?string {
        $flag = $this->db->get_var(
            $this->db->prepare("SELECT flag FROM {$this->table} WHERE order_id = %d LIMIT 1", $order_id)
        );

        return is_string($flag) && $flag !== '' ? $flag : null;
    }
}

