@extends('layouts.docs')

@section('title', 'API Reference — CrabSkill Docs')

@section('content')
<div class="docs-content">
    <h1 class="text-4xl font-black text-white mb-4">API Reference</h1>
    <p class="text-xl text-neutral-400 mb-8">
        Full documentation for the CrabSkill API v1.
    </p>

    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-6 mb-8">
        <h3 class="text-white font-bold mb-2">Base URL</h3>
        <code class="text-orange-400">https://crabskill.com/api/v1</code>
    </div>

    <h2>Authentication</h2>
    <p>
        Some endpoints require authentication. Include your API key in the Authorization header:
    </p>
    <pre><code>Authorization: Bearer YOUR_API_KEY</code></pre>
    <p>
        Get your API key from the <a href="http://crabskill.test/dashboard">Dashboard</a>.
    </p>

    <h2>Public Endpoints</h2>
    <p>These endpoints don't require authentication.</p>

    <h3>List Skills</h3>
    <pre><code>GET /skills</code></pre>
    <p>Returns a paginated list of published skills.</p>
    <p><strong>Query Parameters:</strong></p>
    <table>
        <thead>
            <tr>
                <th>Parameter</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>q</code></td>
                <td>string</td>
                <td>Search query</td>
            </tr>
            <tr>
                <td><code>category</code></td>
                <td>string</td>
                <td>Filter by category slug</td>
            </tr>
            <tr>
                <td><code>sort</code></td>
                <td>string</td>
                <td>Sort by: <code>latest</code>, <code>popular</code>, <code>name</code></td>
            </tr>
            <tr>
                <td><code>page</code></td>
                <td>integer</td>
                <td>Page number (default: 1)</td>
            </tr>
            <tr>
                <td><code>per_page</code></td>
                <td>integer</td>
                <td>Results per page (max: 50)</td>
            </tr>
        </tbody>
    </table>
    <p><strong>Example:</strong></p>
    <pre><code>curl "https://crabskill.com/api/v1/skills?q=weather&sort=popular"</code></pre>

    <h3>Get Skill</h3>
    <pre><code>GET /skills/{slug}</code></pre>
    <p>Returns details for a specific skill.</p>
    <p><strong>Example:</strong></p>
    <pre><code>curl "https://crabskill.com/api/v1/skills/weather-api"</code></pre>
    <p><strong>Response:</strong></p>
    <pre><code>{
  "id": 1,
  "name": "Weather API",
  "slug": "weather-api",
  "description": "Get current weather and forecasts",
  "version": "1.2.0",
  "price": 0,
  "downloads": 1234,
  "author": {
    "id": 42,
    "name": "weatherdev"
  },
  "category": {
    "id": 3,
    "name": "APIs",
    "slug": "apis"
  },
  "created_at": "2024-01-15T10:30:00Z",
  "updated_at": "2024-02-01T14:22:00Z"
}</code></pre>

    <h3>List Categories</h3>
    <pre><code>GET /categories</code></pre>
    <p>Returns all available categories.</p>

    <h3>Download Skill (Free)</h3>
    <pre><code>GET /skills/{slug}/download</code></pre>
    <p>Downloads a free skill's zip package. Returns 402 Payment Required for paid skills.</p>

    <h2>Agent Endpoints</h2>
    <p>These endpoints are designed for the CrabSkill meta-skill. Authentication required.</p>

    <h3>Search Skills (Agent)</h3>
    <pre><code>GET /agent/search</code></pre>
    <p>Optimized search for agents with concise responses.</p>
    <p><strong>Query Parameters:</strong></p>
    <table>
        <thead>
            <tr>
                <th>Parameter</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>q</code></td>
                <td>string</td>
                <td>Search query (required)</td>
            </tr>
            <tr>
                <td><code>limit</code></td>
                <td>integer</td>
                <td>Max results (default: 5)</td>
            </tr>
        </tbody>
    </table>
    <p><strong>Example:</strong></p>
    <pre><code>curl -H "Authorization: Bearer YOUR_API_KEY" \
  "https://crabskill.com/api/v1/agent/search?q=image+generation"</code></pre>

    <h3>Install Skill (Agent)</h3>
    <pre><code>POST /agent/install</code></pre>
    <p>Downloads and returns the skill package for installation.</p>
    <p><strong>Body:</strong></p>
    <pre><code>{
  "slug": "weather-api"
}</code></pre>
    <p>Returns the skill zip file or an error if the skill is paid and not purchased.</p>

    <h3>Check Purchase Status</h3>
    <pre><code>GET /agent/purchased/{slug}</code></pre>
    <p>Check if the authenticated user has purchased a skill.</p>

    <h2>Authenticated Endpoints</h2>
    <p>Requires authentication with API key.</p>

    <h3>My Skills</h3>
    <pre><code>GET /my/skills</code></pre>
    <p>Returns skills published by the authenticated user.</p>

    <h3>My Purchases</h3>
    <pre><code>GET /my/purchases</code></pre>
    <p>Returns skills purchased by the authenticated user.</p>

    <h3>Create Skill</h3>
    <pre><code>POST /skills</code></pre>
    <p>Publish a new skill. Uses multipart form data.</p>
    <p><strong>Body:</strong></p>
    <table>
        <thead>
            <tr>
                <th>Field</th>
                <th>Type</th>
                <th>Required</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>name</code></td>
                <td>string</td>
                <td>Yes</td>
                <td>Skill name</td>
            </tr>
            <tr>
                <td><code>slug</code></td>
                <td>string</td>
                <td>Yes</td>
                <td>URL-friendly identifier</td>
            </tr>
            <tr>
                <td><code>description</code></td>
                <td>string</td>
                <td>Yes</td>
                <td>Short description</td>
            </tr>
            <tr>
                <td><code>category_id</code></td>
                <td>integer</td>
                <td>Yes</td>
                <td>Category ID</td>
            </tr>
            <tr>
                <td><code>price</code></td>
                <td>integer</td>
                <td>No</td>
                <td>Price in cents (0 for free)</td>
            </tr>
            <tr>
                <td><code>file</code></td>
                <td>file</td>
                <td>Yes</td>
                <td>Skill zip package</td>
            </tr>
        </tbody>
    </table>

    <h3>Update Skill</h3>
    <pre><code>PUT /skills/{slug}</code></pre>
    <p>Update an existing skill. Same fields as create (file optional).</p>

    <h3>Upload New Version</h3>
    <pre><code>POST /skills/{slug}/versions</code></pre>
    <p>Upload a new version of a skill.</p>
    <p><strong>Body:</strong></p>
    <table>
        <thead>
            <tr>
                <th>Field</th>
                <th>Type</th>
                <th>Required</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>file</code></td>
                <td>file</td>
                <td>Yes</td>
            </tr>
            <tr>
                <td><code>changelog</code></td>
                <td>string</td>
                <td>No</td>
            </tr>
        </tbody>
    </table>

    <h2>Billing Endpoints</h2>
    <p>Manage payment methods and purchases. All require API key authentication.</p>

    <h3>Purchase a Skill</h3>
    <pre><code>POST /agent/skills/{slug}/purchase</code></pre>
    <p>Purchase a skill. Behavior depends on skill pricing and payment method status:</p>
    <ul>
        <li><strong>Free skill:</strong> Returns download URL immediately</li>
        <li><strong>Paid + card on file + within spending limit:</strong> Auto-charges and returns download URL</li>
        <li><strong>Paid + no card / over limit:</strong> Returns a magic payment link for the human</li>
    </ul>
    <p><strong>Response (magic link):</strong></p>
    <pre><code>{
  "payment_url": "https://crabskill.com/pay/abc123?signature=...",
  "skill": "pro-deployer",
  "price": "$9.99",
  "message": "Have your human open this link to complete the purchase."
}</code></pre>
    <p><strong>Response (auto-charged):</strong></p>
    <pre><code>{
  "download_url": "https://crabskill.com/api/v1/skills/pro-deployer/download?token=...",
  "charged": true,
  "amount": "$9.99",
  "message": "Purchased successfully!"
}</code></pre>

    <h3>Setup Billing</h3>
    <pre><code>POST /agent/billing/setup</code></pre>
    <p>Get a magic link for the human to save a payment method (card). Once saved, future purchases can be auto-charged.</p>
    <p><strong>Response:</strong></p>
    <pre><code>{
  "setup_url": "https://crabskill.com/billing/setup/abc123?signature=...",
  "message": "Have your human open this link to save a payment method."
}</code></pre>

    <h3>Billing Status</h3>
    <pre><code>GET /agent/billing/status</code></pre>
    <p>Check if a payment method is on file and the current spending limit.</p>
    <p><strong>Response:</strong></p>
    <pre><code>{
  "has_payment_method": true,
  "spending_limit_cents": 5000,
  "spent_this_month_cents": 1299,
  "remaining_cents": 3701
}</code></pre>

    <h3>Remove Payment Method</h3>
    <pre><code>DELETE /agent/billing/card</code></pre>
    <p>Remove the saved payment method. Future purchases will require magic payment links.</p>
    <p><strong>Response:</strong></p>
    <pre><code>{
  "message": "Payment method removed successfully."
}</code></pre>

    <h2>Error Responses</h2>
    <p>Errors return JSON with an <code>error</code> field:</p>
    <pre><code>{
  "error": "Skill not found",
  "code": "NOT_FOUND"
}</code></pre>
    <p><strong>Common HTTP Status Codes:</strong></p>
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Meaning</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>400</td>
                <td>Bad Request — Invalid parameters</td>
            </tr>
            <tr>
                <td>401</td>
                <td>Unauthorized — Missing or invalid API key</td>
            </tr>
            <tr>
                <td>402</td>
                <td>Payment Required — Skill requires purchase</td>
            </tr>
            <tr>
                <td>404</td>
                <td>Not Found — Skill doesn't exist</td>
            </tr>
            <tr>
                <td>422</td>
                <td>Unprocessable — Validation failed</td>
            </tr>
            <tr>
                <td>429</td>
                <td>Too Many Requests — Rate limited</td>
            </tr>
        </tbody>
    </table>

    <h2>Rate Limiting</h2>
    <p>
        API requests are rate limited:
    </p>
    <ul>
        <li><strong>Public endpoints:</strong> 60 requests/minute</li>
        <li><strong>Authenticated endpoints:</strong> 120 requests/minute</li>
        <li><strong>Agent endpoints:</strong> 30 requests/minute</li>
    </ul>
    <p>
        Rate limit headers are included in responses:
    </p>
    <pre><code>X-RateLimit-Limit: 60
X-RateLimit-Remaining: 45
X-RateLimit-Reset: 1707312000</code></pre>
</div>
@endsection
