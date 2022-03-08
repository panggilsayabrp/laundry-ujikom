<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOutletRequest;
use App\Models\Outlet;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        Gate::authorize('admin');

        $outlets = Outlet::all();
        return view('layouts.dashboard.outlets.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('layouts.dashboard.outlets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreOutletRequest $request)
    {
        $validatedData = $request->validated();

        Outlet::create($validatedData);

        return redirect('dashboard/outlets')->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param Outlet $outlet
     * @return Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Outlet $outlet
     * @return Application|Factory|View
     */
    public function edit(Outlet $outlet)
    {
        return view('layouts.dashboard.outlets.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreOutletRequest $request
     * @param Outlet $outlet
     * @return Application|Redirector|RedirectResponse
     */
    public function update(StoreOutletRequest $request, Outlet $outlet)
    {
        $validatedData = $request->validated();

        $outlet->update($validatedData);

        return redirect('dashboard/outlets')->with('success', 'Edit Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Outlet $outlet
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return redirect('dashboard/outlets')->with('success', 'Hapus Data Berhasil');
    }
}
