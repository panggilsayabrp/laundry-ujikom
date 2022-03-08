<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Http\Requests\TransactionUpdateRequest;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Barryvdh\DomPDF\Facade\Pdf;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('layouts.dashboard.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $outlets = Outlet::all();
        $packages = Package::all();
        $members = Member::all();

        return view('layouts.dashboard.transactions.create', compact('outlets', 'packages', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TransactionRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(TransactionRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = auth()->user()->id;

        Transaction::create($validatedData);

        return redirect('/dashboard/transactions')->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param Transaction $transaction
     * @return Application|Factory|View
     */
    public function show(Transaction $transaction)
    {
        return view('layouts.dashboard.transactions.detail', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Transaction $transaction
     * @return Application|Factory|View
     */
    public function edit(Transaction $transaction)
    {
        $outlets = Outlet::all();
        $packages = Package::all();
        $members = Member::all();

        return view('layouts.dashboard.transactions.edit', compact('transaction', 'outlets', 'packages', 'members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TransactionUpdateRequest $request
     * @param Transaction $transaction
     * @return Application|Redirector|RedirectResponse
     */
    public function update(TransactionUpdateRequest $request, Transaction $transaction)
    {
        $validatedData = $request->validated();
        $transaction->update($validatedData);
        return redirect('dashboard/transactions')->with('success', 'Edit Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Transaction $transaction
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect('dashboard/transactions')->with('success', 'Hapus Data berhasil');
    }

    public function print_pdf()
    {
        $transactions = Transaction::all();

        return Pdf::loadView('layouts.dashboard.transactions.print_pdf', compact('transactions'))->download('laundry.pdf');
    }
}
