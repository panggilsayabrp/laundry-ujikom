<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Models\Outlet;
use App\Models\Package;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        Gate::authorize('admin');

        $packages = Package::all();
        return view('layouts.dashboard.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $outlets = Outlet::all();
        return view('layouts.dashboard.package.create', compact('outlets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePackageRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StorePackageRequest $request)
    {
        $validatedData = $request->validated();
        Package::create($validatedData);

        return redirect('dashboard/packages')->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param Package $package
     * @return Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Package $package
     * @return Application|Factory|View
     */
    public function edit(Package $package)
    {
        $outlets = Outlet::all();
        return view('layouts.dashboard.package.edit', compact('package', 'outlets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePackageRequest $request
     * @param Package $package
     * @return Application|Redirector|RedirectResponse
     */
    public function update(StorePackageRequest $request, Package $package)
    {
        $validatedData = $request->validated();
        $package->update($validatedData);

        return redirect('dashboard/packages')->with('success', 'Edit Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Package $package
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return redirect('dashboard/packages')->with('success', 'Hapus Data Berhasil');
    }
}
