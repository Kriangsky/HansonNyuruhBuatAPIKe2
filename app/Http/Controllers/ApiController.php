<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtistResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MusicResource;
use App\Http\Resources\MusicWithDataResource;
use App\Models\Music;
use App\Models\Artist;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    
    function getData() {
        return MusicWithDataResource::collection(Music::all());
    }

    function getMusic() {
        return MusicResource::collection(Music::all());
    }

    function getArtist() {
        return ArtistResource::collection(Artist::all());
    }

    function getCategory() {
        return CategoryResource::collection(Category::all());
    }
    function storeArtist(Request $request) {
        $request->validate([
            'Name' => 'required',
            'Age' => 'required',
        ]);

        Artist::create([
            'Name' => $request->Name,
            'Age' => $request->Age,
        ]);

        return 'Artist berhasil dibuat!';
    }

    function storeCategory(Request $request) {
        $request->validate([
            'categoryName' => 'required',
        ]);

        Category::create([
            'categoryName' => $request->categoryName,
        ]);

        return 'Category berhasil dibuat!';
    }

    function storeMusic(Request $request) {
        $request->validate([
            'Title' => 'required',
            'Image' => 'required',
            'Link' => 'required',
            'Artist' => 'required',
            'Category' => 'required',
        ]);

        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public'.'/'.$filename);

        Music::create([
            'Title' => $request->Title,
            'Image' => $filename,
            'Link' => $request->Link,
            'artistId' => 1,
            'categoryId' => 1,
        ]);

        return 'Music berhasil dibuat!';
    }
    function updateArtist(Request $request, $id) {
        $artist = Artist::find($id);

        $request->validate([
            'Name' => 'required',
            'Age' => 'required',
        ]);

        $artist->update([
            'Name' => $request->Name,
            'Age' => $request->Age,
        ]);

        return 'Artist berhasil di update';
    }

    function updateCategory(Request $request, $id) {
        $category = Category::find($id);

        $request->validate([
            'categoryName' => 'required',
        ]);

        $category->update([
            'categoryName' => $request->categoryName,
        ]);

        return 'Category berhasil di update';
    }
    function updateMusic(Request $request, $id) {
        $music = Music::find($id);

        $request->validate([
            'Title' => 'required',
            'Image' => 'required',
            'Link' => 'required',
            'Artist' => 'required',
            'Category' => 'required',
        ]);

        Storage::delete('/public'.'/'.$music->Image);
        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public'.'/'.$filename);

        $music->update([
            'Title' => $request->Title,
            'Image' => $filename,
            'Link' => $request->Link,
            'artistId' => 1,
            'categoryId' => 1,
        ]);

        return 'Music berhasil di update';
    }

    function deleteMusic($id) {
        $music = Music::find($id);
        Storage::delete('/public'.'/'.$music->Image);
        Music::destroy($music->id);
        return 'Music berhasil di delete';
    }

    function deleteArtist($id) {
        $artist = Artist::find($id);
        Artist::destroy($artist->id);
        return 'Artist berhasil di delete';
    }
    function deleteCategory($id) {
        $category = Category::find($id);
        Category::destroy($category->id);
        return 'Category berhasil di delete';
    }
}
