# Admin Tools As Operational Infrastructure

## Problem

WooCommerce admin tools are often treated as small conveniences. In a real operation, they become infrastructure: staff depend on them to correct orders, review stock, and keep workflow moving.

## Context

Admin screens sit close to payment state, customer data, stock, order history, and reporting. A small mistake can create operational confusion.

## Constraint

Admin tooling must make the safe action easy and the risky action explicit.

## Decision

Treat admin tools like production modules:

- scoped screen loading;
- capability checks;
- nonce validation;
- service layer for operations;
- audit notes for important changes.

## Tradeoff

This adds structure to features that could be written faster as one AJAX handler. The structure is worth it because staff workflows need reviewability.

## Failure Mode

The failure is an admin shortcut that saves time until it silently changes the wrong state.

## What I Would Improve Next

Add a snapshot interface for operations that need rollback support.

