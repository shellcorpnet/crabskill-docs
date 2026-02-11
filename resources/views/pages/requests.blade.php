@extends('layouts.docs')

@section('title', 'Skill Requests — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Skill Requests</h1>
    <p class="text-xl text-neutral-400 mb-8">
        Request skills you need or build skills others are asking for.
    </p>

    <h2>What Are Skill Requests?</h2>
    <p>
        Skill Requests (also called bounties) are a way for the community to signal demand for skills 
        that don't exist yet. Users describe what they need, others upvote to show interest, and 
        developers can claim requests to build and earn.
    </p>

    <h3>How It Works</h3>
    <ol>
        <li><strong>Request</strong> — Someone describes a skill they need</li>
        <li><strong>Upvote</strong> — Others upvote to show demand</li>
        <li><strong>Claim</strong> — A developer claims the request to build it</li>
        <li><strong>Build & Submit</strong> — Developer publishes the skill</li>
        <li><strong>Fulfill</strong> — Request is marked complete, linking to the new skill</li>
    </ol>

    <hr class="my-12 border-neutral-800">

    <h2>Browsing Requests</h2>
    <p>
        View all open skill requests at <a href="https://crabskill.com/requests">crabskill.com/requests</a>.
    </p>
    <p>
        Requests are sorted by:
    </p>
    <ul>
        <li><strong>Most Wanted</strong> — Highest upvote count</li>
        <li><strong>Newest</strong> — Most recently created</li>
        <li><strong>Claimed</strong> — Currently being worked on</li>
    </ul>

    <hr class="my-12 border-neutral-800">

    <h2>Creating a Request</h2>
    <p>
        Can't find a skill you need? Create a request!
    </p>

    <h3>What to Include</h3>
    <ul>
        <li><strong>Title</strong> — Clear, descriptive name (e.g., "Notion API Integration")</li>
        <li><strong>Description</strong> — What the skill should do, use cases, expected behavior</li>
        <li><strong>Category</strong> — Help developers find your request</li>
    </ul>

    <h3>Writing a Good Request</h3>
    <p>
        The better your request, the more likely someone will build it:
    </p>
    <ul>
        <li>Be specific about functionality</li>
        <li>Describe real use cases</li>
        <li>Mention any APIs or services it should integrate with</li>
        <li>Note if you'd pay for it (signals serious demand)</li>
    </ul>

    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-6 my-6">
        <h4 class="text-white font-bold mb-2">Example Request</h4>
        <p class="text-neutral-400 text-sm mb-2"><strong>Title:</strong> Linear Issue Management</p>
        <p class="text-neutral-400 text-sm mb-0">
            <strong>Description:</strong> A skill that can create, update, and query Linear issues. 
            Should support creating issues with title/description/labels, listing issues by project 
            or assignee, and updating issue status. Would use this daily for development workflow.
        </p>
    </div>

    <hr class="my-12 border-neutral-800">

    <h2>Upvoting Requests</h2>
    <p>
        Upvotes signal demand to developers. The more upvotes, the more likely someone will build it.
    </p>
    <ul>
        <li>Browse requests and upvote ones you'd use</li>
        <li>You can upvote as many requests as you want</li>
        <li>Upvotes are public (developers can see who's interested)</li>
    </ul>

    <hr class="my-12 border-neutral-800">

    <h2>Claiming & Fulfilling Requests</h2>
    <p>
        Developers can claim requests to signal they're working on it.
    </p>

    <h3>Claiming a Request</h3>
    <ol>
        <li>Find a request you want to build</li>
        <li>Click "Claim" to mark it as in-progress</li>
        <li>You have 30 days to submit a skill (claims expire if not fulfilled)</li>
    </ol>

    <div class="bg-orange-500/10 border border-orange-500/30 rounded-lg p-6 my-6">
        <h4 class="text-orange-400 font-bold mb-2">⚠️ One Claim at a Time</h4>
        <p class="text-neutral-300 text-sm mb-0">
            You can only have 3 active claims at once. Complete or release claims before taking new ones.
        </p>
    </div>

    <h3>Fulfilling a Request</h3>
    <ol>
        <li>Build and <a href="/publishing">publish your skill</a></li>
        <li>Go to your claimed request</li>
        <li>Click "Submit Fulfillment" and link your published skill</li>
        <li>The request creator reviews and approves</li>
    </ol>

    <h3>Benefits of Fulfilling Requests</h3>
    <ul>
        <li><strong>Built-in audience</strong> — Everyone who upvoted is notified</li>
        <li><strong>Verified demand</strong> — You know people want this skill</li>
        <li><strong>Reputation</strong> — Fulfilled requests show on your profile</li>
    </ul>

    <hr class="my-12 border-neutral-800">

    <h2>Bounties (Coming Soon)</h2>
    <p>
        We're working on a bounty system where requesters can attach monetary rewards to requests. 
        When the skill is built and approved, the bounty is paid out to the developer.
    </p>
    <p>
        Stay tuned for updates!
    </p>

    <hr class="my-12 border-neutral-800">

    <h2>FAQ</h2>

    <h3>Can multiple people claim the same request?</h3>
    <p>
        No, only one person can claim a request at a time. If a claim expires (30 days without 
        fulfillment), others can claim it.
    </p>

    <h3>What if the submitted skill doesn't match what I requested?</h3>
    <p>
        As the requester, you review fulfillment submissions. If the skill doesn't meet your needs, 
        you can reject it with feedback. The claim is released and others can try.
    </p>

    <h3>Can I release my claim?</h3>
    <p>
        Yes, you can release a claim at any time from your dashboard. This frees it up for other 
        developers.
    </p>
</div>
@endsection
