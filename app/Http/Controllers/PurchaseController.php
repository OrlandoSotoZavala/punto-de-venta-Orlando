<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Provider; //Se añade el modelo de proveedores
use App\Models\Product; //Se añade el modelo de productos
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\PDF as PDF;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::get();
        $products = Product::get();
        return view('admin.purchase.create', compact('providers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseRequest $request)
    {
        $purchase = Purchase::create($request->all()+[ 
            'user_id'=>Auth::user()->id,
            'purchase_date'=>Carbon::now('America/Mexico_City'),
        ]);
        
        foreach ($request->product_id as $key => $product){
            $results[] = array("product_id"=>$request->product_id[$key],
             "quantity"=>$request->quantity[$key], 
             "price"=>$request->price[$key]);
        }

        $purchase->purchaseDetails()->createMany($results);

        return redirect()->route('purchases.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach($purchaseDetails as $purchaseDetail){
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        $providers = Provider::get();
        $products = Product::get();
        return view ('admin.purchase.edit', compact('purchase', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        //Las compras no se pueden actualizar, solo cambiar de estado
        //Por lo que no es necesaria una función de actualización
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //Tampoco se pueden eliminar las compras
        //Por lo que tampoco se necesita una función para eliminar
    }

    public function pdf(Purchase $purchase)
    {
        // dd($purchase);
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach($purchaseDetails as $purchaseDetail){
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        $pdf = PDF::loadview('admin.purchase.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->download('Reporte_de_compra_'.$purchase->id.'.pdf');
    }
}
