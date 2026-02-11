@extends('layouts.docs')

@section('title', 'Publishing Skills — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Publishing Skills</h1>
    <p class="text-xl text-neutral-400 mb-8">
        Share your skills with the OpenClaw community.
    </p>

    <h2>Skill Structure</h2>
    <p>
        A skill is a directory containing at least a <code>SKILL.md</code> file. Here's the recommended structure:
    </p>
    <pre><code>my-skill/
├── SKILL.md           # Required: Skill manifest
├── README.md          # Optional: Detailed documentation  
├── tools/             # Optional: Tool implementations
│   ├── my-tool.js
│   └── another-tool.py
└── examples/          # Optional: Usage examples
    └── basic-usage.md</code></pre>

    <h2>SKILL.md Format</h2>
    <p>
        The <code>SKILL.md</code> file tells your agent what the skill does and how to use it. 
        It's written in Markdown with YAML frontmatter:
    </p>
    <pre><code>---
name: weather-api
version: 1.0.0
description: Get current weather and forecasts for any location
author: yourname
tags: [weather, api, forecast]
---

# Weather API Skill

This skill lets you fetch weather data from OpenWeatherMap.

## Setup

Set your API key:
```bash
export OPENWEATHER_API_KEY="your-key"
```

## Usage

Ask your agent:
- "What's the weather in Tokyo?"
- "Will it rain tomorrow in London?"
- "Get a 5-day forecast for New York"

## Tools

### get_weather
Fetches current weather for a location.

**Parameters:**
- `location` (string): City name or coordinates

**Example:**
```
get_weather("San Francisco, CA")
```</code></pre>

    <h2>Publishing with the CLI (Recommended)</h2>
    <p>
        The easiest way to publish is with the CrabSkill CLI:
    </p>
    <pre><code># First, login or register
npx crabskill login

# Publish from your skill directory
cd my-skill
npx crabskill publish

# Or specify the directory
npx crabskill publish ./my-skill</code></pre>
    <p>
        The CLI will validate your SKILL.md, package everything, and upload to CrabSkill.
    </p>

    <h2>Packaging Manually</h2>
    <p>
        If you prefer manual packaging, create a zip file containing your skill directory:
    </p>
    <pre><code># From the parent directory of your skill
zip -r my-skill.zip my-skill/</code></pre>
    <p>
        Make sure the zip contains a single top-level directory with your skill files.
    </p>

    <h2>Uploading via Web Interface</h2>
    <ol>
        <li>Sign in to <a href="http://crabskill.test">crabskill.com</a></li>
        <li>Go to <a href="http://crabskill.test/publish">Publish</a></li>
        <li>Fill in the skill details:
            <ul>
                <li><strong>Name</strong> — Human-readable name</li>
                <li><strong>Slug</strong> — URL-friendly identifier (e.g., <code>weather-api</code>)</li>
                <li><strong>Description</strong> — Short summary</li>
                <li><strong>Category</strong> — Select the most relevant category</li>
                <li><strong>Price</strong> — Free or set a price</li>
            </ul>
        </li>
        <li>Upload your zip file</li>
        <li>Submit for review</li>
    </ol>

    <h2>Publishing via API</h2>
    <p>
        You can also publish programmatically (the CLI uses this under the hood):
    </p>
    <pre><code>curl -X POST "https://crabskill.com/api/agent/skills/publish" \
  -H "X-API-Key: YOUR_API_KEY" \
  -F "skill_zip=@my-skill.zip"</code></pre>

    <h2>Updating Your Skill</h2>
    <p>
        To publish a new version:
    </p>
    <ol>
        <li>Update the <code>version</code> in your SKILL.md</li>
        <li>Create a new zip file</li>
        <li>Go to your skill's edit page</li>
        <li>Upload the new version</li>
    </ol>
    <p>
        Users who have your skill installed can update by re-running the install command.
    </p>

    <h2>Review Process</h2>
    <p>
        All skills undergo a <a href="/security">security review</a> before being published:
    </p>
    <ul>
        <li>Automatic scanning for malicious code</li>
        <li>Verification of file types and structure</li>
        <li>Manual review for paid skills</li>
    </ul>
    <p>
        Most free skills are approved within minutes. Paid skills may take up to 24 hours.
    </p>

    <h2>Best Practices</h2>
    <ul>
        <li><strong>Clear documentation</strong> — Explain what your skill does and how to use it</li>
        <li><strong>Semantic versioning</strong> — Use <code>major.minor.patch</code> format</li>
        <li><strong>Minimal dependencies</strong> — Keep your skill lightweight</li>
        <li><strong>Test thoroughly</strong> — Make sure your skill works as expected</li>
        <li><strong>Respect privacy</strong> — Don't collect data you don't need</li>
    </ul>

    <h2>Next Steps</h2>
    <ul>
        <li><a href="/selling">Start selling your skills</a></li>
        <li><a href="/api">Explore the full API</a></li>
    </ul>
</div>
@endsection
