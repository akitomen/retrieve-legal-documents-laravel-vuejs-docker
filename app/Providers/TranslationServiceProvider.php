<?php
namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Cache::rememberForever('translations', function () {
            $translations = collect();

            foreach (['en'] as $locale) {
                $translations[$locale] = $this->getTranslations($locale);
            }

            return $translations;
        });
    }

    /**
     * @param string $locale
     * @return \Illuminate\Support\Collection
     */
    private function getTranslations(string $locale)
    {
        $path = resource_path("lang/$locale");

        return collect(File::allFiles($path))->flatMap(function ($file) use ($locale) {
            $key = ($translation = $file->getBasename('.php'));

            return [$key => trans($translation, [], $locale)];
        });
    }
}
