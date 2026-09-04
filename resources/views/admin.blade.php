<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio Admin</title>
    <style>
        :root {
            --bg: #0a192f;
            --navy: #112240;
            --accent: #64ffda;
            --text: #ccd6f6;
            --muted: #8892b0;
            --mono: 'JetBrains Mono', ui-monospace, monospace;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Inter, system-ui, sans-serif;
            line-height: 1.6;
        }
        .wrap { max-width: 760px; margin: 0 auto; padding: 48px 24px; }
        h1 {
            font-size: 24px;
            color: var(--accent);
            font-family: var(--mono);
            margin: 0 0 4px;
        }
        .sub { color: var(--muted); font-size: 14px; margin-bottom: 32px; }
        .card {
            background: var(--navy);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 20px;
        }
        .card h2 { font-size: 16px; margin: 0 0 16px; color: var(--text); font-family: var(--mono); }
        label { display: block; font-size: 14px; color: var(--muted); margin-bottom: 8px; }
        input[type=password], select, input[type=file] {
            width: 100%;
            padding: 10px 12px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 6px;
            color: var(--text);
            font-size: 14px;
            margin-bottom: 16px;
        }
        input[type=file] { padding: 8px; }
        button {
            background: transparent;
            border: 1px solid var(--accent);
            color: var(--accent);
            padding: 10px 20px;
            border-radius: 6px;
            font-family: var(--mono);
            font-size: 13px;
            cursor: pointer;
        }
        button:hover { background: rgba(100,255,218,0.1); }
        .msg { border-radius: 6px; padding: 12px 16px; margin-bottom: 20px; font-size: 14px; }
        .msg.ok { background: rgba(100,255,218,0.1); color: var(--accent); border: 1px solid rgba(100,255,218,0.3); }
        .msg.err { background: rgba(255,100,100,0.1); color: #ff6b6b; border: 1px solid rgba(255,100,100,0.3); }
        .hint { font-size: 13px; color: #a8b2d1; margin-top: 8px; }
        pre.out {
            background: #0a192f;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 6px;
            padding: 16px;
            font-size: 12px;
            color: var(--muted);
            overflow-x: auto;
            white-space: pre-wrap;
        }
        .row { display: flex; gap: 12px; align-items: flex-end; }
        .row > div { flex: 1; }
    </style>
</head>
<body>
    <div class="wrap">
        <h1>portfolio admin</h1>
        <p class="sub">Upload your résumé and project screenshots, then deploy to GitHub Pages.</p>

        @if(session('message'))
            <div class="msg ok">{{ session('message') }}</div>
        @endif
        @if(session('error'))
            <div class="msg err">{{ session('error') }}</div>
        @endif
        @error('cv') <div class="msg err">{{ $message }}</div> @enderror
        @error('screenshot') <div class="msg err">{{ $message }}</div> @enderror
        @error('password') <div class="msg err">{{ $message }}</div> @enderror

        @unless($authenticated)
            <div class="card">
                <h2>sign in</h2>
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <label for="password">Admin password</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password">
                    <button type="submit">Sign in</button>
                </form>
            </div>
        @else
            {{-- CV upload --}}
            <div class="card">
                <h2>1 · résumé PDF</h2>
                <form method="POST" action="{{ route('admin.upload-cv') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="cv">Replace Ibrahim-Khalif-Ali-Resume.pdf</label>
                    <input type="file" id="cv" name="cv" accept="application/pdf" required>
                    <button type="submit">Upload résumé</button>
                </form>
                <p class="hint">Current file: Ibrahim-Khalif-Ali-Resume.pdf</p>
            </div>

            {{-- Screenshot upload --}}
            <div class="card">
                <h2>2 · project screenshots</h2>
                <form method="POST" action="{{ route('admin.upload-screenshot') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="project">Project</label>
                    <select id="project" name="project" required>
                        @foreach($projects as $project)
                            <option value="{{ $project['title'] }}">{{ $project['title'] }}</option>
                        @endforeach
                    </select>
                    <label for="screenshot">Screenshot image (PNG/JPG/WebP)</label>
                    <input type="file" id="screenshot" name="screenshot" accept="image/*" required>
                    <button type="submit">Upload screenshot</button>
                </form>
                <p class="hint">The screenshot is shown on the featured project card. Each project holds one image.</p>
            </div>

            {{-- Deploy --}}
            <div class="card">
                <h2>3 · build &amp; deploy</h2>
                <form method="POST" action="{{ route('admin.deploy') }}">
                    @csrf
                    <p style="font-size:14px;color:var(--muted);margin:0 0 16px;">
                        Rebuilds the static site into <code>docs/</code>, commits everything, and pushes to GitHub.
                        GitHub Pages auto-deploys within a couple of minutes.
                    </p>
                    <button type="submit">Build &amp; deploy</button>
                </form>
                @if(session('deploy_output'))
                    <pre class="out">{{ implode("\n", session('deploy_output')) }}</pre>
                @endif
            </div>

            <div style="text-align:right;">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" style="border-color: rgba(255,255,255,0.2); color: var(--muted);">Sign out</button>
                </form>
            </div>
        @endunless
    </div>
</body>
</html>