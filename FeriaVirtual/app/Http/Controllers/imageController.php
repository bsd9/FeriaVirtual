<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        //
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg:2024',
        ]);

        $user = auth('visitor')->user()->id;
        $visitor = Visitor::findOrFail($user);

        if ($visitor->imagen) {
            $oldImagePath = public_path('img/profile/').$visitor->imagen;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('img/profile'), $imageName);

        $visitor->update([
            'imagen' => $imageName,
        ]);

        return back()->with('success', 'Cambio realizado');
    }
}
