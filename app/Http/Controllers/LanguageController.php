<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
    public function toArabic()
    {
        session(['lang' => 'ar']);

        return back();
    }

    public function toEnglish()
    {
        session(['lang' => 'en']);

        return back();
    }
}
