<?php

declare(strict_types=1);

namespace App\Livewire\People;

use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Livewire\Component;

class Gallery extends Component
{
    // ------------------------------------------------------------------------------
    public $person;

    // ------------------------------------------------------------------------------
    public array $images = [];

    public ?int $selected = null;

    // ------------------------------------------------------------------------------
    protected $listeners = [
        'photos_updated' => 'mount',
        'person_updated' => 'render',
    ];

    // ------------------------------------------------------------------------------
    public function mount(): void
    {
        // Fetch all the image filenames for the person
        $path = public_path("storage/photos/{$this->person->team_id}/{$this->person->id}_*.webp");

        $this->images = collect(File::glob($path))
            ->map(fn ($p) => basename($p)) // Extract filename
            ->toArray();

        // Set the primary image (if any) as selected
        $this->selected = $this->getPrimaryImageIndex();
    }

    protected function getPrimaryImageIndex(): ?int
    {
        if (count($this->images) === 0) {
            return null;
        }

        return $this->person->photo
            ? (int) array_search($this->person->photo, $this->images)
            : 0;
    }

    public function previousImage(): void
    {
        $this->selected = ($this->selected - 1 + count($this->images)) % count($this->images);
    }

    public function nextImage(): void
    {
        $this->selected = ($this->selected + 1) % count($this->images);
    }

    public function selectImage($index): void
    {
        $this->selected = $index;
    }

    // ------------------------------------------------------------------------------
    public function render(): View
    {
        return view('livewire.people.gallery');
    }
}
