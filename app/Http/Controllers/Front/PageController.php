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
}
