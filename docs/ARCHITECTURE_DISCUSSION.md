# Architecture Discussion

The admin operations pattern keeps UI handlers narrow. A modal or AJAX controller should validate the request and then hand off to a service. The service owns the operation, the repository owns storage, and the audit logger records the change.

The main compromise is that extra structure adds files for small tools. In production admin work, that cost is usually worth paying because exceptional order workflows are easy to break and hard to review later.

## Open Questions

- Which operations require snapshots before write?
- Should operational flags live in order meta or a dedicated table?
- How should duplicate modal submissions be detected?

