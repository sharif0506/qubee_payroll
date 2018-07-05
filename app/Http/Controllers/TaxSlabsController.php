<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaxSlab;

class TaxSlabsController extends Controller {

    public function index() {
        $taxSlabs = TaxSlab::all();
        return view("tax_slabs.index", array("taxSlabs" => $taxSlabs));
    }

    public function showAdd() {
        return view("tax_slabs.add");
    }

    public function add(Request $request) {
        $request->validate([
            'slab_order' => 'required',
            'amount' => 'required',
            'tax_rule' => 'required',
            'tax_rate' => 'required'
        ]);
        $taxSlab = new TaxSlab();
        $taxSlab->slab_order = $request->slab_order;
        $taxSlab->amount = $request->amount;
        $taxSlab->tax_rule = $request->tax_rule;
        $taxSlab->tax_rate = $request->tax_rate;
        $taxSlab->remark = $request->remark;
        $taxSlab->save();
        return redirect()->back()->with("message", "New tax slab added successfully");
    }

    public function showEdit($id) {
        $taxSlab = TaxSlab::findOrFail($id);
        return view("tax_slabs.edit", ["taxSlab" => $taxSlab]);
    }

    public function edit(Request $request) {
        $request->validate([
            'slab_order' => 'required',
            'amount' => 'required',
            'tax_rule' => 'required',
            'tax_rate' => 'required'
        ]);
        $taxSlab = TaxSlab::findOrFail($request->id);
        $taxSlab->slab_order = $request->slab_order;
        $taxSlab->amount = $request->amount;
        $taxSlab->tax_rule = $request->tax_rule;
        $taxSlab->tax_rate = $request->tax_rate;
        $taxSlab->remark = $request->remark;
        $taxSlab->save();
        return redirect()->back()->with("message", "Tax salb info updated successfully");
    }

    public function delete(Request $request) {
        $taxSlab = TaxSlab::findOrFail($request->id);
        $taxSlab->delete();
        return redirect()->back();
    }

}
