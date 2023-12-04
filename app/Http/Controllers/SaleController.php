<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\Client; //Añadimos modelo de clientes    
use App\Models\Product; //Añadimos modelo de productos    
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\PDF as PDF;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class SaleController extends Controller
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
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::get();
        $products = Product::get();
        return view('admin.sale.create', compact('clients', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        $sale = Sale::create($request->all()+[ 
            'sale_date'=>Carbon::now(),
            'user_id'=>Auth::user()->id,
            
        ]);
        $sale->update(['sale_date'=>$sale->created_at]);
        // dd($sale);
        foreach ($request->product_id as $key => $product){
            $results[] = array("product_id"=>$request->product_id[$key],
             "quantity"=>$request->quantity[$key], 
             "price"=>$request->price[$key],
            "discount"=>$request->discount[$key]);
        }

        $sale->saleDetails()->createMany($results);
        return redirect()->route('sales.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail){
            $subtotal += $saleDetail->quantity * $saleDetail->price - (
                ($saleDetail->quantity * $saleDetail->price) * $saleDetail->dsicount * 100);
        }
        return view ('admin.sale.show', compact('sale', 'subtotal', 'saleDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $clients = Client::get();
        return view ('admin.sale.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //Las ventas no se pueden actualizar, solo cambiar de estado
        //Por lo que no es necesaria una función de actualización
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //Tampoco se pueden eliminar las ventas
        //Por lo que tampoco se necesita una función para eliminar
    }

    public function pdf (Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail){
            $subtotal += $saleDetail->quantity * $saleDetail->price - (
                ($saleDetail->quantity * $saleDetail->price) * $saleDetail->dsicount * 100);
        }
        $pdf = PDF::loadview('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('Reporte_de_venta_'.$sale->id.'.pdf');
    }

    public function print(Sale $sale){
        try{
            $subtotal = 0;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail){
                $subtotal += $saleDetail->quantity * $saleDetail->price - (($saleDetail->quantity * $saleDetail->price) * $saleDetail->dsicount * 100);
            }
            $printer_name = "TM20";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            $printer->text("\$ 9,95\n");

            $printer->cut();
            $printer->close();

            return redirect()->back();
        }catch(\Throwable $th){
            return redirect()->back();
        }
    }

    // public function change_status(Sale $sale)
    // {
    //     if ($sale->status == 'VALID') {
    //         $sale->update(['status'=>'CANCELED']);
    //         return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
    //     } else {
    //         $sale->update(['status'=>'VALID']);
    //         return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
    //     } 
    // }
}
