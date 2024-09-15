<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LaguDaerah;
use Illuminate\Http\Request;

class LaguController extends Controller
{
    //index
    public function index()
    {
        $laguDaerahs = LaguDaerah::orderBy('id', 'DESC')->paginate(10);
        return response()->json([
            'status' => 'success',
            'data' => $laguDaerahs
        ]);
    }

    //create
    public function create(Request $request)
    {
        //validate
        $request->validate([
            'judul' => 'required',
            'lagu' => 'required',
            'daerah' => 'required',
            'image' => 'required',
            'video_url' => 'required',
        ]);

        $laguDaerah = new LaguDaerah();
        $laguDaerah->judul = $request->judul;
        $laguDaerah->lagu = $request->lagu;
        $laguDaerah->daerah = $request->daerah;
        $laguDaerah->video_url = $request->video_url;

        //image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $fileName = time() . '.' . $request->image->extension();
            $fileName = time() . '.' . $image->extension();
            $image->storeAs('public/images', $fileName);
            $laguDaerah->image_url = $fileName;
        }

        $laguDaerah->save();

        return response()->json([
            'status' => 'success',
            'data' => $laguDaerah
        ], 201);
    }

    //update
    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'judul' => 'required',
            'lagu' => 'required',
            'daerah' => 'required',
            'video_url' => 'required',
        ]);

        $laguDaerah = LaguDaerah::find($id);
        $laguDaerah->judul = $request->judul;
        $laguDaerah->lagu = $request->lagu;
        $laguDaerah->daerah = $request->daerah;
        $laguDaerah->video_url = $request->video_url;


        //image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $fileName = time() . '.' . $request->image->extension();
            $fileName = time() . '.' . $image->extension();
            $image->storeAs('public/images', $fileName);
            $laguDaerah->image_url = $fileName;
        }


        $laguDaerah->save();

        return response()->json(
            [
                'status' => 'success',
                'data' => $laguDaerah
            ],
            200
        );
    }

    //delete
    public function delete($id)
    {
        $laguDaerah = LaguDaerah::find($id);
        $laguDaerah->delete();
        return response()->json([
            'status' => 'success',
            'data' => null
        ], 204);
    }
}