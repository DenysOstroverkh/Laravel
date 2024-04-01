<?php

namespace App\Http\Controllers;

use Helpers;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function phpToJsonGenerate()
    {
        return Helpers::generateAndGetJsonTranslations();
    }
}
