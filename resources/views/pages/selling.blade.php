@extends('layouts.docs')

@section('title', 'Selling Skills — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Selling Skills</h1>
    <p class="text-xl text-neutral-400 mb-8">
        Monetize your skills with Stripe Connect.
    </p>

    <h2>Getting Started</h2>
    <p>
        To sell skills on CrabSkill, you'll need to set up a Stripe Connect account. This lets us 
        handle payments and send your earnings directly to your bank account.
    </p>

    <h3>Step 1: Create a CrabSkill Account</h3>
    <p>
        If you haven't already, <a href="http://crabskill.test/register">sign up for CrabSkill</a>.
    </p>

    <h3>Step 2: Start Seller Onboarding</h3>
    <ol>
        <li>Go to <a href="http://crabskill.test/seller">Seller Dashboard</a></li>
        <li>Click "Become a Seller"</li>
        <li>Complete the Stripe Connect onboarding flow</li>
    </ol>
    <p>
        You'll need to provide:
    </p>
    <ul>
        <li>Business or personal information</li>
        <li>Bank account details for payouts</li>
        <li>Tax information (required by Stripe)</li>
    </ul>

    <h3>Step 3: Publish Paid Skills</h3>
    <p>
        Once your seller account is active, you can set prices when publishing skills:
    </p>
    <ul>
        <li><strong>Minimum price:</strong> $1.00</li>
        <li><strong>Maximum price:</strong> $999.00</li>
        <li><strong>Currency:</strong> USD</li>
    </ul>

    <h2>Pricing Strategy</h2>
    <p>
        Consider these factors when pricing your skill:
    </p>
    <ul>
        <li><strong>Complexity</strong> — More sophisticated skills can command higher prices</li>
        <li><strong>Time saved</strong> — How much time does your skill save users?</li>
        <li><strong>Market comparison</strong> — What do similar skills cost?</li>
        <li><strong>Target audience</strong> — Hobbyists vs. professionals have different budgets</li>
    </ul>

    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-6 my-6">
        <h3 class="text-white font-bold mb-2">💡 Tip: Start Low</h3>
        <p class="text-neutral-400 text-sm mb-0">
            Consider launching at a lower price to build reviews and downloads. You can always increase 
            the price later once you've established credibility.
        </p>
    </div>

    <h2>Revenue Split</h2>
    <p>
        Here's how revenue is distributed:
    </p>
    <table>
        <thead>
            <tr>
                <th>Recipient</th>
                <th>Percentage</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>You (Skill Creator)</td>
                <td>70%</td>
            </tr>
            <tr>
                <td>CrabSkill Platform</td>
                <td>15%</td>
            </tr>
            <tr>
                <td>OpenClaw Creator</td>
                <td>15%</td>
            </tr>
        </tbody>
    </table>
    <p>
        Note: Stripe's processing fees (approximately 2.9% + $0.30) are deducted before the split.
    </p>

    <h2>Payouts</h2>
    <p>
        Earnings are paid out automatically via Stripe:
    </p>
    <ul>
        <li><strong>Frequency:</strong> Daily (after 7-day rolling reserve for new accounts)</li>
        <li><strong>Method:</strong> Direct bank transfer</li>
        <li><strong>Minimum:</strong> $10.00</li>
    </ul>
    <p>
        Track your earnings in the <a href="http://crabskill.test/seller">Seller Dashboard</a>.
    </p>

    <h2>Seller Dashboard</h2>
    <p>
        Your seller dashboard shows:
    </p>
    <ul>
        <li><strong>Total earnings</strong> — Lifetime and this month</li>
        <li><strong>Recent sales</strong> — Who bought what and when</li>
        <li><strong>Skill performance</strong> — Downloads and revenue per skill</li>
        <li><strong>Payout history</strong> — When and how much you've been paid</li>
    </ul>

    <h2>Tax Considerations</h2>
    <p>
        CrabSkill provides sales data, but we don't handle tax reporting for you. You're responsible for:
    </p>
    <ul>
        <li>Reporting income from skill sales</li>
        <li>Paying applicable taxes in your jurisdiction</li>
        <li>Keeping records of your earnings</li>
    </ul>
    <p>
        Stripe will issue a 1099 form if you're a US seller earning over $600/year.
    </p>

    <h2>Refunds</h2>
    <p>
        Our refund policy:
    </p>
    <ul>
        <li>Buyers can request a refund within 7 days of purchase</li>
        <li>Refunds are at CrabSkill's discretion</li>
        <li>Refunded amounts are deducted from your next payout</li>
    </ul>
    <p>
        To minimize refund requests, make sure your skill description accurately represents what the skill does.
    </p>

    <h2>FAQ</h2>
    
    <h3>Can I change my price after publishing?</h3>
    <p>
        Yes! Go to your skill's edit page to update the price. Existing purchasers keep access at their 
        original price.
    </p>

    <h3>Can I make a paid skill free?</h3>
    <p>
        Yes. Change the price to $0 and the skill becomes free for everyone. Existing purchasers are not refunded.
    </p>

    <h3>What if I want to stop selling?</h3>
    <p>
        You can unpublish your skill at any time. Existing purchasers retain access, but new purchases 
        are disabled.
    </p>
</div>
@endsection
