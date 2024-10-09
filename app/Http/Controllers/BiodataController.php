<?php

namespace App\Http\Controllers;

use App\Models\Biodata; 

//import return type View
use Illuminate\View\View;

use Illuminate\Http\Request;


class BiodataController extends Controller
{
    public function index() {
        $biodatas = Biodata::latest()->paginate(10);
        return view('biodatas.index', compact('biodatas'));
    }

    public function create() {
        return view('biodatas.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:biodatas',
            'foto_profil' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if($request->hasFile('foto_profil')){
            $fileName = time() . '.' . $request->foto_profil->extension();
            $request->foto_profil->move(public_path('uploads'), $fileName);
            $validated['foto_profil'] = $fileName;
        }

        Biodata::create($validated);

        return redirect()->route('biodatas.index')->with('success', 'Biodata Berhasil Disimpan!');
    }

    public function show($id_biodata) {
        $biodata = Biodata::findOrFail($id_biodata);
        return view('biodatas.show', compact('biodata'));
    }

    public function edit($id_biodata) {
        $biodata = Biodata::findOrFail($id_biodata);
        return view('biodatas.edit', compact('biodata'));
    }

    public function update(Request $request, $id_biodata) {
        $biodata = Biodata::findOrFail($id_biodata);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:biodatas,email,' . $id_biodata,
            'foto_profil' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if($request->hasFile('foto_profil')){
            // Remove old file if exists
            if ($biodata->foto_profil && file_exists(public_path('uploads/' . $biodata->foto_profil))) {
                unlink(public_path('uploads/' . $biodata->foto_profil));
            }

            $fileName = time() . '.' . $request->foto_profil->extension();
            $request->foto_profil->move(public_path('uploads'), $fileName);
            $validated['foto_profil'] = $fileName;
        }

        $biodata->update($validated);

        return redirect()->route('biodatas.index')->with('success', 'Biodata Berhasil Diubah!');
    }

    public function destroy($id_biodata) {
        $biodata = Biodata::findOrFail($id_biodata);

        if ($biodata->foto_profil && file_exists(public_path('uploads/' . $biodata->foto_profil))) {
            unlink(public_path('uploads/' . $biodata->foto_profil));
        }

        $biodata->delete();

        return redirect()->route('biodatas.index')->with('success', 'Pegawai Berhasil Dihapus!');
    }
}

