<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CompanyRequest;
use Illuminate\Database\QueryException;
use Intervention\Image\Laravel\Facades\Image;

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
    public function store(CompanyRequest $request)
    {   
        $request['website_link'] = $request['website']; 
        unset($request['website']);
        
        DB::beginTransaction();

        try {

            $company = Company::create($request->except('logo'));

            if ($request->hasFile('logo')) {
                
                $file = $request->file('logo');
                $fileName = $company->id . '-' .$company->name . '.' . $file->getClientOriginalExtension();
                $destinationPath = storage_path('app/public');
                $file->move($destinationPath, $fileName);

                $company->update(['logo' => $fileName]);
            }

            DB::commit();

            return redirect('/index')->with('success', 'New company created successfully.');

        } catch (QueryException $e) {

            DB::rollBack();
            return redirect('/index/create')->with('fail', 'Database error: ' . $e->getMessage());

        } catch (Exception $e) {

            DB::rollBack();
            return redirect('/index/create')->with('fail', 'Something went wrong: ' . $e->getMessage());

        }
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
        Company::destroy($id);
        return redirect('/index')->with('success', 'Company has been deleted.');
    }
}
