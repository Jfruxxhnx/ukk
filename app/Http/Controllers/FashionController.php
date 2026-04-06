<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Fashion;
use Termwind\Components\Dd;
use Illuminate\Support\Str;

class FashionController extends Controller
{
    public function index(){
        $data = Fashion::all();
        return view('admin.fashion.index', compact('data'));
    }

    public function create() {
        $data = Category::all();
        return view('admin.fashion.create', compact('data'));
    }

    public function store(Request $request)  {

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price_per_day' => 'required',
        ]);

        $slug = Str::slug($request->name);

        $count = Fashion::where('slug', 'LIKE', "{$slug}%")->count();

        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        Fashion::create([
            'id' => $request->nama_alat,
            'code' => strtoupper(Str::random(6)),
            'name' => $request->name,
            'desc' => $request->desc,
            'slug' => $slug,
            'price_per_day' => $request->price_per_day,
            'category_id' => $request->category_id,
            'image' => null,
            'status' => 'ready'
        ]);

    
        return redirect()->route('fashion.index');

    }

    public function show($slug)
    {
        $fashion = Fashion::where('slug', $slug)->firstOrFail();

        return view('admin.fashion.show', compact('fashion'));
    }

    public function edit($slug) 
    {
        $fashion = Fashion::where('slug', $slug)->firstOrFail();
        $categories = Category::all();

        return view('admin.fashion.edit', compact('fashion','categories'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price_per_day' => 'required'
        ]);

        $fashion = Fashion::where('slug', $slug)->firstOrFail();

        $fashion->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'slug' => Str::slug($request->name),
            'price_per_day' => $request->price_per_day,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('fashion.show', $fashion->slug);
    }

    public function destroy($id)
    {
        $fashion = Fashion::findOrFail($id);

        $fashion->delete();

        return redirect()->route('fashion.index');
    }
    
}
