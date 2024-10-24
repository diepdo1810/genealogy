<?php

declare(strict_types=1);

namespace App\Livewire\People;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

class Wiki extends Component
{
    public $person;
    public $response;
    public $content;
    public $url;

    public function mount($person): void
    {
        $this->person = $person;

        $locale = app()->getLocale();
        if (in_array($locale, config('app.available_locales'))) {
            $this->url = "https://$locale.wikipedia.org/w/api.php?action=query&format=json";
        } else {
            $this->url = "https://en.wikipedia.org/w/api.php?action=query&format=json";
        }
        $wiki = $this->person->wiki()->where('lang', $locale)->first();

        if (!$wiki && $this->fetchWikiContent()) {
            $this->person->wiki()->create([
                'person_id' => $this->person->id,
                'lang' => app()->getLocale(),
                'content' => $this->content ?? '',
            ]);
        }
    }

    /**
     * Fetch Wikipedia content for the person.
     */
    protected function fetchWikiContent(): bool
    {
        $pageId = $this->getWikiPageId($this->person->name);

        if (!$pageId) {
            return false;
        }

        $this->content = $this->getWikiExtract($pageId);
        return !empty($this->content);
    }

    /**
     * Get Wikipedia page ID for a person.
     */
    protected function getWikiPageId(string $name): ?int
    {
        $wikiUrl = $this->url . '&list=search&formatversion=2&srsearch=' . urlencode($name);
        $response = Http::get($wikiUrl);

        if ($response->failed() || empty($response->json('query.search.0.pageid'))) {
            return null;
        }

        return $response->json('query.search.0.pageid');
    }

    /**
     * Get Wikipedia extract for a page ID.
     */
    protected function getWikiExtract(int $pageId): ?string
    {
        $wikiUrl = $this->url . '&prop=extracts&pageids=' . $pageId;
        $response = Http::get($wikiUrl);

        if ($response->failed()) {
            return null;
        }

        return $response->json("query.pages.$pageId.extract");
    }

    public function render(): View
    {
        return view('livewire.people.wiki');
    }
}
