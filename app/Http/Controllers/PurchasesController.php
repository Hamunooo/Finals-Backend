<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Purchases;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller {

    // Customer views their purchases
    public function index() {
        $purchases = Purchases::with('product')
            ->where('user_id', Auth::id())->get();
        return view('customer.purchases', compact('purchases'));
    }

    // Customer browses all products
    public function browse() {
        $products = Products::all();
        return view('customer.browse', compact('products'));
    }

    // Customer buys a product
    public function store(Request $request) {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);
        $validated['user_id'] = Auth::id();
        Purchases::create($validated);
        return redirect()->route('customer.purchases')
            ->with('success', 'Product purchased successfully!');
    }

    // Customer removes a purchase
    public function destroy($id) {
        $purchase = Purchases::findOrFail($id);
        if ($purchase->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        $purchase->delete();
        return redirect()->route('customer.purchases')
            ->with('success', 'Purchase removed!');
    }
}