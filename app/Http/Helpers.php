<?php

use App\Models\Language;
// use App\Models\Translation;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class Helpers
{
    public static function arrayToObject($array)
    {
      return json_decode(json_encode($array), false);
    }

    public static function availableLocales()
    {
      return self::availableLanguages()->pluck('locale')->toArray();
    }

    public static function availableLanguages()
    {
      return Language::whereActive(1)->get();
    }

    public static function allLocales()
    {
      return self::allLanguages()->pluck('locale')->toArray();
    }

    public static function allLanguages()
    {
      return Language::all();
    }

    public static function getLocale()
    {
      $applocale = substr(request()->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
      $available_locales = self::availableLocales();

      if(auth()->user() and in_array(auth()->user()->locale, $available_locales)):
        app()->setLocale(auth()->user()->locale);
        $applocale = auth()->user()->locale;
      elseif(session()->has('applocale') and in_array(session()->get('applocale'), $available_locales)):
        app()->setLocale(session()->get('applocale'));
        $applocale = session()->get('applocale');
      elseif($applocale and in_array($applocale, $available_locales)):
        app()->setLocale($applocale);
      elseif(config('app.fallback_locale') and in_array(config('app.fallback_locale'), $available_locales)): // This is optional as Laravel will automatically set the fallback language if there is none specified
        app()->setLocale(config('app.fallback_locale'));
        $applocale = config('app.fallback_locale');
      else:
        app()->setLocale($available_locales[0]);
        $applocale = $available_locales[0];
      endif;

      return $applocale;
    }

    public static function setLocale($locale)
    {
      if(!$locale or !in_array($locale, self::availableLocales())) $locale = config('app.fallback_locale');

      if(self::getLocale() === $locale) return true;

      session()->put('applocale', $locale);
      app()->setLocale($locale);
      if(auth()->user()) auth()->user()->update(['locale' => $locale]);

      return true;
    }

    // public static function cacheTranslations()
    // {
    //   Cache::forget('translations');
    //   Cache::rememberForever('translations', function () {
    //     return self::getJsonTranslations(self::getLocale());
    //   });
    // }

    // public static function getJsonTranslations($locale = null)
    // {
    //   if(!$locale) $locale = self::getLocale();
    //   $path = resource_path("lang/$locale.json");
    //   if(is_string($path) && is_readable($path)) return file_get_contents($path);
    //   else return json_encode([], true);
    // }

    public static function generateAndGetJsonTranslations()
    {
      $result = [];
      $translations = [];
      $json_locales = array_map('basename', File::directories(resource_path('lang')));
      foreach($json_locales as $locale):
        $family_files = array_map('basename', File::files(resource_path('lang/'.$locale)));

        foreach($family_files as $file):
          $family = str_replace('.php', '', $file);
          $result[$family] = include resource_path("lang/{$locale}/$file");
        endforeach;
        $translations[$locale] = $result;

        $path = resource_path("lang/{$locale}.json");
        file_put_contents($path, "");
        file_put_contents($path, json_encode($result, JSON_PRETTY_PRINT));
      endforeach;

      $multilang_path = resource_path('lang/multilang.json');
      file_put_contents($multilang_path, "");
      file_put_contents($multilang_path, json_encode($translations, JSON_PRETTY_PRINT));

      return response()->json($translations);
    }

    public static function cacheTranslations()
    {
      Cache::forget('translations');
      Cache::rememberForever('translations', function () {
        return self::getJsonTranslations(self::getLocale());
      });
    }

    public static function multilang()
    {
      $ml_path = resource_path("lang/multilang.json");
      if(is_string($ml_path) && is_readable($ml_path)) $multilang = file_get_contents($ml_path);
      else $multilang = json_encode([]);
      return $multilang;
    }

    public static function getJsonTranslations($locale = null)
    {
      if(!$locale) $locale = self::getLocale();
      $path = resource_path("lang/$locale.json");
      if(is_string($path) && is_readable($path)) return file_get_contents($path);
      else return json_encode([], true);
    }

    public static function generatePhpTranslations()
    {
      $DEFAULT_LOCALE = env('DEFAULT_LOCALE', config('app.locale'));

      $json_translations = file_get_contents(resource_path("lang/{$DEFAULT_LOCALE}.json"));
      $default_translations = json_decode($json_translations, true);

      foreach($default_translations as $family => $translations):
        $path = resource_path("lang/{$DEFAULT_LOCALE}/{$family}.php");
        if(!file_exists($path)) continue;
        file_put_contents($path, "");
        file_put_contents($path, "<?php\n\nreturn ".var_export($translations, true).";");
      endforeach;
    }

    public static function trans($string, $replaces = [], $locale = null)
    {
      if(!$locale or !in_array($locale, self::availableLocales())) $locale = self::getLocale();

      $values = explode('.', $string);
      $family = $values[0];
      $key = str_replace($family . '.', '', $string);

      // $translation = Translation::where(['family' => $family, 'key' => $key, 'locale' => $locale])->first();
      // if(!$translation or !$translation->string or empty($translation->string)) return $string;
      // $result = explode('|', $translation->string)[0];

      if(!File::exists(resource_path('lang/'.$locale.'.json'))) return $string;
      $json_translations = file_get_contents(resource_path('lang/'.$locale.'.json'));
      $locale_translations = json_decode($json_translations, true);
      if(!isset($locale_translations[$family]) or !isset($locale_translations[$family][$key])) return $string;
      $translation = $locale_translations[$family][$key];
      if(!$translation or empty($translation)) return $string;
      $result = explode('|', $translation)[0];

      if($replaces):
        foreach($replaces as $key => $value):
          $result = str_replace(':'.$key, $value, $result);
        endforeach;
      endif;

      return $result;
    }

    public static function choice($string, $count = 1, $replaces = [], $locale = null)
    {
      if(!$locale or !in_array($locale, self::availableLocales())) $locale = self::getLocale();

      $values = explode('.', $string);
      $family = $values[0];
      $key = str_replace($family . '.', '', $string);

      // $translation = Translation::where(['family' => $family, 'key' => $key, 'locale' => $locale])->first();
      // if(!$translation or !$translation->string or empty($translation->string)) return $string;
      // $translation_values = $values = explode('|', $translation->string);

      if(!File::exists(resource_path('lang/'.$locale.'.json'))) return $string;
      $json_translations = file_get_contents(resource_path('lang/'.$locale.'.json'));
      $locale_translations = json_decode($json_translations, true);
      if(!isset($locale_translations[$family]) or !isset($locale_translations[$family][$key])) return $string;
      $translation = $locale_translations[$family][$key];
      if(!$translation or empty($translation)) return $string;
      $translation_values = explode('|', $translation);

      if($count === 1):
        $result = $translation_values[0];
      else:
        if(isset($translation_values[1])) $result = $translation_values[1];
        else $result = $translation_values[0];
      endif;

      if($replaces):
        foreach($replaces as $key => $value):
          $result = str_replace(':'.$key, $value, $result);
        endforeach;
      endif;

      return $result;
    }

    public static function generateRandomString($length = 32) {
      return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public static function generateRandomCode($length = 32) {
      return substr(str_shuffle(str_repeat($x='123456789ABCDEFGHJKLMNPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public static function zip($source, $destination)
    {
        if(!extension_loaded('zip') || !file_exists($source)) return false;

        $destination_dir = dirname($destination);
        if(!File::isDirectory($destination_dir)) File::makeDirectory($destination_dir, 0777, true, true);

        $zip = new ZipArchive();
        if(!$zip->open($destination, ZIPARCHIVE::CREATE)) return false;

        $source = str_replace('\\', '/', realpath($source));

        if(is_dir($source) === true):
          $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

          foreach ($files as $file):
            $file = str_replace('\\', '/', $file);

            // Ignore "." and ".." folders
            if(in_array(substr($file, strrpos($file, '/')+1), array('.', '..'))) continue;

            $file = realpath($file);

            if(is_dir($file) === true):
              $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            elseif (is_file($file) === true):
              $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            endif;
          endforeach;
        elseif(is_file($source) === true):
          $zip->addFromString(basename($source), file_get_contents($source));
        endif;

        $zip->close();

        // return $zip->close();
    }

    public static function routeName()
    {
      return Route::current()->getName();
    }

    public static function routeParameters()
    {
      return Route::current()->parameters;
    }

    public static function previousRouteName()
    {
      return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }

    public static function previousRouteParameters()
    {
      return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->parameters;
    }

    public static function urlName($url = null)
    {
      if(!$url) return null;
      return app('router')->getRoutes()->match(app('request')->create($url))->getName();
    }

    public static function previousRequest()
    {
      return app('request')->create(url()->previous());
    }

    public static function previousRoute()
    {
      return app('router')->getRoutes()->match(self::previousRequest());
    }
}
