# Failure Mode Matrix

| Failure mode | Likely cause | Detection signal | Safe behavior | Recovery path | What not to do |
| --- | --- | --- | --- | --- | --- |
| Invalid admin mutation | Bad input or wrong order state | Validation failure | Reject before write | Show operator-safe message | Coerce data and continue |
| Partial operation failure | Mid-operation API/database error | Operation status incomplete | Record failure and rollback plan | Restore snapshot where safe | Leave silent partial state |
| Missing audit snapshot | Snapshot write failed | Snapshot status missing | Block high-risk mutation | Retry snapshot or downgrade action | Mutate first and document later |
| Duplicate submission | Double click or retry | Idempotency key reused | Return original result | Improve UI lock and server guard | Run mutation twice |
| Permission bypass attempt | Direct request to handler | Capability/nonce failure | Reject and record coarse signal | Review capability mapping | Trust hidden form fields |

