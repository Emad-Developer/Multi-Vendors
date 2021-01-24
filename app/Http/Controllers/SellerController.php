<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\Activity;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::paginate(3);
        return view('sellers.index',compact('sellers'));
    }

    public function show($id)
    {
        $seller = Seller::findOrFail($id);
        return view('sellers.show',compact('seller'));
    }

    public function create()
    {
        return view('sellers.create');
    }
    
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'sellerName'=>'required|string|max::100',
            'storeName'=>'required|string|max::100',
            'email'=>'required|email',
            'storeAddress'=>'required|string|max::100',
            'city'=>'required|string|max::100',
            'storePhone'=>'required|numeric',
            'img'=>'required|image',
        ]);
        // Move Images
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $new_name = uniqid().".$ext";
            $img->move(public_path('uploads/sellers/'),$new_name);
        // Create
        seller :: create([
            'sellerName' => $request->sellerName,
            'storeName' => $request->storeName,
            'email' => $request->email,
            'storeAddress' => $request->storeAddress,
            'city' => $request->city,
            'storePhone' => $request->storePhone,
            'storeImage' => $new_name,
        ]);
        return redirect(route('create_seller'));
    }

    public function edit($id)
    {
        $seller = seller::findOrFail($id);
        return view('sellers.edit',compact('seller'));
    }

    public function update(Request $request , $id)
    {
        // Validate
        $request->validate([
            'sellerName'=>'required|string|max::100',
            'storeName'=>'required|string|max::100',
            'email'=>'required|email',
            'storeAddress'=>'required|string|max::100',
            'city'=>'required|string|max::100',
            'storePhone'=>'required|numeric',
            'img'=>'required|image',
        ]);
        $seller = seller::findOrFail($id);
        $name = $seller->storeImage;
        
        if ($request->hasFile('img'))
        {
            if ($name !== null)
            {
                unlink( public_path('uploads/sellers/').$name);       
            }

            // Move Images
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = uniqid().".$ext";
            $img->move(public_path('uploads/sellers/'),$name);
        }
        // Update
        $seller -> update([
            'sellerName' => $request->sellerName,
            'storeName' => $request->storeName,
            'email' => $request->email,
            'storeAddress' => $request->storeAddress,
            'city' => $request->city,
            'storePhone' => $request->storePhone,
            'storeImage' => $name,            
        ]);
        return redirect(route('show_seller',$id));
    }

    public function delete($id)
    {
        $seller = seller::findOrFail($id);
        if($seller->storeImage !==null) 
        {
            unlink(public_path('uploads/sellers/'.$seller->storeImage));
        }
        $seller -> delete();
        return redirect(route('show_sellers',$id));
    }
}
