<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['name']        = 'AmeliaG';
        $data['tanggal_lahir']      = '2006-08-12';
        $data['tahun_lahir'] = '2006';
        $data['tahun_skarang'] = '2025';
        $data['hobbies'] = ['menggambar', 'menari', 'menyanyi', 'membaca'];
        $data['tanggal_harus_wisuda'] = '2028-09-29';
        $data['tahun_wisuda'] = '2028';
        $data['current_semester'] = '3';
        $data['future_goal'] = 'UI/UX Designer';
        return view('tampilan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
