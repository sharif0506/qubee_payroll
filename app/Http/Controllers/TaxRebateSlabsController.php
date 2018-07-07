<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaxRebateSlab;

class TaxRebateSlabsController extends Controller {

    public function index() {
        $taxRebateSlabs = TaxRebateSlab::all();
        return view("tax_rebate_slabs.index", array("taxRebateSlabs" => $taxRebateSlabs));
    }

    public function showAdd() {
        return view("tax_rebate_slabs.add");
    }

    public function add(Request $request) {
        $request->validate([
            'slab_order' => 'required',
            'amount' => 'required',
            'rebate_rate' => 'required'
        ]);
        $taxRebateSlab = new TaxRebateSlab();
        $taxRebateSlab->slab_order = $request->slab_order;
        $taxRebateSlab->amount = $request->amount;
        $taxRebateSlab->rebate_rate = $request->rebate_rate;
        $taxRebateSlab->save();
        return redirect()->back()->with("message", "New tax rebate slab added successfully");
    }

    public function showEdit($id) {
        $taxRebateSlab = TaxRebateSlab::findOrFail($id);
        return view("tax_rebate_slabs.edit", ["taxRebateSlab" => $taxRebateSlab]);
    }

    public function edit(Request $request) {
        $request->validate([
            'slab_order' => 'required',
            'amount' => 'required',
            'rebate_rate' => 'required'
        ]);
        $taxRebateSlab = TaxRebateSlab::findOrFail($request->id);
        $taxRebateSlab->slab_order = $request->slab_order;
        $taxRebateSlab->amount = $request->amount;
        $taxRebateSlab->rebate_rate = $request->rebate_rate;
        $taxRebateSlab->save();
        return redirect()->back()->with("message", "Tax rebate salb info updated successfully");
    }

    public function delete(Request $request) {
        $taxRebateSlab = TaxRebateSlab::findOrFail($request->id);
        $taxRebateSlab->delete();
        return redirect()->back();
    }

}
