<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Company;
use App\Models\Configuration;
use App\Models\Feria;
use Illuminate\Contracts\View\View;

class PrincipalController extends Controller
{
    public function index(): View
    {
        $slide = Feria::first();
        $logo = Configuration::where('level', 'basic')->first();
        $partners = Configuration::where('level', 'medium')->first();

        return view('principal', [
            'imageLogo' => $logo->attachment()->first()->url,
            'imagepartnes' => $partners->attachment()->first()->url,
            'feria' => $slide,
            'imagesSlide' => $slide->attachment->take(4),
            'ImagesCollaborators' => Configuration::where('level', 'high')->get(),
            'blogs' => Blog::where('status', 'published')->get(),
        ]);
    }

    public function show($id): View
    {
        $blog = Blog::findOrFail($id);

        return view('principal.single-blog', compact('blog'));
    }

    public function getListStands(): View
    {
        return view('principal.stands', [
            'stands' => Company::get(),
        ]);
    }

    public function getMovie(): View
    {

        return view('principal.senal_live', [
            'blogs' => Blog::where('status', 'published')->get(),
        ]);
    }

    public function home(): View
    {
        return view('principal.home');
    }

    public function storageVisitor()
    {
        return redirect()->route('facade');
    }
}
