@extends('layouts.docs')

@section('title', 'Security — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Security</h1>
    <p class="text-xl text-neutral-400 mb-8">
        How we keep your agent safe from malicious skills.
    </p>

    <div class="bg-gradient-to-r from-orange-600/20 to-orange-800/20 border border-orange-600/30 rounded-lg p-6 mb-8">
        <p class="text-neutral-300 mb-0">
            For complete details on our security practices, visit the 
            <a href="http://crabskill.test/security" class="text-orange-500 hover:text-orange-400 font-semibold">
                CrabSkill Security Page →
            </a>
        </p>
    </div>

    <h2>Why Skill Security Matters</h2>
    <p>
        Skills run inside your agent with access to tools, files, and APIs. A malicious skill could:
    </p>
    <ul>
        <li>Exfiltrate sensitive data from your system</li>
        <li>Run destructive commands</li>
        <li>Harvest credentials and API keys</li>
        <li>Compromise your agent's integrity</li>
    </ul>
    <p>
        We take this seriously and review every skill before it's published.
    </p>

    <h2>Our Review Process</h2>
    <p>
        Every skill undergoes <strong>adversarial review</strong> — a security audit designed to catch malicious 
        behavior:
    </p>
    <ul>
        <li><strong>Automatic scanning</strong> for malicious content and patterns</li>
        <li><strong>File type validation</strong> — we block executables, PHP, shell scripts, .env files</li>
        <li><strong>Archive inspection</strong> — zip files are checked for path traversal attacks</li>
        <li><strong>Resource limits</strong> — file size caps prevent exhaustion attacks</li>
        <li><strong>Behavioral analysis</strong> — suspicious API calls and data exfiltration patterns</li>
    </ul>

    <h2>What We Scan For</h2>
    <ul>
        <li><strong>Malicious code patterns</strong> — eval(), exec(), system calls in unexpected places</li>
        <li><strong>Data exfiltration</strong> — unauthorized network requests, credential harvesting</li>
        <li><strong>Resource abuse</strong> — crypto mining, excessive API calls</li>
        <li><strong>Social engineering</strong> — skills that trick agents into bypassing safety</li>
        <li><strong>Supply chain attacks</strong> — dependency confusion, typosquatting</li>
    </ul>

    <h2>Best Practices for Users</h2>
    <p>
        Even with our security measures, follow these practices:
    </p>
    <ol>
        <li><strong>Review SKILL.md before installing</strong> — Understand what the skill does</li>
        <li><strong>Check the publisher's reputation</strong> — Look at their other skills and reviews</li>
        <li><strong>Prefer verified publishers</strong> — Verified badges mean extra scrutiny</li>
        <li><strong>Monitor your agent</strong> — Watch for unexpected behavior after installing new skills</li>
    </ol>

    <h2>Report a Suspicious Skill</h2>
    <p>
        Found something suspicious? Email <a href="mailto:security@crabskill.com">security@crabskill.com</a> with:
    </p>
    <ul>
        <li>Skill name and URL</li>
        <li>What suspicious behavior you observed</li>
        <li>Any logs or evidence you can share</li>
    </ul>

    <h2>Responsible Disclosure</h2>
    <p>
        Found a vulnerability in CrabSkill itself? Please report it to 
        <a href="mailto:security@crabskill.com">security@crabskill.com</a>. We ask for 90 days to fix issues 
        before public disclosure.
    </p>
</div>
@endsection
