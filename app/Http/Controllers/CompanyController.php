<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (auth()->check()) {
            $companies = Company::latest()->paginate(5);
            return view('company.index', [
                'companies' => $companies
            ]);
        } else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'website' => ['required', 'url'],
            'logo' => ['nullable', 'mimes:png,jpg,jpeg', 'max:2048', function ($attribute, $value, $fail) {
                // Check if a file is provided
                if ($value) {
                    // Get image dimensions using Intervention Image
                    $image = Image::make($value->getPathname());
                    $width = $image->width();
                    $height = $image->height();
    
                    // Check if dimensions meet the minimum requirement
                    if ($width < 100 || $height < 100) {
                        $fail('The ' . $attribute . ' must be at least 100x100 pixels.');
                    }
                }
            }],
        ]);
        dd($attributes);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        dd($id);
    }
}
