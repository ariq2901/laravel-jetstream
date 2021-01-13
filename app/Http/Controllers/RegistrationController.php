<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
  public function index()
  {
      return view('home');
  }

  public function proses(Request $data)
  {
      $data->validate([
        'name' => 'required',
        'umur' => 'required|num',
        'gambar' => 'required|mimes:jpeg,bmp,png,jpg'
      ]);

      $name = $data->nama;
      $umur = $data->umur;
      $gambar = $data->file('gambar');
      $imageName = $gambar->getClientOriginalName();
      $gambar->storeAs('/public/user', $imageName);
      return view('home', ['name' => $name, 'umur' => $umur, 'gambar' => $imageName]);
  }
}
