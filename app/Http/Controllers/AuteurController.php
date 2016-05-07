<?php

namespace App\Http\Controllers;

use App\Auteur;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ReportsController extends Controller
{

public function add(Request $request)
{
  $auteur = new Auteur();
  $auteur->name = $request->name;
  $auteur->save();
  return back();
}

public function delete(Auteur $auteur)
{
  $auteur->delete();
  return back();
}

public function edit(Request $request, Auteur $auteur)
{
  $auteur->name = $request->name;
  $auteur->save();
  return back();
}

}
