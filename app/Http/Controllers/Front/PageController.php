<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Laravel\Jetstream\Jetstream;

class PageController extends Controller
{
    public function home(): View
    {
        $homeFile = Jetstream::localizedMarkdownPath('home.md');

        return view('home', [
            'meta_description' => __('sitemap.caption'),
            'home' => Str::markdown(file_get_contents($homeFile)),
        ]);
    }

    public function about(): View
    {
        $aboutFile = Jetstream::localizedMarkdownPath('about.md');

        return view('about', [
            'meta_description' => __('meta.about'),
            'about' => Str::markdown(file_get_contents($aboutFile)),
        ]);
    }

    public function help(): View
    {
        $helpFile = Jetstream::localizedMarkdownPath('help.md');

        return view('help', [
            'meta_description' => __('meta.help'),
            'help' => Str::markdown(file_get_contents($helpFile)),
        ]);
    }

    public function termsOfService(): View
    {

        $termsOfServiceFile = Jetstream::localizedMarkdownPath('terms.md');

        return view('terms', [
            'meta_description' => __('meta.terms-of-service'),
            'terms' => Str::markdown(file_get_contents($termsOfServiceFile)),
        ]);
    }

    public function privacyPolicy(): View
    {
        $privacyPolicyFile = Jetstream::localizedMarkdownPath('policy.md');

        return view('policy', [
            'meta_description' => __('meta.privacy-policy'),
            'policy' => Str::markdown(file_get_contents($privacyPolicyFile)),
        ]);
    }
}
