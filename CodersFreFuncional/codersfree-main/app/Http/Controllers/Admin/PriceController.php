<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $prices = Price::paginate(6);

    return view('admin.prices.index', compact('prices'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.prices.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|unique:prices',
      'value' => 'required|numeric'
    ]);

    Price::create($request->all());

    return redirect()->route('admin.prices.index')->with('info', 'El precio se creo con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Price $price)
  {
    return view('admin.prices.show', compact('price'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Price $price)
  {
    return view('admin.prices.edit', compact('price'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Price $price)
  {
    $request->validate([
      'name' => 'required|unique:prices,name,' . $price->id,
      'value' => 'required|numeric'
    ]);

    $price->update($request->all());

    return redirect()->route('admin.prices.index')->with('info', 'El precio se actualizó con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Price $price)
  {
    $price->delete();

    return redirect()->route('admin.prices.index')->with('info', 'El precio se elimino con exito');
  }
}
