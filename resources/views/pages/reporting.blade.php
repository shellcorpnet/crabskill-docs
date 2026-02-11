@extends('layouts.docs')

@section('title', 'Reporting & Safety — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Reporting & Safety</h1>
    <p class="text-xl text-neutral-400 mb-8">
        How we keep the marketplace safe and how you can help.
    </p>

    <h2>AI Security Audit System</h2>
    <p>
        Every skill uploaded to CrabSkill is automatically scanned by our AI-powered security 
        system before it becomes available for download.
    </p>

    <h3>How It Works</h3>
    <ol>
        <li><strong>Upload</strong> — Developer submits a skill package</li>
        <li><strong>Extraction</strong> — System extracts and catalogs all files</li>
        <li><strong>AI Analysis</strong> — GPT-4.1 reviews the code for security issues</li>
        <li><strong>Verdict</strong> — Skill receives PASS, WARN, or FAIL status</li>
        <li><strong>Publication</strong> — PASS/WARN skills are published; FAIL skills are blocked</li>
    </ol>

    <h3>What the AI Looks For</h3>
    <ul>
        <li><strong>Data exfiltration</strong> — Attempts to send data to external servers</li>
        <li><strong>Credential harvesting</strong> — Code that reads API keys, passwords, or tokens</li>
        <li><strong>Destructive operations</strong> — rm -rf, format commands, file deletion</li>
        <li><strong>Prompt injection</strong> — Attempts to manipulate agent behavior</li>
        <li><strong>Obfuscation</strong> — Encoded or hidden malicious code</li>
        <li><strong>Resource abuse</strong> — Crypto mining, excessive API calls</li>
        <li><strong>Social engineering</strong> — Instructions to bypass safety measures</li>
    </ul>

    <h3>Audit Verdicts</h3>
    <table>
        <thead>
            <tr>
                <th>Verdict</th>
                <th>Meaning</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><span class="text-green-500 font-bold">PASS</span></td>
                <td>No security issues detected</td>
                <td>Published immediately</td>
            </tr>
            <tr>
                <td><span class="text-yellow-500 font-bold">WARN</span></td>
                <td>Minor concerns, but likely safe</td>
                <td>Published with warning badge</td>
            </tr>
            <tr>
                <td><span class="text-red-500 font-bold">FAIL</span></td>
                <td>Security issues detected</td>
                <td>Blocked from publication</td>
            </tr>
        </tbody>
    </table>

    <h3>Checking a Skill's Audit Status</h3>
    <p>
        Every skill page shows its audit status. You can also check via API:
    </p>
    <pre><code>curl "https://crabskill.com/api/v1/skills/example-skill"

# Response includes:
{
  "audit_status": "pass",
  "audit_details": "No security issues detected"
}</code></pre>

    <div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-6 my-6">
        <h4 class="text-blue-400 font-bold mb-2">ℹ️ Audit Limitations</h4>
        <p class="text-neutral-300 text-sm mb-0">
            While our AI audit catches most malicious patterns, it's not perfect. Always review 
            a skill's SKILL.md and check the publisher's reputation before installing.
        </p>
    </div>

    <hr class="my-12 border-neutral-800">

    <h2>Reporting a Suspicious Skill</h2>
    <p>
        Found something that looks suspicious? Report it immediately.
    </p>

    <h3>How to Report</h3>
    <ol>
        <li>Go to the skill's page on <a href="https://crabskill.com">crabskill.com</a></li>
        <li>Click the <strong>"Report"</strong> button (flag icon)</li>
        <li>Select a reason:
            <ul>
                <li>Malicious code</li>
                <li>Data exfiltration</li>
                <li>Misleading description</li>
                <li>Copyright violation</li>
                <li>Other (describe)</li>
            </ul>
        </li>
        <li>Add any details or evidence</li>
        <li>Submit the report</li>
    </ol>

    <h3>What to Include in Your Report</h3>
    <ul>
        <li>What suspicious behavior you observed</li>
        <li>Specific files or code snippets if you found them</li>
        <li>Any logs from your agent</li>
        <li>Steps to reproduce the issue</li>
    </ul>

    <hr class="my-12 border-neutral-800">

    <h2>What Happens After Reporting</h2>

    <h3>Immediate Actions</h3>
    <ul>
        <li>Report is logged and queued for review</li>
        <li>For severe reports, skill may be temporarily suspended pending review</li>
        <li>Publisher is notified of the report (not who reported)</li>
    </ul>

    <h3>Review Process</h3>
    <ol>
        <li><strong>Triage</strong> — Report is categorized by severity</li>
        <li><strong>Investigation</strong> — Human reviewer examines the skill</li>
        <li><strong>Decision</strong> — Skill is cleared, warned, or removed</li>
        <li><strong>Notification</strong> — Reporter is updated on the outcome</li>
    </ol>

    <h3>Possible Outcomes</h3>
    <ul>
        <li><strong>Cleared</strong> — No issue found, skill remains published</li>
        <li><strong>Warning</strong> — Publisher asked to fix issues</li>
        <li><strong>Removed</strong> — Skill is unpublished</li>
        <li><strong>Account banned</strong> — Repeat offenders are banned from the platform</li>
    </ul>

    <hr class="my-12 border-neutral-800">

    <h2>Self-Protection Best Practices</h2>

    <h3>Before Installing</h3>
    <ul>
        <li><strong>Check audit status</strong> — Only install PASS or WARN skills</li>
        <li><strong>Read the SKILL.md</strong> — Understand what permissions the skill needs</li>
        <li><strong>Check the publisher</strong> — Look at their other skills and reviews</li>
        <li><strong>Prefer verified publishers</strong> — They've passed additional vetting</li>
    </ul>

    <h3>After Installing</h3>
    <ul>
        <li><strong>Monitor your agent</strong> — Watch for unexpected behavior</li>
        <li><strong>Check network activity</strong> — Unusual outbound connections?</li>
        <li><strong>Review what the skill accesses</strong> — Does it read files it shouldn't?</li>
    </ul>

    <h3>If Something Goes Wrong</h3>
    <ol>
        <li><strong>Remove the skill</strong> — <code>rm -rf ~/.openclaw/skills/&lt;skill-name&gt;</code></li>
        <li><strong>Report it</strong> — Help protect others</li>
        <li><strong>Check for damage</strong> — Review what data the skill may have accessed</li>
        <li><strong>Rotate credentials</strong> — If API keys may have been exposed</li>
    </ol>

    <hr class="my-12 border-neutral-800">

    <h2>Responsible Disclosure</h2>
    <p>
        Found a security vulnerability in CrabSkill itself (not a skill)? We appreciate responsible 
        disclosure.
    </p>
    <ul>
        <li>Email <a href="mailto:security@crabskill.com">security@crabskill.com</a></li>
        <li>Include detailed steps to reproduce</li>
        <li>Give us 90 days to fix before public disclosure</li>
        <li>We don't currently have a bug bounty program, but we'll credit you publicly</li>
    </ul>
</div>
@endsection
