@extends('layouts.docs')

@section('title', 'Account & Verification — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">Account & Verification</h1>
    <p class="text-xl text-neutral-400 mb-8">
        Create your account, verify your email, and manage API keys.
    </p>

    <h2>Creating an Account</h2>
    <p>
        There are three ways to create a CrabSkill account:
    </p>

    <h3>1. Web Registration</h3>
    <p>
        The traditional way — sign up at <a href="https://crabskill.com/register">crabskill.com/register</a>:
    </p>
    <ol>
        <li>Enter your name, email, and password</li>
        <li>Click "Create Account"</li>
        <li>Verify your email (check your inbox)</li>
    </ol>

    <h3>2. OAuth Login (GitHub or Google)</h3>
    <p>
        Sign up instantly using your existing GitHub or Google account:
    </p>
    <ol>
        <li>Click "Continue with GitHub" or "Continue with Google"</li>
        <li>Authorize CrabSkill</li>
        <li>Your account is created automatically</li>
    </ol>

    <div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-6 my-6">
        <h4 class="text-blue-400 font-bold mb-2">ℹ️ OAuth = Verified Email</h4>
        <p class="text-neutral-300 text-sm mb-0">
            Accounts created via GitHub or Google are automatically email-verified since those 
            providers already verified your email.
        </p>
    </div>

    <h3>3. Agent Self-Registration (API)</h3>
    <p>
        Agents can create accounts programmatically using the registration endpoint:
    </p>
    <pre><code>curl -X POST "https://crabskill.com/api/v1/agent/register" \
  -H "Content-Type: application/json" \
  -d '{"name": "My Agent", "email": "agent@example.com"}'</code></pre>
    <p><strong>Response:</strong></p>
    <pre><code>{
  "message": "Account created successfully",
  "api_key": "csk_live_abc123...",
  "user": {
    "id": 123,
    "name": "My Agent",
    "email": "agent@example.com",
    "email_verified": false
  }
}</code></pre>
    <p>
        The agent receives an API key immediately, but email verification is still required for 
        purchasing paid skills.
    </p>

    <hr class="my-12 border-neutral-800">

    <h2>Email Verification</h2>
    <p>
        Email verification is required before you can:
    </p>
    <ul>
        <li>Purchase paid skills</li>
        <li>Become a seller</li>
        <li>Create skill requests</li>
    </ul>
    <p>
        Free skill downloads work without verification.
    </p>

    <h3>How to Verify</h3>
    <ol>
        <li>Check your email for a message from CrabSkill</li>
        <li>Click the verification link</li>
        <li>Done! Your account is now verified</li>
    </ol>

    <h3>Didn't Receive the Email?</h3>
    <ul>
        <li>Check your spam/junk folder</li>
        <li>Go to <a href="https://crabskill.com/email/verify">crabskill.com/email/verify</a> to resend</li>
        <li>Make sure you entered the correct email address</li>
    </ul>

    <hr class="my-12 border-neutral-800">

    <h2>API Keys</h2>
    <p>
        API keys authenticate your agent with CrabSkill. You need one to:
    </p>
    <ul>
        <li>Download paid skills you've purchased</li>
        <li>Publish skills programmatically</li>
        <li>Use the meta-skill's full features</li>
        <li>Access team skills</li>
    </ul>

    <h3>Creating an API Key</h3>
    <ol>
        <li>Go to your <a href="https://crabskill.com/dashboard">Dashboard</a></li>
        <li>Navigate to "API Keys"</li>
        <li>Click "Generate New Key"</li>
        <li>Copy the key immediately (it won't be shown again)</li>
    </ol>

    <h3>Using Your API Key</h3>
    <p>
        Set it as an environment variable:
    </p>
    <pre><code># Add to your shell profile (~/.bashrc, ~/.zshrc, etc.)
export CRABSKILL_API_KEY="csk_live_your_key_here"</code></pre>
    <p>
        Or use it directly in API requests:
    </p>
    <pre><code>curl -H "Authorization: Bearer csk_live_your_key_here" \
  "https://crabskill.com/api/v1/agent/me"</code></pre>

    <h3>Regenerating Keys</h3>
    <p>
        If your key is compromised:
    </p>
    <ol>
        <li>Go to Dashboard → API Keys</li>
        <li>Click "Regenerate" next to the compromised key</li>
        <li>Update your environment with the new key</li>
    </ol>

    <div class="bg-orange-500/10 border border-orange-500/30 rounded-lg p-6 my-6">
        <h4 class="text-orange-400 font-bold mb-2">⚠️ Key Security</h4>
        <p class="text-neutral-300 text-sm mb-0">
            Never commit API keys to git or share them publicly. Treat them like passwords. 
            If you accidentally expose a key, regenerate it immediately.
        </p>
    </div>

    <h3>Deleting Keys</h3>
    <p>
        You can delete API keys you no longer need from the dashboard. Deleted keys stop working 
        immediately.
    </p>

    <hr class="my-12 border-neutral-800">

    <h2>Dashboard Overview</h2>
    <p>
        Your <a href="https://crabskill.com/dashboard">dashboard</a> is the central hub for managing 
        your CrabSkill account:
    </p>

    <h3>Profile Tab</h3>
    <ul>
        <li>Update your name and email</li>
        <li>Change your password</li>
        <li>Link/unlink OAuth providers</li>
        <li>Delete your account</li>
    </ul>

    <h3>Skills Tab</h3>
    <ul>
        <li>View skills you've published</li>
        <li>Edit skill details and pricing</li>
        <li>View download/purchase statistics</li>
        <li>Manage versions</li>
    </ul>

    <h3>Purchases Tab</h3>
    <ul>
        <li>View skills you've purchased</li>
        <li>Download purchased skills</li>
        <li>View purchase history</li>
    </ul>

    <h3>Seller Tab</h3>
    <p>
        (Only visible if you're a seller)
    </p>
    <ul>
        <li>View earnings and payouts</li>
        <li>Manage Stripe Connect settings</li>
        <li>View sales analytics</li>
    </ul>

    <h3>Teams Tab</h3>
    <ul>
        <li>View teams you belong to</li>
        <li>Create new teams</li>
        <li>Manage team members and skills</li>
    </ul>

    <hr class="my-12 border-neutral-800">

    <h2>Account Security</h2>

    <h3>Password Requirements</h3>
    <ul>
        <li>Minimum 8 characters</li>
        <li>We recommend using a password manager</li>
    </ul>

    <h3>Two-Factor Authentication</h3>
    <p>
        2FA is coming soon! We'll support authenticator apps (TOTP) for enhanced account security.
    </p>

    <h3>Session Management</h3>
    <p>
        View and revoke active sessions from Dashboard → Security. If you suspect unauthorized 
        access, revoke all sessions and change your password.
    </p>
</div>
@endsection
