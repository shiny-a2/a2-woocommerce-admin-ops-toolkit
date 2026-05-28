# Safe Admin Actions And Rollback Thinking

## Problem

Admin actions often assume success. Production operations need to assume partial failure, duplicate clicks, changed permissions, and human mistakes.

## Context

Order operations may involve staff decisions, stock context, internal flags, exports, and notes. Not every action should be reversible, but every important action should be understandable later.

## Constraint

Do not touch payment/gateway behavior unless the tool is explicitly designed for that purpose.

## Decision

Design admin operations with:

- capability checks at the boundary;
- idempotent-ish service methods where possible;
- audit notes;
- snapshots before higher-risk changes;
- clear separation between operational metadata and payment state.

## Tradeoff

Rollback-aware design takes more time. It reduces the cost of mistakes.

## Failure Mode

The failure is discovering after the fact that an operation changed state but left no audit trail.

## What I Would Improve Next

Add duplicate-submit protection for modal workflows and document which actions require snapshots.

