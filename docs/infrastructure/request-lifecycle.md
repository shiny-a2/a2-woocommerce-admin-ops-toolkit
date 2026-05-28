# Request Lifecycle

Admin operation requests are controlled mutation paths. The important work is deciding whether the mutation is allowed, reversible, and auditable.

```mermaid
flowchart TD
    A[Admin action request] --> B[Screen and capability gate]
    B --> C[Nonce validation]
    C --> D[Input validation]
    D --> E[Snapshot current state]
    E --> F[Execute operation]
    F --> G{Partial failure?}
    G -->|no| H[Write audit event]
    G -->|yes| I[Build rollback plan]
    I --> H
    H --> J[Return operator-visible result]
```

## Operating Notes

- The UI should not be trusted as the only guard.
- Snapshots are needed before higher-risk mutations.
- Audit records should be written for state-changing actions.
- Payment and gateway state should stay outside ordinary operational tools unless explicitly designed.

