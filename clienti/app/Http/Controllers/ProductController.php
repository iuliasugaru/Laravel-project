<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
/**
* Write code on Method
*
* @return response()
*/
public function index()
{
    $products = Product::all();
    return view('products', compact('products'));
}

function detail($id)
{
    $data= Product::find($id);
    return view('detail', ['product'=>$data]);
}

/**
* Write code on Method
*
* @return response()
*/
public function cart()
{
    return view('cart');
}
function placedorder()
{
    return "Your order has been placed!";
}
/**
* Write code on Method
*
* @return response()

*/
public function addToCart($id) //adauga item in interfata cart
{
    
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);
    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } 
    else {
    $cart[$id] = [
    "name" => $product->name,
    "quantity" => 1,
    "price" => $product->price,
    "image" => $product->image
    ];
    
    
    

    }
    session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
}


function addItemCart(Request $req) //adauga item in tabela Cart
{
    //return "hello";
    
   // if($req->session()->has('user'))
    //{
        $cart= new Cart;
        //$id = Auth::id(); 
        $cart->member_id=Auth::id();
        //$cart->member_id=$req->session()->get('user')['id'];
        $cart->product_id=$req->product_id;
        $cart->quantity=1;
        $cart->save();
        //addToCart($req->product_id);
        return redirect('/index');
    //}
   
    
}
static function countCartItem()
{
    $userId=Auth::id();
    return Cart::where('member_id',$userId)->count();
}
/**
* Write code on Method
*
* @return response()
*/
public function update(Request $request)
{
    if($request->id && $request->quantity){
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);
        session()->flash('success', 'Cart updated successfully');
    }
}
/**
* Write code on Method
*
* @return response()
*/
public function remove(Request $request) //removes item from cart interface
{
if($request->id) {
$cart = session()->get('cart');
    
    if(isset($cart[$request->id])) {
        unset($cart[$request->id]);
        session()->put('cart', $cart);
    }
    
    session()->flash('success', 'Product removed successfully');
    }
} 

function removeCart($id)
{
    Cart::destroy($id);
    return redirect('/cart');
}

}

