<?php

namespace App\Http\Controllers;

use App\classes\homeSetting;
use App\Models\address;
use App\Models\carts;
use App\Models\category;
use App\Models\orders;
use App\Models\product;
use App\Models\role_user;
use App\Models\User;
use App\Models\order_status;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Log;

class OrdersController extends Controller
{
    public function create()
    {
        $setting = homeSetting::document();
        return view('user.order.create', ['setting' => $setting]);
    }
    public function store(Request $request)
    {
        $receipt = $request->file('receipt')->getClientOriginalName();
        $path = $request->file('receipt')->storeAs('receipts', $receipt, 'public');
        $name = $request->input('name');
        $family = $request->input('family');
        $cityId = $request->input('cityId');
        $addressText = $request->input('address');
        $postalCode = $request->input('postalCode');
        $phoneNumber = $request->input('phoneNumber');
        $email = $request->input('email');
        $nationalCode = $request->input('nationalCode');
        $descriptoin = $request->input('descriptoin');
        $pass = $request->input('password', null);
        $password = $pass ? Hash::make($pass) : null;
        $products = json_decode($request->products);
        $packs = json_decode($request->packs);

        if ($password) {
            User::upsert([
                'name' => $name,
                'family' => $family,
                'phoneNumber' => $phoneNumber,
                'email' => $email,
                'nationalCode' => $nationalCode,
                'password' => $password,
            ], ['phoneNumber'], ['name', 'family', 'email', 'nationalCode', 'password']);
        } else {
            User::upsert([
                'name' => $name,
                'family' => $family,
                'phoneNumber' => $phoneNumber,
                'email' => $email,
                'nationalCode' => $nationalCode,
            ], ['phoneNumber'], ['name', 'family', 'email', 'nationalCode']);
        }
        $user = User::where('phoneNumber', $phoneNumber)->first();
        role_user::create(['role_id' => 2, 'user_id' => $user->id]);

        $address = address::firstOrCreate([
            'user_id' => $user->id,
            'address' => $addressText,
            'city_id' => $cityId,
            'postalCode' => $postalCode
        ]);

        $dateTime = explode(' ', verta());
        $date = implode('/', explode('-', $dateTime[0]));
        $currentTime = explode(':', $dateTime[1]);
        unset($currentTime[count($currentTime) - 1]);
        $time = implode(':', $currentTime);

        $order = orders::create([
            'user_id' => $user->id,
            'description' => $descriptoin,
            'receipt' => $path,
            'onlinePayment' => 0,
            'address_id' => $address->id,
            'order_status_id' => 1,
            'date' => $date,
            'time' => $time,
        ]);

        $order_code = '100' . $order->id;
        orders::where('id', $order->id)->update(['order_code' => $order_code]);

        $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Api-Key: osgFftrhVdgwBgUCTgKpESk2mNzHBoIVfCm7cFIj6CMZZPcYSf',
            'Content-Type: application/json'
        ]);
        $payload = [
            'code' => 'y07pqlYB1J',
            'attributes' => [
                'order_code' => $order_code,
            ],
            'recipient' => $request->phoneNumber,
            'line_number' => '50002178584000',
            'number_format' => 'english'
        ];
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        $response = curl_exec($ch);
        curl_close($ch);

        if ($products) {
            foreach ($products as $product) {
                carts::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'quantity' => $product->quantity
                ]);
                $finalQuantity = $product->count-$product->quantity;
                product::where('id', $product->id)->update(['count'=>$finalQuantity]);
            }
        }
        if ($packs) {
            foreach ($packs as $pack) {
                carts::create([
                    'pack_id' => $pack->id,
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'quantity' => $pack->quantity
                ]);
            }
        }

        return redirect('/')->with('clearStorage', true);
    }
    public function index()
    {
        $orders = orders::orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        $categories = category::with('products')->has('products')->get();
        $products = product::where('show_in_home', 1)->get();

        foreach ($products as $product) {
            if ($product->media->isNotEmpty()) {
                foreach ($product->media as $media) {
                    if ($media['is_main']) {
                        $product['mainImg'] = $media['media_path'];
                        break;
                    } else {
                        $product['mainImg'] = 'default.jpg';
                    }
                }
            } else {
                $product['mainImg'] = 'default.jpg';
            }
        }
        $setting = homeSetting::document();
        foreach($orders as $order){
            $total = 0;
            foreach($order->carts as $cart){
                if($cart->product){
                    if($cart->product->secondary_price){
                        $total += $cart->product->secondary_price;
                    } else {
                        $total += $cart->product->primary_price;
                    }
                }
            }
            $order->totalPrice = $total;
        }
        return view('admin.order.index', [
            'categories' => $categories,
            'products' => $products,
            'orders' => $orders,
            'setting' => $setting
        ]);
    }
    public function userOrders()
    {
        $orders = Auth::user()->orders()->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        $categories = category::with('products')->has('products')->get();
        $products = product::where('show_in_home', 1)->get();

        foreach ($products as $product) {
            if ($product->media->isNotEmpty()) {
                foreach ($product->media as $media) {
                    if ($media['is_main']) {
                        $product['mainImg'] = $media['media_path'];
                        break;
                    } else {
                        $product['mainImg'] = 'default.jpg';
                    }
                }
            } else {
                $product['mainImg'] = 'default.jpg';
            }
        }
        $setting = homeSetting::document();
        foreach($orders as $order){
            $total = 0;
            foreach($order->carts as $cart){
                if($cart->product){
                    if($cart->product->secondary_price){
                        $total += $cart->product->secondary_price;
                    } else {
                        $total += $cart->product->primary_price;
                    }
                }
            }
            $order->totalPrice = $total;
        }
        return view('admin.order.userOrders', [
            'categories' => $categories,
            'products' => $products,
            'orders' => $orders,
            'setting' => $setting
        ]);
    }
    public function showItems(orders $order)
    {
        $order->load(['carts' => function ($query) {
            $query->with(['product' => function ($q) {
                $q->with(['media' => function ($qr) {
                    $qr->where('is_main', 1)->get();
                }]);
            }]);
            $query->with('pack');
        }]);
        $order->state;
        return response()->json($order);
    }
    public function cancelAll(User $user)
    {
        carts::where('user_id', $user->id)->whereNull('order_id')->delete();
        return response()->json('ok');
    }
    
// public function acceptOrder(Request $request)
// {
//     $order = orders::with(['state', 'carts.product'])->find($request->order_id);
//     $order_code = '100' . $request->order_id;

//     if ($request->status == 1) {
//         $order->order_status_id = 2;
//          $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//         curl_setopt($ch, CURLOPT_HTTPHEADER, [
//             'Accept: application/json',
//             'Api-Key: osgFftrhVdgwBgUCTgKpESk2mNzHBoIVfCm7cFIj6CMZZPcYSf',
//             'Content-Type: application/json'
//         ]);
//         $payload = [
//             'code' => 'kQLgTwMCCg',
//             'attributes' => [
//                 'order_code' => $order_code,
//             ],
//             'recipient' => $request->phoneNumber,
//             'line_number' => '50002178584000',
//             'number_format' => 'english'
//         ];
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
//         $response = curl_exec($ch);
//     }
//     if ($request->status == 2) {
//         $order->order_status_id = 3;
//         $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//         curl_setopt($ch, CURLOPT_HTTPHEADER, [
//             'Accept: application/json',
//             'Api-Key: osgFftrhVdgwBgUCTgKpESk2mNzHBoIVfCm7cFIj6CMZZPcYSf',
//             'Content-Type: application/json'
//         ]);
//         $payload = [
//             'code' => '6vLpqeJOLV',
//             'attributes' => [
//                 'order_code' => $order_code,
//             ],
//             'recipient' => $request->phoneNumber,
//             'line_number' => '50002178584000',
//             'number_format' => 'english'
//         ];
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
//         $response = curl_exec($ch);
//     }
//     if ($request->status == 3) {
//         $order->order_status_id = 4;  
//     }
//     if ($request->status == 4) {
//         $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//         curl_setopt($ch, CURLOPT_HTTPHEADER, [
//             'Accept: application/json',
//             'Api-Key: osgFftrhVdgwBgUCTgKpESk2mNzHBoIVfCm7cFIj6CMZZPcYSf',
//             'Content-Type: application/json'
//         ]);
//         $payload = [
//             'code' => 'w7QcIFg9pC',
//             'attributes' => [
//                 'order_code' => $order_code,
//             ],
//             'recipient' => $request->phoneNumber,
//             'line_number' => '50002178584000',
//             'number_format' => 'english'
//         ];
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
//         $response = curl_exec($ch);
//     }

//     $order->save();
    
//     $phoneNumber = $order->phone;
//     $order_code = $order->id;


//     $order->load('state');
//     return response()->json(['order'=>$order, 'phoneNumber'=>$phoneNumber]);

// }


    public function acceptOrder(Request $request)
    {
        $order = orders::with(['state', 'carts.product'])->find($request->order_id);
        $order_code = '100' . $request->order_id;
        
        if ($request->status == 1) {
            $order->order_status_id = 2;
        }
        if ($request->status == 2) {
            $order->order_status_id = 3;
        }
        if ($request->status == 3) {
            $order->order_status_id = 4;
        }
        if ($request->status == 1) {
            $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Accept: application/json',
                'Api-Key: osgFftrhVdgwBgUCTgKpESk2mNzHBoIVfCm7cFIj6CMZZPcYSf',
                'Content-Type: application/json'
            ]);
            $payload = [
                'code' => 'kQLgTwMCCg',
                'attributes' => [
                    'order_code' => $order_code,
                ],
                'recipient' => $request->phoneNumber,
                'line_number' => '50002178584000',
                'number_format' => 'english'
            ];
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            $response = curl_exec($ch);
            curl_close($ch);
        }

        if ($request->status == 2) {
            $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Accept: application/json',
                'Api-Key: osgFftrhVdgwBgUCTgKpESk2mNzHBoIVfCm7cFIj6CMZZPcYSf',
                'Content-Type: application/json'
            ]);
            $payload = [
                'code' => '6VLpqeJOLV',
                'attributes' => [
                    'order_code' => $order_code,
                ],
                'recipient' => $request->phoneNumber,
                'line_number' => '50002178584000',
                'number_format' => 'english'
            ];
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            $response = curl_exec($ch);
            curl_close($ch);
        }
        if ($request->status == 3) {
            $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Accept: application/json',
                'Api-Key: osgFftrhVdgwBgUCTgKpESk2mNzHBoIVfCm7cFIj6CMZZPcYSf',
                'Content-Type: application/json'
            ]);
            $payload = [
                'code' => 'w7QcIFg9pC',
                'attributes' => [
                    'order_code' => $order_code,
                ],
                'recipient' => $request->phoneNumber,
                'line_number' => '50002178584000',
                'number_format' => 'english'
            ];
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            $response = curl_exec($ch);
            curl_close($ch);
        }
        $order->save();

        $order_code = $order->id;

      

        $order->load('state');

        return response()->json(['order' => $order, 'phoneNumber' => $request->phoneNumber]);
    }



    // public function acceptOrder(Request $request)
    // {
    //     $order = orders::with(['state', 'carts.product'])->find($request->order_id);

    //     // if (!$order) {
    //     //     return response()->json(['error' => 'سفارش یافت نشد'], 404);
    //     // }

    //     // return response()->json($order);

    //     if ($request->status == 1) {
    //         $order->order_status_id = 2;
    //     }
    //     if ($request->status == 2) {
    //         $order->order_status_id = 3;
    //     }
    //     if ($request->status == 3) {
    //         $order->order_status_id = 4;
    //     }

    //     $order->save();

    //     // Log::info($order);

    //     $order->load('state');


    //     // return response()->json([$order, $request->all()]);
    //     return response()->json($order);
    // }

}
