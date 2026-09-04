<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Process;

class AdminController extends Controller
{
    public function show(Request $request)
    {
        return view('admin', [
            'authenticated' => $request->session()->get('admin_authenticated', false),
            'projects' => config('portfolio.projects.items'),
            'message' => session('message'),
            'error' => session('error'),
            'output' => session('deploy_output'),
        ]);
    }

    public function login(Request $request)
    {
        $password = env('ADMIN_PASSWORD', 'ibrahim2024');

        $request->validate([
            'password' => 'required|string',
        ]);

        if (Hash::check($request->input('password'), Hash::make($password)) || $request->input('password') === $password) {
            $request->session()->put('admin_authenticated', true);

            return redirect()->route('admin')->with('message', 'Signed in.');
        }

        return back()->with('error', 'Incorrect password.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_authenticated');

        return redirect()->route('admin');
    }

    public function uploadCv(Request $request)
    {
        $this->requireAuth($request);

        $request->validate([
            'cv' => ['required', 'file', 'mimes:pdf', 'max:10240'],
        ]);

        $destination = public_path('Ibrahim-Khalif-Ali-Resume.pdf');
        $file = $request->file('cv');
        $file->move(public_path(), 'Ibrahim-Khalif-Ali-Resume.pdf');

        return back()->with('message', 'Résumé PDF uploaded: ' . basename($destination));
    }

    public function uploadScreenshot(Request $request)
    {
        $this->requireAuth($request);

        $request->validate([
            'project' => 'required|string',
            'screenshot' => ['required', 'image', 'max:10240'],
        ]);

        $project = collect(config('portfolio.projects.items'))->firstWhere('title', $request->input('project'));

        if (!$project) {
            return back()->with('error', 'Project not found.');
        }

        $slug = \Illuminate\Support\Str::slug($project['title'], '-');
        $ext = strtolower($request->file('screenshot')->getClientOriginalExtension());

        $dir = public_path('images/projects');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        // Remove any existing screenshot for this project
        foreach (['png', 'jpg', 'jpeg', 'webp', 'gif'] as $oldExt) {
            $old = $dir . '/' . $slug . '.' . $oldExt;
            if (is_file($old)) {
                unlink($old);
            }
        }

        $request->file('screenshot')->move($dir, $slug . '.' . $ext);

        return back()->with('message', "Screenshot saved for: {$project['title']}");
    }

    public function deploy(Request $request)
    {
        $this->requireAuth($request);

        // Ensure config cache is cleared so screenshot changes are picked up
        Process::path(base_path())->timeout(600)->run('php artisan config:clear');

        $output = [];
        $ok = true;

        $commands = [
            'npm run build',
            'php build-static.php',
            'git add .',
            'git commit -m "Update site content - ' . date('Y-m-d H:i') . '"',
            'git push',
        ];

        foreach ($commands as $command) {
            $result = Process::path(base_path())->timeout(600)->run($command);
            $line = $result->successful() ? $command . ' — OK' : $command . ' — FAILED';
            $output[] = $line;
            if (!$result->successful()) {
                $ok = false;
                $output[] = trim($result->errorOutput() . $result->output());
                break;
            }
        }

        return back()->with('deploy_output', $output)->with('message', $ok ? 'Deployed to GitHub Pages.' : 'Deploy failed. See output below.');
    }

    private function requireAuth(Request $request): void
    {
        abort_unless($request->session()->get('admin_authenticated', false), 403);
    }
}