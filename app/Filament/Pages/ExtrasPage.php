<?php

namespace App\Filament\Pages;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Service;
use Filament\Forms;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Support\Str;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Validation\Rule;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Artisan;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class ExtrasPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-wrench';

    protected static string $view = 'extras-page';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $title = 'Extras';

    protected static ?int $navigationSort = 4;

    // Action for the cache form
    public function getCacheFormActions(): array
    {
        return [
            Action::make('cache')
                ->label('Clear Cache')
                ->submit('clearCache'),
        ];
    }

    // Action for the sitemap form
    public function getSitemapFormActions(): array
    {
        return [
            Action::make('sitemap')
                ->label('Generate Sitemap')
                ->submit('generateSitemap'),
        ];
    }

    public function clearCache(): void
    {
        // Run the optimize:clear command
        Artisan::call('optimize:clear');

        Notification::make()
            ->title('All Cache Cleared Successfully')
            ->success()
            ->send();
    }

    public function generateSitemap(): void
    {
        $sitemap = Sitemap::create()->add(Url::create('/'));

        // Fetch only active blogs and services
        $blogs = Blog::where('status', 1)->get();
        $services = Service::where('status', 1)->get();

        // Initialize sitemap and add root URL
        $sitemap = Sitemap::create()
            ->add(Url::create('/'));

        // Add active blogs to sitemap
        $blogs->each(function (Blog $blog) use ($sitemap) {
            $sitemap->add(Url::create("/blog/{$blog->slug}"));
        });

        // Add active services to sitemap
        $services->each(function (Service $service) use ($sitemap) {
            $sitemap->add(Url::create("/service/{$service->slug}"));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        Notification::make()
            ->title('Sitemap Generated Successfully')
            ->success()
            ->send();
    }
}
