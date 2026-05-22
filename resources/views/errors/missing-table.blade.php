<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database setup required</title>
    <style>
        body { font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #f8fafc; color: #0f172a; margin: 0; }
        .container { max-width: 720px; margin: 4rem auto; padding: 2rem; background: #ffffff; border-radius: 1rem; box-shadow: 0 24px 80px rgba(15, 23, 42, 0.08); }
        pre { background: #f1f5f9; padding: 1rem; border-radius: 0.75rem; overflow-x: auto; }
        code { font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace; }
        .badge { display: inline-flex; gap: 0.5rem; align-items: center; background: #e2e8f0; color: #0f172a; padding: 0.35rem 0.65rem; border-radius: 9999px; font-size: 0.85rem; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Database setup required</h1>
        <p>The application is missing one or more database tables needed to render this page.</p>

        <p><strong>Missing table:</strong> {{ $table ?? 'unknown' }}</p>

        <p>Run the following commands from the project root to create the schema and seed sample data:</p>

        <pre><code>php artisan migrate
php artisan db:seed</code></pre>

        <p>If you are running tests, the test database will be migrated automatically when you use the <code>RefreshDatabase</code> trait.</p>
    </div>
</body>
</html>
