<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    //clear cache method
    public function clearCache()
    {
        // clearing cache
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');

        toastr()->success('Cache cleared successfully');
        return back();
    }

    //load all models name and render view
    public function loadModelsForSitemap()
    {
        $coreModels = [
            'App\Models\Role',
            'App\Models\Permission',
            'App\Models\AddOns',
            'App\Models\AppBackendMenu',
            'App\Models\AppBackendSubMenu',
            'App\Models\AppFrontendMenu',
            'App\Models\AppFrontendSubMenu',
            'App\Models\Plugins',
            'App\Models\Theme',
            'App\Models\UserInfo',
            'App\Models\Admin',
            'App\Models\AdminInfo',
            'App\Models\Category',
            'App\Models\SubCategory',
            'App\Models\System',
            'App\Models\SystemAsset',
            'App\Models\SystemInfo',
            'App\Models\SystemSeo',
            'App\Models\Gateway',
        ];

        // Load all models from the Models directory
        $models = collect(File::allFiles(app_path('Models')))
            ->map(function ($file) {
                $class = 'App\\Models\\' . $file->getFilenameWithoutExtension();
                return class_exists($class) ? $class : null;
            })
            ->filter()
            ->reject(function ($model) use ($coreModels) {
                return in_array($model, $coreModels);
            });

        return view('admin.pages.settings.load_models', compact('models'));
    }

    //sitemap generator method
    public function generateSitemap(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'models' => 'required|array|min:1',
            'models.*' => 'string|distinct',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $models = $request->input('models', []);
        $sitemap = Sitemap::create();

        // Add static URLs
        // $sitemap->add(Url::create('/'))
        //     ->add(Url::create('/about'))
        //     ->add(Url::create('/contact'))
        //     ->add(Url::create('/products'))
        //     ->add(Url::create('/saas-product'))
        //     ->add(Url::create('/services'))
        //     ->add(Url::create('/projects'))
        //     ->add(Url::create('/blogs'))
        //     ->add(Url::create('/course'));

        $sitemap->add(Url::create('/'));

        foreach ($models as $model) {
            if (class_exists($model)) {
                $model::all()->each(function ($record) use ($sitemap) {
                    $slugColumn = 'slug';
                    $sitemap->add(Url::create("/" . strtolower(class_basename($record)) . "/{$record->$slugColumn}"));
                });
            }
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        toastr()->success('Sitemap generated successfully');

        return back();
    }

    protected function getModelRoutes()
    {
        $modelRoutes = [
            'App\Models\Project' => 'project.all',
            'App\Models\Product' => 'product.all',
            'App\Models\Service' => 'service.all',
            'App\Models\Course' => 'course.all',
            'App\Models\Blog' => 'blog.all',
            'App\Models\JobCareer' => 'career.all',
            'App\Models\Team' => 'team.all',
        ];

        // Filter routes to include only those that exist in the current route list
        return collect($modelRoutes)->filter(function ($routeName) {
            return Route::has($routeName);
        });
    }
}
