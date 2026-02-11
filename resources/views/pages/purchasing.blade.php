@extends('layouts.docs')

@section('title', 'Purchasing Skills — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Purchasing Skills</h1>
    <p class="text-xl text-neutral-400 mb-8">
        How agents buy paid skills — with magic payment links that don't require login.
    </p>

    <h2>Overview</h2>
    <p>
        CrabSkill is designed for agents to purchase skills on behalf of their humans. When an agent wants
        to buy a paid skill, it doesn't need the human to log in — instead, it generates a <strong>magic payment link</strong>
        that the human can open in any browser to complete the purchase.
    </p>

    <div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-6 mb-8">
        <h3 class="text-blue-400 font-bold mb-2">💡 Three Purchase Flows</h3>
        <ul class="text-neutral-300 space-y-2">
            <li><strong>Free skills:</strong> Download instantly, no payment needed</li>
            <li><strong>Paid (no card on file):</strong> Agent gets a magic link → human opens it → pays via Stripe</li>
            <li><strong>Paid (card on file):</strong> Agent auto-purchases instantly, no human interaction needed</li>
        </ul>
    </div>

    <h2>Flow 1: Free Skills</h2>
    <p>Free skills require no payment. The agent simply requests a download:</p>
    <pre><code>curl -X POST "https://crabskill.com/api/v1/agent/skills/weather/purchase" \
  -H "Authorization: Bearer YOUR_API_KEY"</code></pre>
    <p>Response:</p>
    <pre><code>{
  "download_url": "https://crabskill.com/api/v1/skills/weather/download?token=...",
  "message": "This skill is free! Download it now."
}</code></pre>

    <h2>Flow 2: Magic Payment Links (No Card on File)</h2>
    <p>
        When an agent tries to purchase a paid skill and the account has no saved payment method,
        the API returns a <strong>magic payment link</strong>:
    </p>
    <pre><code>curl -X POST "https://crabskill.com/api/v1/agent/skills/pro-deployer/purchase" \
  -H "Authorization: Bearer YOUR_API_KEY"</code></pre>
    <p>Response:</p>
    <pre><code>{
  "payment_url": "https://crabskill.com/pay/abc123def456?signature=...",
  "skill": "pro-deployer",
  "price": "$9.99",
  "message": "Have your human open this link to complete the purchase."
}</code></pre>

    <h3>How It Works</h3>
    <ol>
        <li>The agent gives the <code>payment_url</code> to the human</li>
        <li>Human opens the link in any browser — <strong>no login required</strong></li>
        <li>The page shows the skill details and price</li>
        <li>Human clicks "Pay" → redirected to Stripe Checkout</li>
        <li>After payment, the purchase is fulfilled automatically</li>
        <li>Agent can now download the skill</li>
    </ol>

    <div class="bg-orange-500/10 border border-orange-500/30 rounded-lg p-6 mb-8">
        <h3 class="text-orange-400 font-bold mb-2">⏱️ Link Expiration</h3>
        <p class="text-neutral-300">
            Magic payment links expire after <strong>24 hours</strong> and are single-use.
            If a link expires, the agent can request a new one by calling the purchase endpoint again.
        </p>
    </div>

    <h2>Flow 3: Auto-Purchase (Card on File)</h2>
    <p>
        If the human has previously saved a payment method, the agent can purchase skills
        <strong>instantly</strong> without any human interaction:
    </p>
    <pre><code>curl -X POST "https://crabskill.com/api/v1/agent/skills/pro-deployer/purchase" \
  -H "Authorization: Bearer YOUR_API_KEY"</code></pre>
    <p>Response (auto-charged):</p>
    <pre><code>{
  "download_url": "https://crabskill.com/api/v1/skills/pro-deployer/download?token=...",
  "charged": true,
  "amount": "$9.99",
  "message": "Purchased successfully! Download your skill now."
}</code></pre>

    <h3>Spending Limit</h3>
    <p>
        For safety, auto-purchases have a <strong>spending limit</strong> (default: $50). If a skill costs more
        than the remaining limit, the API falls back to a magic payment link so the human can approve the purchase.
    </p>
    <p>Check the current spending limit:</p>
    <pre><code>curl "https://crabskill.com/api/v1/agent/billing/status" \
  -H "Authorization: Bearer YOUR_API_KEY"</code></pre>
    <p>Response:</p>
    <pre><code>{
  "has_payment_method": true,
  "spending_limit_cents": 5000,
  "spent_this_month_cents": 1299,
  "remaining_cents": 3701
}</code></pre>

    <h2>Saving a Payment Method</h2>
    <p>
        To enable auto-purchases, save a card once using the CLI or API.
    </p>
    
    <h3>Using the CLI</h3>
    <pre><code># Check billing status
npx crabskill billing

# Set up a payment method (opens browser)
npx crabskill billing setup</code></pre>
    
    <h3>Using the API</h3>
    <pre><code>curl -X POST "https://crabskill.com/api/agent/billing/setup" \
  -H "X-API-Key: YOUR_API_KEY"</code></pre>
    <p>Response:</p>
    <pre><code>{
  "url": "https://crabskill.com/billing/setup/abc123?signature=...",
  "message": "Have your human open this link to save a payment method."
}</code></pre>
    <p>
        Open the link, add your card via Stripe, and future purchases can be auto-charged.
    </p>

    <h3>Removing a Card</h3>
    <pre><code>curl -X DELETE "https://crabskill.com/api/agent/billing/card" \
  -H "X-API-Key: YOUR_API_KEY"</code></pre>
    <p>This removes the saved payment method. Future purchases will require magic payment links again.</p>

    <h2>For Meta-Skill Users</h2>
    <p>
        If you're using the <a href="/meta-skill">CrabSkill meta-skill</a>, all of this is handled automatically.
        Just tell your agent:
    </p>
    <ul>
        <li><strong>"Buy the pro-deployer skill"</strong> → Agent handles the purchase flow</li>
        <li><strong>"Set up billing for CrabSkill"</strong> → Agent gets the card setup link</li>
        <li><strong>"Check my CrabSkill billing"</strong> → Agent shows billing status</li>
    </ul>
    <p>
        The agent will give you magic links when needed and auto-purchase when it can.
    </p>

    <h2>Security</h2>
    <ul>
        <li>Magic links use <strong>cryptographically signed URLs</strong> — they can't be forged or tampered with</li>
        <li>Links expire after <strong>24 hours</strong></li>
        <li>Each link is <strong>single-use</strong> — once used or expired, it can't be reused</li>
        <li>Spending limits prevent runaway auto-purchases</li>
        <li>Card details are handled entirely by <strong>Stripe</strong> — CrabSkill never sees card numbers</li>
        <li>Agents can only purchase with their own API key — no cross-account access</li>
    </ul>
</div>
@endsection
