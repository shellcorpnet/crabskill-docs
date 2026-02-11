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
        Visit <a href="http://crabskill.test/skills">crabskill.com/skills</a> to browse all available skills. 
        You can filter by category, sort by popularity, and search for specific functionality.
    </p>

    <h3>Search via API</h3>
    <p>
        Search programmatically using the API:
    </p>
    <pre><code>curl "https://crabskill.com/api/v1/skills?q=github"</code></pre>

    <h3>Search via Meta-Skill</h3>
    <p>
        If you have the CrabSkill meta-skill installed, your agent can search directly:
    </p>
    <pre><code>"Search CrabSkill for image generation skills"</code></pre>

    <h2>Installation Methods</h2>

    <h3>Method 1: curl | bash (Recommended)</h3>
    <p>
        The simplest way to install a skill:
    </p>
    <pre><code>curl -sL crabskill.com/install/&lt;skill-slug&gt; | bash</code></pre>
    <p>Example:</p>
    <pre><code>curl -sL crabskill.com/install/weather-api | bash</code></pre>

    <h3>Method 2: Manual Download</h3>
    <p>
        Download and extract manually if you prefer:
    </p>
    <pre><code># Download the skill package
curl -o skill.zip "https://crabskill.com/api/v1/skills/weather-api/download"

# Extract to skills directory
unzip skill.zip -d ~/.openclaw/skills/weather-api/</code></pre>

    <h3>Method 3: Meta-Skill (Automatic)</h3>
    <p>
        Let your agent handle installation:
    </p>
    <pre><code>"Install the weather-api skill from CrabSkill"</code></pre>

    <h2>Skill Directory Structure</h2>
    <p>
        After installation, skills are organized like this:
    </p>
    <pre><code>~/.openclaw/skills/
├── weather-api/
│   ├── SKILL.md          # Skill manifest (required)
│   ├── README.md         # Documentation
│   └── tools/            # Tool implementations
├── github-actions/
│   ├── SKILL.md
│   └── ...
└── ...</code></pre>

    <h2>Updating Skills</h2>
    <p>
        Re-run the install command to update to the latest version:
    </p>
    <pre><code>curl -sL crabskill.com/install/weather-api | bash</code></pre>
    <p>
        The installer will replace existing files with the new version.
    </p>

    <h2>Removing Skills</h2>
    <p>
        To uninstall a skill, simply delete its directory:
    </p>
    <pre><code>rm -rf ~/.openclaw/skills/weather-api</code></pre>

    <h2>Paid Skills</h2>
    <p>
        Some skills require purchase. To install a paid skill:
    </p>
    <ol>
        <li>Purchase the skill on <a href="http://crabskill.test">crabskill.com</a></li>
        <li>Set your API key: <code>export CRABSKILL_API_KEY="..."</code></li>
        <li>Install normally — the script will authenticate automatically</li>
    </ol>
    <pre><code># With API key set, install works for paid skills you've purchased
curl -sL crabskill.com/install/premium-skill | bash</code></pre>

    <h2>Troubleshooting</h2>

    <h3>Permission Denied</h3>
    <p>
        Make sure your skills directory is writable:
    </p>
    <pre><code>chmod 755 ~/.openclaw/skills</code></pre>

    <h3>Skill Not Found</h3>
    <p>
        Double-check the skill slug. You can find it on the skill's page URL:
        <code>crabskill.com/skills/<strong>weather-api</strong></code>
    </p>

    <h3>Authentication Failed</h3>
    <p>
        For paid skills, verify your API key is set correctly:
    </p>
    <pre><code>echo $CRABSKILL_API_KEY</code></pre>
</div>
@endsection
