@extends('layouts.docs')

@section('title', 'Getting Started — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Getting Started</h1>
    <p class="text-xl text-neutral-400 mb-8">
        Install your first skill in under a minute.
    </p>

    <h2>Prerequisites</h2>
    <p>Before you begin, make sure you have:</p>
    <ul>
        <li><strong>OpenClaw</strong> installed and configured</li>
        <li>A <strong>skills directory</strong> (usually <code>~/.openclaw/workspace/skills</code>)</li>
        <li><strong>Node.js 16+</strong> (for the CLI) or <strong>curl/bash</strong> (for manual installs)</li>
    </ul>

    <div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-6 mb-8">
        <h3 class="text-blue-400 font-bold mb-2">ℹ️ Account Options</h3>
        <p class="text-neutral-300 text-sm mb-0">
            You can create a CrabSkill account via email signup or instantly with <strong>GitHub</strong> or 
            <strong>Google OAuth</strong>. OAuth accounts are automatically email-verified.
        </p>
    </div>

    <h2>Install Your First Skill</h2>
    
    <h3>Method 1: Using npx (Recommended)</h3>
    <p>
        The easiest way to install skills is with the CrabSkill CLI. No global install needed:
    </p>
    <pre><code>npx crabskill install weather</code></pre>

    <h3>Method 2: Global CLI Install</h3>
    <p>
        For frequent use, install the CLI globally:
    </p>
    <pre><code>npm install -g crabskill

# Then use without npx
crabskill install weather</code></pre>

    <h3>Method 3: curl | bash</h3>
    <p>
        If you don't have Node.js, use the shell script:
    </p>
    <pre><code>curl -sL crabskill.com/install/weather | bash</code></pre>

    <h3>What Happens During Installation</h3>
    <ol>
        <li>The CLI downloads the skill package from CrabSkill</li>
        <li>It extracts the contents to <code>~/.openclaw/workspace/skills/&lt;skill-name&gt;/</code></li>
        <li>The skill's <code>SKILL.md</code> file tells your agent what the skill does</li>
        <li>Your agent can now use the skill in future conversations</li>
    </ol>

    <h2>Setting Up the Meta-Skill</h2>
    <p>
        Want your agent to install skills automatically? Install the CrabSkill meta-skill:
    </p>
    <pre><code>npx crabskill install crabskill</code></pre>
    <p>
        Once installed, your agent can search for and install skills without any manual intervention.
    </p>

    <h3>Example Conversation</h3>
    <pre><code>You: I need to work with GitHub Actions.

Agent: Let me search CrabSkill for GitHub-related skills...
       Found "github-actions" — A skill for managing GitHub Actions workflows.
       Would you like me to install it?

You: Yes, please.

Agent: Installing github-actions skill...
       Done! I can now help you with GitHub Actions.</code></pre>

    <h2>CLI Authentication (Optional)</h2>
    <p>
        For premium features like purchasing paid skills and publishing, register or login:
    </p>
    <pre><code># Register a new account
npx crabskill register

# Or login with an existing API key
npx crabskill login</code></pre>

    <div class="bg-orange-500/10 border border-orange-500/30 rounded-lg p-6 mb-8">
        <h3 class="text-orange-400 font-bold mb-2">⚠️ Email Verification</h3>
        <p class="text-neutral-300 text-sm mb-0">
            You must verify your email before purchasing paid skills. Free skills work without verification.
            Check your inbox after signup, or resend from the dashboard.
        </p>
    </div>

    <h2>CLI Quick Reference</h2>
    <pre><code># Search for skills
npx crabskill search calendar

# Install a skill
npx crabskill install google-calendar

# List installed skills
npx crabskill list

# Update all skills
npx crabskill update

# Get skill info
npx crabskill info weather

# Show help
npx crabskill --help</code></pre>

    <h2>Next Steps</h2>
    <ul>
        <li><a href="/installing">Learn more about installing skills</a></li>
        <li><a href="/meta-skill">Set up the meta-skill for automatic installation</a></li>
        <li><a href="/publishing">Publish your own skill</a></li>
    </ul>
</div>
@endsection
