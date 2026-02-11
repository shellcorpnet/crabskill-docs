@extends('layouts.docs')

@section('title', 'Installing Skills — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Installing Skills</h1>
    <p class="text-xl text-neutral-400 mb-8">
        Detailed guide to finding and installing skills for your agent.
    </p>

    <h2>Finding Skills</h2>
    
    <h3>Browse the Marketplace</h3>
    <p>
        Visit <a href="https://crabskill.com/skills">crabskill.com/skills</a> to browse all available skills. 
        You can filter by category, sort by popularity, and search for specific functionality.
    </p>

    <h3>Search via CLI</h3>
    <p>
        Search from your terminal:
    </p>
    <pre><code>npx crabskill search github</code></pre>

    <h3>Search via Meta-Skill</h3>
    <p>
        If you have the CrabSkill meta-skill installed, your agent can search directly:
    </p>
    <pre><code>"Search CrabSkill for image generation skills"</code></pre>

    <h2>Installation Methods</h2>

    <h3>Method 1: npx (Recommended)</h3>
    <p>
        The simplest way to install a skill — no global install required:
    </p>
    <pre><code>npx crabskill install &lt;skill-slug&gt;</code></pre>
    <p>Example:</p>
    <pre><code>npx crabskill install weather-api</code></pre>

    <h3>Method 2: Global CLI</h3>
    <p>
        Install the CLI globally for faster repeated use:
    </p>
    <pre><code># Install globally once
npm install -g crabskill

# Then install skills without npx
crabskill install weather-api</code></pre>

    <h3>Method 3: curl | bash</h3>
    <p>
        If you don't have Node.js, use the shell script:
    </p>
    <pre><code>curl -sL crabskill.com/install/&lt;skill-slug&gt; | bash</code></pre>
    <p>Example:</p>
    <pre><code>curl -sL crabskill.com/install/weather-api | bash</code></pre>

    <h3>Method 4: Manual Download</h3>
    <p>
        Download and extract manually if you prefer:
    </p>
    <pre><code># Download the skill package
curl -o skill.zip "https://crabskill.com/api/skills/weather-api/download"

# Extract to skills directory
unzip skill.zip -d ~/.openclaw/workspace/skills/weather-api/</code></pre>

    <h3>Method 5: Meta-Skill (Automatic)</h3>
    <p>
        Let your agent handle installation:
    </p>
    <pre><code>"Install the weather-api skill from CrabSkill"</code></pre>

    <h2>CLI Commands</h2>
    <pre><code># Install a skill
npx crabskill install &lt;name&gt;

# Search for skills
npx crabskill search &lt;query&gt;

# List installed skills
npx crabskill list

# Check for updates
npx crabskill list --check-updates

# Update a skill (or all)
npx crabskill update [name]

# Uninstall a skill
npx crabskill uninstall &lt;name&gt;

# Get skill info
npx crabskill info &lt;name&gt;</code></pre>

    <h2>Skill Directory Structure</h2>
    <p>
        After installation, skills are organized like this:
    </p>
    <pre><code>~/.openclaw/workspace/skills/
├── weather-api/
│   ├── SKILL.md          # Skill manifest (required)
│   ├── README.md         # Documentation
│   └── tools/            # Tool implementations
├── github-actions/
│   ├── SKILL.md
│   └── ...
└── ...</code></pre>

    <h2>Custom Skills Directory</h2>
    <p>
        Override the default skills location with an environment variable:
    </p>
    <pre><code>export OPENCLAW_SKILLS_DIR=/path/to/my/skills
npx crabskill install weather-api</code></pre>

    <h2>Updating Skills</h2>
    <p>
        Update a specific skill or all installed skills:
    </p>
    <pre><code># Update specific skill
npx crabskill update weather-api

# Update all skills
npx crabskill update</code></pre>

    <h2>Removing Skills</h2>
    <p>
        Use the CLI to uninstall:
    </p>
    <pre><code>npx crabskill uninstall weather-api</code></pre>
    <p>
        Or simply delete the directory:
    </p>
    <pre><code>rm -rf ~/.openclaw/workspace/skills/weather-api</code></pre>

    <h2>Paid Skills</h2>
    <p>
        Some skills require purchase. To install a paid skill:
    </p>
    <ol>
        <li>Login to the CLI: <code>npx crabskill login</code></li>
        <li>Purchase the skill on <a href="https://crabskill.com">crabskill.com</a> or via CLI</li>
        <li>Install normally — the CLI will authenticate automatically</li>
    </ol>
    <pre><code># Login first
npx crabskill login

# Install works for paid skills you've purchased
npx crabskill install premium-skill</code></pre>

    <div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-6 my-6">
        <h4 class="text-blue-400 font-bold mb-2">ℹ️ Email Verification Required</h4>
        <p class="text-neutral-300 text-sm mb-0">
            You must verify your email before purchasing paid skills. Create an account and check your 
            inbox for the verification link.
        </p>
    </div>

    <h2>Troubleshooting</h2>

    <h3>Permission Denied</h3>
    <p>
        Make sure your skills directory is writable:
    </p>
    <pre><code>chmod 755 ~/.openclaw/workspace/skills</code></pre>

    <h3>Skill Not Found</h3>
    <p>
        Double-check the skill slug. You can find it on the skill's page URL:
        <code>crabskill.com/skills/<strong>weather-api</strong></code>
    </p>

    <h3>Authentication Failed</h3>
    <p>
        For paid skills, verify you're logged in:
    </p>
    <pre><code>npx crabskill whoami</code></pre>
</div>
@endsection
