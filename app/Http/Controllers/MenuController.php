<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Menu; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $menus = Menu::latest()->paginate(10);

        //render view with products
        return view('menus.index', compact('menus'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('menus.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'gambar_menu'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_menu'         => 'required|min:5',
            'detail_menu'   => 'required|min:10',
            'harga'         => 'required|numeric',
            'stok'         => 'required|numeric'
        ]);

        //upload image
        $image = $request->file('gambar_menu');
        $image->storeAs('public/menus', $image->hashName());

        //create product
        Menu::create([
            'gambar_menu'         => $image->hashName(),
            'nama_menu'         => $request->nama_menu,
            'detail_menu'   => $request->detail_menu,
            'harga'         => $request->harga,
            'stok'         => $request->stok
        ]);

        //redirect to index
        return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id_menu): View
{
    // Ubah ini untuk mencari berdasarkan id_menu
    $menu = Menu::where('id_menu', $id_menu)->firstOrFail();

    // render view dengan product
    return view('menus.show', compact('menu'));
}

/**
 * edit
 *
 * @param  mixed $id_menu
 * @return View
 */
public function edit(string $id_menu): View
{
    //get product by id_menu
    $menu = Menu::findOrFail($id_menu);

    //render view with product
    return view('menus.edit', compact('menu'));
}
    
/**
 * update
 *
 * @param  mixed $request
 * @param  mixed $id_menu
 * @return RedirectResponse
 */
public function update(Request $request, $id_menu): RedirectResponse
{
    //validate form
    $request->validate([
        'gambar_menu'   => 'image|mimes:jpeg,jpg,png|max:2048',
        'nama_menu'     => 'required|min:5',
        'detail_menu'   => 'required|min:10',
        'harga'         => 'required|numeric',
        'stok'          => 'required|numeric'
    ]);

    //get menu by ID
    $menu = Menu::findOrFail($id_menu);

    //check if image is uploaded
    if ($request->hasFile('gambar_menu')) {

        //upload new image
        $image = $request->file('gambar_menu');
        $image->storeAs('public/menus', $image->hashName());

        //delete old image
        Storage::delete('public/menus/' . $menu->gambar_menu);

        //update menu with new image
        $menu->update([
            'gambar_menu'   => $image->hashName(),
            'nama_menu'     => $request->nama_menu,
            'detail_menu'   => $request->detail_menu,
            'harga'         => $request->harga,
            'stok'          => $request->stok
        ]);

    } else {

        //update menu without image
        $menu->update([
            'nama_menu'     => $request->nama_menu,
            'detail_menu'   => $request->detail_menu,
            'harga'         => $request->harga,
            'stok'          => $request->stok
        ]);
    }

    //redirect to index
    return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Diubah!']);
}

public function destroy($id_menu): RedirectResponse
    {
        //get product by ID
        $menu = Menu::findOrFail($id_menu);

        //delete image
        Storage::delete('public/menus/'. $menu->gambar_menu);

        //delete product
        $menu->delete();

        //redirect to index
        return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
