# Observability And Instrumentation

Admin tooling observability is about traceability, not high-volume logging.

## Measure

- mutation type and result status;
- capability rejection count;
- duplicate submission count;
- snapshot creation success/failure;
- rollback plan creation;
- audit write result;
- modal/API slow path timing.

## Do Not Log Publicly

- customer details;
- payment metadata;
- private order notes;
- internal meta keys;
- gateway payloads.

## Threshold Concepts

- repeated permission failures;
- snapshot failures before mutation;
- duplicate submissions on the same operation;
- audit write failure after a successful mutation;
- admin modal response time that interrupts staff work.

## Debug Workflow

1. Confirm capability and nonce result.
2. Check whether validation rejected unsafe input.
3. Verify snapshot exists before reviewing mutation behavior.
4. Use audit event and rollback plan to reconstruct the action.
5. Keep remediation scoped to the operation service.

