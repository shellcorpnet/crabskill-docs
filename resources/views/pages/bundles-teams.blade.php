@extends('layouts.docs')

@section('title', 'Bundles & Teams — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Bundles & Teams</h1>
    <p class="text-xl text-neutral-400 mb-8">
        Get more value with skill bundles and collaborate with teams.
    </p>

    <h2>Skill Bundles</h2>
    <p>
        Bundles are curated collections of skills sold together at a discount. Instead of purchasing 
        skills individually, you can get a set of related skills at a lower total price.
    </p>

    <h3>Why Bundles?</h3>
    <ul>
        <li><strong>Save money</strong> — Bundles are typically 20-40% cheaper than buying skills separately</li>
        <li><strong>Curated collections</strong> — Skills in a bundle work well together</li>
        <li><strong>One-click purchase</strong> — Get everything you need in a single transaction</li>
    </ul>

    <h3>Browsing Bundles</h3>
    <p>
        Find bundles on the <a href="https://crabskill.com/bundles">Bundles page</a> or via the API:
    </p>
    <pre><code>curl "https://crabskill.com/api/v1/bundles"</code></pre>

    <h3>Purchasing a Bundle</h3>
    <p>
        Bundles are purchased through the web interface. After purchase, all included skills are 
        immediately available for download.
    </p>
    <ol>
        <li>Browse to the bundle you want</li>
        <li>Click "Purchase Bundle"</li>
        <li>Complete checkout via Stripe</li>
        <li>Install each skill: <code>curl -sL crabskill.com/install/&lt;skill-slug&gt; | bash</code></li>
    </ol>

    <div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-6 my-6">
        <h4 class="text-blue-400 font-bold mb-2">ℹ️ Already Own Some Skills?</h4>
        <p class="text-neutral-300 text-sm mb-0">
            If you already own skills included in a bundle, the bundle price is prorated — you only 
            pay for the skills you don't already have.
        </p>
    </div>

    <hr class="my-12 border-neutral-800">

    <h2>Teams</h2>
    <p>
        Teams let organizations share skills across multiple users. When a skill is added to a team, 
        all team members can install and use it.
    </p>

    <h3>How Teams Work</h3>
    <ul>
        <li><strong>Shared library</strong> — Skills purchased for the team are available to all members</li>
        <li><strong>Role-based access</strong> — Owners, admins, and members have different permissions</li>
        <li><strong>Centralized billing</strong> — Team purchases are billed to the team owner</li>
    </ul>

    <h3>Team Roles</h3>
    <table>
        <thead>
            <tr>
                <th>Role</th>
                <th>Permissions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Owner</strong></td>
                <td>Full control: manage members, purchase skills, billing, delete team</td>
            </tr>
            <tr>
                <td><strong>Admin</strong></td>
                <td>Manage members, add skills (if allowed by owner)</td>
            </tr>
            <tr>
                <td><strong>Member</strong></td>
                <td>Install and use team skills</td>
            </tr>
        </tbody>
    </table>

    <h3>Creating a Team</h3>
    <ol>
        <li>Go to <a href="https://crabskill.com/teams">Teams</a> in your dashboard</li>
        <li>Click "Create Team"</li>
        <li>Enter a team name and optional description</li>
        <li>Invite members by email</li>
    </ol>

    <h3>Adding Skills to a Team</h3>
    <p>
        When purchasing a skill, you can choose to add it to a team instead of your personal account:
    </p>
    <ol>
        <li>Navigate to the skill you want</li>
        <li>Click "Purchase"</li>
        <li>Select "Add to Team" and choose the team</li>
        <li>Complete checkout</li>
    </ol>

    <h3>Installing Team Skills</h3>
    <p>
        Team members install skills the same way as personal skills. The install script 
        authenticates with your API key and checks team membership:
    </p>
    <pre><code># Set your API key
export CRABSKILL_API_KEY="your-api-key"

# Install a team skill (same command)
curl -sL crabskill.com/install/premium-skill | bash</code></pre>

    <h3>Managing Team Members</h3>
    <p>
        Team owners and admins can manage members from the team settings:
    </p>
    <ul>
        <li><strong>Invite</strong> — Send email invitations to new members</li>
        <li><strong>Change role</strong> — Promote members to admin or demote admins</li>
        <li><strong>Remove</strong> — Remove members from the team (they lose access to team skills)</li>
    </ul>

    <h3>Team Billing</h3>
    <p>
        All team purchases are charged to the team owner's payment method. The owner can:
    </p>
    <ul>
        <li>View team purchase history</li>
        <li>Set spending limits for admins</li>
        <li>Export purchase reports for accounting</li>
    </ul>

    <div class="bg-orange-500/10 border border-orange-500/30 rounded-lg p-6 my-6">
        <h4 class="text-orange-400 font-bold mb-2">⚠️ Team Skill Licensing</h4>
        <p class="text-neutral-300 text-sm mb-0">
            Team skills are licensed per-team, not per-seat. Adding more members doesn't increase the 
            cost, but skills cannot be shared across multiple teams.
        </p>
    </div>

    <h2>FAQ</h2>

    <h3>Can I convert a personal purchase to a team purchase?</h3>
    <p>
        Not currently. If you need a skill on a team, purchase it again for the team. Contact support 
        if you made a recent purchase by mistake.
    </p>

    <h3>What happens if I leave a team?</h3>
    <p>
        You lose access to all team skills. Any skills you purchased personally remain in your account.
    </p>

    <h3>Can a team own published skills?</h3>
    <p>
        Not yet — skills are published under individual accounts. Revenue sharing for team-published 
        skills is on our roadmap.
    </p>
</div>
@endsection
