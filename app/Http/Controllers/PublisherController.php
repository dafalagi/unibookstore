<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use Illuminate\Support\Facades\Validator;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.publishers.index', [
            'publishers' => Publisher::filter(request('search'))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublisherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublisherRequest $request)
    {
        $validated = $request->validated();

        Publisher::create($validated);

        return redirect('/dashboard/publishers')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        return view('dashboard.publishers.show', [
            'publisher' => $publisher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        return view('dashboard.publishers.edit', [
            'publisher' => $publisher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublisherRequest  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $validated = $request->validated();

        if($validated['id_penerbit'] != $publisher->id_penerbit){
            $validator = Validator::make($validated, [
                'id_penerbit' => 'required|unique:publishers'
            ]);

            if($validator->fails()){
                return back()->with('error', 'ID Penerbit harus unik.');
            }

            $validated = array_merge($validated, $validator->validated());
        }
        if($validated['nama'] != $publisher->nama){
            $validator = Validator::make($validated, [
                'nama' => 'required|unique:publishers'
            ]);

            if($validator->fails()){
                return back()->with('error', 'Nama Penerbit harus unik.');
            }

            $validated = array_merge($validated, $validator->validated());
        }

        $publisher->update($validated);

        return redirect('/dashboard/publishers')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect('/dashboard/publishers')->with('success', 'Data berhasil dihapus.');
    }
}
