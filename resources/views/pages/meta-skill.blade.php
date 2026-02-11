@extends('layouts.docs')

@section('title', 'Meta-Skill — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">The CrabSkill Meta-Skill</h1>
    <p class="text-xl text-neutral-400 mb-8">
        Let your agent install skills by itself.
    </p>

    <h2>What is the Meta-Skill?</h2>
    <p>
        The CrabSkill meta-skill is a special skill that gives your agent the ability to browse, search, 
        and install other skills from CrabSkill — all without human intervention.
    </p>
    <p>
        Think of it as giving your agent access to a tool store where it can shop for new capabilities 
        whenever it needs them.
    </p>

    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-6 my-6">
        <h3 class="text-white font-bold mb-2">🧠 Agentic Commerce</h3>
        <p class="text-neutral-400 text-sm mb-0">
            This is what we call <strong>agentic commerce</strong> — AI systems that improve themselves by 
            acquiring new capabilities. Your agent becomes self-enhancing.
        </p>
    </div>

    <h2>Installation</h2>
    <p>Install the meta-skill like any other skill:</p>
    <pre><code>curl -sL crabskill.com/install/crabskill | bash</code></pre>

    <h2>Configuration</h2>
    <p>
        For full functionality, set your CrabSkill API key as an environment variable:
    </p>
    <pre><code>export CRABSKILL_API_KEY="your-api-key-here"</code></pre>
    <p>
        Without an API key, the meta-skill can still browse and install free skills. With an API key, 
        your agent can also install paid skills you've purchased.
    </p>

    <h2>How It Works</h2>
    <p>Once installed, your agent gains these capabilities:</p>

    <h3>1. Search for Skills</h3>
    <p>Your agent can search the CrabSkill marketplace:</p>
    <pre><code>Agent: "Let me search CrabSkill for weather-related skills..."

[Searches API: q=weather]

Agent: "Found 3 skills:
  1. weather-api (free) — Get weather from OpenWeatherMap
  2. weather-alerts (free) — Severe weather notifications  
  3. climate-data ($5) — Historical climate data analysis"</code></pre>

    <h3>2. Evaluate Skills</h3>
    <p>Your agent can read skill descriptions to understand what they do:</p>
    <pre><code>Agent: "The weather-api skill looks perfect for your request. 
       It can fetch current conditions and 5-day forecasts for any location.
       Would you like me to install it?"</code></pre>

    <h3>3. Install Skills</h3>
    <p>With permission (or autonomously, if configured), your agent installs the skill:</p>
    <pre><code>Agent: "Installing weather-api..."
       [Downloads and extracts to ~/.openclaw/skills/weather-api/]
       "Done! I can now help you with weather queries."</code></pre>

    <h3>4. Use New Skills Immediately</h3>
    <p>The installed skill is available right away:</p>
    <pre><code>You: "What's the weather in Tokyo?"
Agent: [Uses newly installed weather-api skill]
       "It's currently 18°C and cloudy in Tokyo..."</code></pre>

    <h2>Example Conversation</h2>
    <pre><code>You: I need to automate some GitHub Actions workflows.

Agent: I don't currently have a skill for GitHub Actions. Let me 
       search CrabSkill...

       Found "github-actions" — A skill for managing GitHub Actions 
       workflows. It can create, modify, and trigger workflows.
       
       Would you like me to install it?

You: Yes please.

Agent: Installing github-actions skill...
       Done! I can now help you with GitHub Actions.
       
       What would you like to do? I can:
       - List your current workflows
       - Create new workflows
       - Trigger workflow runs
       - Check workflow status</code></pre>

    <h2>Autonomous vs. Supervised Mode</h2>
    <p>
        You can configure how much autonomy your agent has:
    </p>

    <h3>Supervised Mode (Default)</h3>
    <p>
        The agent asks for permission before installing:
    </p>
    <pre><code>"I found a skill that could help. May I install it?"</code></pre>

    <h3>Autonomous Mode</h3>
    <p>
        The agent installs skills as needed without asking. Enable this by adding to your agent config:
    </p>
    <pre><code># In your agent's config or SKILL.md
crabskill_autonomous: true</code></pre>
    <p>
        <strong>Warning:</strong> Only enable autonomous mode if you trust the CrabSkill review process 
        and want your agent to self-enhance without human approval.
    </p>

    <h2>API Key Capabilities</h2>
    <table>
        <thead>
            <tr>
                <th>Capability</th>
                <th>Without Key</th>
                <th>With Key</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Browse free skills</td>
                <td>✓</td>
                <td>✓</td>
            </tr>
            <tr>
                <td>Install free skills</td>
                <td>✓</td>
                <td>✓</td>
            </tr>
            <tr>
                <td>Search optimized for agents</td>
                <td>✗</td>
                <td>✓</td>
            </tr>
            <tr>
                <td>Install purchased paid skills</td>
                <td>✗</td>
                <td>✓</td>
            </tr>
            <tr>
                <td>Higher rate limits</td>
                <td>✗</td>
                <td>✓</td>
            </tr>
        </tbody>
    </table>

    <h2>Security Considerations</h2>
    <p>
        The meta-skill inherits CrabSkill's security measures:
    </p>
    <ul>
        <li>All skills are reviewed before publication</li>
        <li>Your agent only installs skills from CrabSkill (not arbitrary URLs)</li>
        <li>Paid skills require prior purchase through the web UI</li>
    </ul>
    <p>
        For maximum safety, use supervised mode and review skills before approving installation.
    </p>

    <h2>Troubleshooting</h2>

    <h3>Agent can't find the meta-skill</h3>
    <p>
        Make sure it's installed in your skills directory:
    </p>
    <pre><code>ls ~/.openclaw/skills/crabskill/SKILL.md</code></pre>

    <h3>API key not working</h3>
    <p>
        Verify the environment variable is set:
    </p>
    <pre><code>echo $CRABSKILL_API_KEY</code></pre>

    <h3>Can't install paid skills</h3>
    <p>
        Paid skills must be purchased first via the web UI. The meta-skill can only download 
        skills you've already bought.
    </p>
</div>
@endsection
