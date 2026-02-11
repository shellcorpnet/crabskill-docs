@extends('layouts.docs')

@section('title', 'Webhooks — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Webhooks</h1>
    <p class="text-xl text-neutral-400 mb-8">
        For platform operators and self-hosters: Stripe webhook configuration.
    </p>

    <div class="bg-orange-500/10 border border-orange-500/30 rounded-lg p-6 mb-8">
        <h4 class="text-orange-400 font-bold mb-2">⚠️ Advanced Topic</h4>
        <p class="text-neutral-300 text-sm mb-0">
            This page is for people running their own CrabSkill instance. If you're just using 
            crabskill.com, you don't need to configure webhooks — it's already handled.
        </p>
    </div>

    <h2>Overview</h2>
    <p>
        CrabSkill uses Stripe for all payment processing. Webhooks allow Stripe to notify CrabSkill 
        when payment events occur (purchases, refunds, subscription changes, etc.).
    </p>

    <h2>Setting Up Webhooks</h2>

    <h3>1. Create Webhook Endpoint in Stripe</h3>
    <ol>
        <li>Go to <a href="https://dashboard.stripe.com/webhooks">Stripe Dashboard → Webhooks</a></li>
        <li>Click "Add endpoint"</li>
        <li>Enter your endpoint URL: <code>https://your-domain.com/stripe/webhook</code></li>
        <li>Select the events to listen for (see below)</li>
        <li>Click "Add endpoint"</li>
    </ol>

    <h3>2. Get Webhook Secret</h3>
    <p>
        After creating the endpoint, Stripe shows a signing secret (starts with <code>whsec_</code>). 
        Copy this — you'll need it to verify webhook signatures.
    </p>

    <h3>3. Configure CrabSkill</h3>
    <p>
        Add the webhook secret to your environment:
    </p>
    <pre><code># .env
STRIPE_WEBHOOK_SECRET=whsec_your_secret_here</code></pre>

    <hr class="my-12 border-neutral-800">

    <h2>Required Events</h2>
    <p>
        CrabSkill requires these Stripe webhook events:
    </p>

    <table>
        <thead>
            <tr>
                <th>Event</th>
                <th>Purpose</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>checkout.session.completed</code></td>
                <td>Process completed purchases (skills, bundles)</td>
            </tr>
            <tr>
                <td><code>account.updated</code></td>
                <td>Track seller account status changes (Connect)</td>
            </tr>
            <tr>
                <td><code>charge.refunded</code></td>
                <td>Handle refunds, revoke access if needed</td>
            </tr>
            <tr>
                <td><code>payment_method.attached</code></td>
                <td>Update billing status when card is added</td>
            </tr>
            <tr>
                <td><code>payment_method.detached</code></td>
                <td>Update billing status when card is removed</td>
            </tr>
            <tr>
                <td><code>payment_intent.payment_failed</code></td>
                <td>Handle failed auto-charges</td>
            </tr>
        </tbody>
    </table>

    <hr class="my-12 border-neutral-800">

    <h2>Event Handling Details</h2>

    <h3>checkout.session.completed</h3>
    <p>
        Fired when a customer completes a Checkout session (purchase or billing setup).
    </p>
    <ul>
        <li>For skill purchases: Grants access, increments download count, notifies seller</li>
        <li>For bundle purchases: Grants access to all included skills</li>
        <li>For billing setup: Saves the payment method for future auto-charges</li>
    </ul>

    <h3>account.updated</h3>
    <p>
        Fired when a Connect account's status changes.
    </p>
    <ul>
        <li>Tracks <code>charges_enabled</code> and <code>payouts_enabled</code> status</li>
        <li>Updates seller's ability to list paid skills</li>
        <li>Handles onboarding completion</li>
    </ul>

    <h3>charge.refunded</h3>
    <p>
        Fired when a charge is refunded (partially or fully).
    </p>
    <ul>
        <li>Full refund: Revokes skill access</li>
        <li>Partial refund: Logged but access retained</li>
        <li>Adjusts seller earnings accordingly</li>
    </ul>

    <h3>payment_method.attached / detached</h3>
    <p>
        Fired when a customer adds or removes a payment method.
    </p>
    <ul>
        <li>Updates <code>has_payment_method</code> status</li>
        <li>Enables/disables auto-charge capability</li>
    </ul>

    <h3>payment_intent.payment_failed</h3>
    <p>
        Fired when an auto-charge fails.
    </p>
    <ul>
        <li>Notifies the user that payment failed</li>
        <li>Returns magic payment link for retry</li>
        <li>Does not grant skill access</li>
    </ul>

    <hr class="my-12 border-neutral-800">

    <h2>Testing Webhooks</h2>

    <h3>Local Development</h3>
    <p>
        Use the Stripe CLI to forward webhooks to your local environment:
    </p>
    <pre><code># Install Stripe CLI
brew install stripe/stripe-cli/stripe

# Login to Stripe
stripe login

# Forward webhooks to local server
stripe listen --forward-to localhost:8000/stripe/webhook</code></pre>
    <p>
        The CLI will output a webhook secret for local testing. Use this in your local <code>.env</code>.
    </p>

    <h3>Trigger Test Events</h3>
    <pre><code># Trigger a checkout completion
stripe trigger checkout.session.completed

# Trigger a refund
stripe trigger charge.refunded</code></pre>

    <hr class="my-12 border-neutral-800">

    <h2>Webhook Security</h2>

    <h3>Signature Verification</h3>
    <p>
        CrabSkill verifies webhook signatures using the <code>STRIPE_WEBHOOK_SECRET</code>. This 
        ensures webhooks actually come from Stripe and haven't been tampered with.
    </p>
    <p>
        Never disable signature verification in production.
    </p>

    <h3>HTTPS Required</h3>
    <p>
        Webhook endpoints must use HTTPS in production. Stripe won't send webhooks to insecure 
        endpoints.
    </p>

    <h3>Idempotency</h3>
    <p>
        CrabSkill's webhook handlers are idempotent — processing the same event multiple times 
        has the same effect as processing it once. This handles Stripe's retry behavior safely.
    </p>

    <hr class="my-12 border-neutral-800">

    <h2>Troubleshooting</h2>

    <h3>Webhooks Not Arriving</h3>
    <ul>
        <li>Check that your endpoint URL is correct in Stripe Dashboard</li>
        <li>Verify your server is accessible from the internet</li>
        <li>Check Stripe Dashboard → Webhooks → [Your endpoint] → Recent deliveries</li>
    </ul>

    <h3>Signature Verification Failed</h3>
    <ul>
        <li>Make sure <code>STRIPE_WEBHOOK_SECRET</code> matches the secret in Stripe Dashboard</li>
        <li>Don't modify the raw request body before verification</li>
        <li>Regenerate the webhook secret if it may have been compromised</li>
    </ul>

    <h3>Events Processing Slowly</h3>
    <ul>
        <li>Webhook handlers should return 200 quickly</li>
        <li>Queue heavy processing for background jobs</li>
        <li>Stripe times out after 20 seconds</li>
    </ul>
</div>
@endsection
