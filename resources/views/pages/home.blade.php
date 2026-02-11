@extends('layouts.docs')

@section('title', 'CrabSkill Docs — OpenClaw Skill Marketplace')

@section('content')
<div class="docs-content">
    <div class="mb-12">
        <div class="text-5xl mb-4">🦀</div>
        <h1 class="text-4xl font-black text-white mb-4">CrabSkill Documentation</h1>
        <p class="text-xl text-neutral-400">
            The marketplace for OpenClaw agent skills. Learn how to discover, install, and publish skills 
            that make your agent smarter.
        </p>
    </div>

    <div class="grid gap-4 md:grid-cols-2 mb-12">
        <a href="/getting-started" class="block bg-neutral-900 border border-neutral-800 hover:border-orange-600/50 p-6 rounded-lg transition-all group">
            <div class="text-2xl mb-2">🚀</div>
            <h3 class="text-lg font-bold text-white group-hover:text-orange-500">Quick Start</h3>
            <p class="text-sm text-neutral-400 mt-1">Install your first skill in under a minute</p>
        </a>
        <a href="/publishing" class="block bg-neutral-900 border border-neutral-800 hover:border-orange-600/50 p-6 rounded-lg transition-all group">
            <div class="text-2xl mb-2">📦</div>
            <h3 class="text-lg font-bold text-white group-hover:text-orange-500">Publish a Skill</h3>
            <p class="text-sm text-neutral-400 mt-1">Share your skills with the community</p>
        </a>
        <a href="/meta-skill" class="block bg-neutral-900 border border-neutral-800 hover:border-orange-600/50 p-6 rounded-lg transition-all group">
            <div class="text-2xl mb-2">🧠</div>
            <h3 class="text-lg font-bold text-white group-hover:text-orange-500">Meta-Skill</h3>
            <p class="text-sm text-neutral-400 mt-1">Let your agent install skills automatically</p>
        </a>
        <a href="/api" class="block bg-neutral-900 border border-neutral-800 hover:border-orange-600/50 p-6 rounded-lg transition-all group">
            <div class="text-2xl mb-2">⚡</div>
            <h3 class="text-lg font-bold text-white group-hover:text-orange-500">API Reference</h3>
            <p class="text-sm text-neutral-400 mt-1">Full documentation for developers</p>
        </a>
    </div>

    <h2>What is CrabSkill?</h2>
    <p>
        CrabSkill is the marketplace for <strong>OpenClaw agent skills</strong>. Skills are packaged capabilities 
        that extend what your AI agent can do — from integrating with APIs to automating complex workflows.
    </p>
    <p>
        Every skill on CrabSkill can be installed with a single command:
    </p>
    <pre><code>curl -sL crabskill.com/install/weather | bash</code></pre>

    <h2>How It Works</h2>
    <ol>
        <li><strong>Browse</strong> — Find skills on <a href="http://crabskill.test">crabskill.com</a> or search via the API</li>
        <li><strong>Install</strong> — Use the install script or let your agent install skills automatically</li>
        <li><strong>Use</strong> — Skills are loaded into your agent's skill directory and ready to use</li>
    </ol>

    <h2>The Meta-Skill</h2>
    <p>
        Here's what makes CrabSkill unique: your agent can install skills <strong>by itself</strong>.
    </p>
    <p>
        Using the CrabSkill meta-skill, your agent can browse the marketplace, evaluate which skills it needs, 
        and install them automatically. No human intervention required.
    </p>
    <pre><code># Your agent can say:
"I need to work with weather data. Let me search CrabSkill for a weather skill."

# And then install it:
"Found the 'weather-api' skill. Installing now..."</code></pre>

    <h2>For Skill Creators</h2>
    <p>
        Build skills, share them with the community, and optionally earn money when people use your work.
    </p>
    <ul>
        <li><strong>Free skills</strong> — Share your work with the community</li>
        <li><strong>Paid skills</strong> — Set your price and earn with each purchase</li>
        <li><strong>Teams</strong> — Collaborate with others on skill bundles</li>
    </ul>
    <p>
        Ready to publish? Check out the <a href="/publishing">Publishing Guide</a>.
    </p>
</div>
@endsection
