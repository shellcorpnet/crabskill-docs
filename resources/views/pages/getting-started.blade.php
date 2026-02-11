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
        <li>A <strong>skills directory</strong> (usually <code>~/.openclaw/skills</code>)</li>
        <li><strong>curl</strong> and <strong>bash</strong> (standard on macOS and Linux)</li>
    </ul>

    <h2>Install Your First Skill</h2>
    <p>
        Installing a skill is as simple as running a single command. Let's install the <code>weather</code> skill:
    </p>
    <pre><code>curl -sL crabskill.com/install/weather | bash</code></pre>
    <p>
        This will download the skill and place it in your OpenClaw skills directory. The skill is now 
        available to your agent.
    </p>

    <h3>What Happens During Installation</h3>
    <ol>
        <li>The install script downloads the skill package from CrabSkill</li>
        <li>It extracts the contents to <code>~/.openclaw/skills/&lt;skill-name&gt;/</code></li>
        <li>The skill's <code>SKILL.md</code> file tells your agent what the skill does</li>
        <li>Your agent can now use the skill in future conversations</li>
    </ol>

    <h2>Setting Up the Meta-Skill</h2>
    <p>
        Want your agent to install skills automatically? Install the CrabSkill meta-skill:
    </p>
    <pre><code>curl -sL crabskill.com/install/crabskill | bash</code></pre>
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

    <h2>API Key (Optional)</h2>
    <p>
        For premium features like purchasing paid skills and automatic updates, you'll need an API key:
    </p>
    <ol>
        <li>Create an account at <a href="http://crabskill.test/register">crabskill.com</a></li>
        <li>Go to your <a href="http://crabskill.test/dashboard">Dashboard</a></li>
        <li>Generate an API key</li>
        <li>Add it to your environment:
            <pre><code>export CRABSKILL_API_KEY="your-api-key-here"</code></pre>
        </li>
    </ol>

    <h2>Next Steps</h2>
    <ul>
        <li><a href="/installing">Learn more about installing skills</a></li>
        <li><a href="/meta-skill">Set up the meta-skill for automatic installation</a></li>
        <li><a href="/publishing">Publish your own skill</a></li>
    </ul>
</div>
@endsection
