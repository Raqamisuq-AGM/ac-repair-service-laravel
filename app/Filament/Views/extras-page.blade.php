<x-filament-panels::page>

    <div class="flex gap-2">
        <!-- Cache Form -->
        <x-filament-panels::form wire:submit="clearCache">
            <x-filament-panels::form.actions :actions="$this->getCacheFormActions()" />
        </x-filament-panels::form>
        <!-- Sitemap Form -->
        <x-filament-panels::form wire:submit="generateSitemap">
            <x-filament-panels::form.actions :actions="$this->getSitemapFormActions()" />
        </x-filament-panels::form>
    </div>

</x-filament-panels::page>
