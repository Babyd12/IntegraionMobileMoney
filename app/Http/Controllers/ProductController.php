<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use Mcire\PayTech\Facades\PayTech;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        try {
            $response = PayTech::requestPayment([
                'item_name' => 'Iphone 7',
                'item_price' => 100,
                'currency' => 'XOF',
                'ref_command' => Str::random(12),
                'command_name' => 'Paiement Iphone 7 Gold via PayTech',
            ]);
    
            return redirect($response['redirect_url']);
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

        /*
        $randomString = Str::random(12);
        $postfields = [
            'item_name' => 'Iphone 7',
            'item_price' => 100,
            'currency' => 'XOF',
            'ref_command' => $randomString,
            'command_name' => 'Paiement Iphone 7 Gold via PayTech',
            'env' => 'test',
            'ipn_url' => 'https://127.0.0.1:8000/ipn',
            'success_url' => 'http://127.0.0.1:8000/success', // Assurez-vous que les URLs sont bien formattées
            'cancel_url' => 'http://127.0.0.1:8000/cancel',
        ];
    
        $api_key = '9a4683d60b3b0dcb5dcc857fce305c8b77bb99402b7641a682958ff22cd6a0df';
        $api_secret = '364781078b6d32d10796d5e749b88b3c787ee9dd171059edb3a5723144ffb0a8';
    
        $response = Http::withHeaders([
            'API_KEY' => $api_key,
            'API_SECRET' => $api_secret,
            // 'Content-Type' => 'application/x-www-form-urlencoded;charset=utf-8',
        ])->post('https://paytech.sn/api/payment/request-payment', $postfields);
    
        // Affiche la réponse pour déboguer
            // dd($response->json());
        if($response->status() == 200){
            return redirect($response['redirect_url']); 
        } else{
            die($response->status() . ' Veillez communiquer cette erreur aux administrateur du site');
        }

        
        */
        
    }
    public function success(){
        dd('Successed Transaction ');
    }
    public function cancel(){
        dd('Cancel Transaction');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
