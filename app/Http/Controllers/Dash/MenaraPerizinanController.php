<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenaraPerizinanController extends Controller
{
    private const SLUG = 'menara.perizinan';

    /**
     * Create a constructor instance.
     */
    public function __construct()
    {
        return view()->share('title', 'Data Perizinan');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.'.self::SLUG.'.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.'.self::SLUG.'.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }
}
