<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerProduct;
use App\Models\image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class Online_Shop_Management_Controller extends Controller
{
    public function adminhome(Request $request)
    {
        $data = [];
        $customer = new customer();
        if ($request->name) {
            $customer = $customer->where('name', 'LIKE', "%{$request->name}%");
        }
        if ($request->email) {
            $customer = $customer->where('email', 'LIKE', "%{$request->email}%");
        }
        if ($request->phone) {
            $customer = $customer->where('phone', 'LIKE', "%{$request->phone}%");
        }
        if ($request->address) {
            $customer = $customer->where('address', 'LIKE', "%{$request->address}%");
        }

        $customers = $customer->get();
        $data['customer'] = $customers;
        return view('admin_home', $data);
    }

//    customer
    public function customerhome()
    {
        return view('login');
    }

    public function login_check(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $found = customer::where('username', $username)->where('password', $password)->count();

        if ($found == 0) {
            return redirect()->back()->with('fail', 'Username or Password invalid');
        } else {

            $data = [];
            $customerlist = customer::where('username', $username)->where('password', $password)->get();
            $data['customer'] = $customerlist;
            $product = product::all();
            $data['products'] = $product;
            return view('customer_home', $data);
        }
    }

    public function sign_up()
    {
        return view('sign_up');
    }

    public function save_customer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $username = $request->username;
        $password = $request->password;


        $stu = new Customer();
        $stu->name = $name;
        $stu->email = $email;
        $stu->phone = $phone;
        $stu->address = $address;
        $stu->username = $username;
        $stu->password = $password;
        $stu->save();
        return view('login');
    }

    public function edit_customer($id)
    {
        $data = customer::where('id', '=', $id)->first();

        return response()->json([
            'status' => 200,
            'customer' => $data
        ]);
    }

    public function update_customer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $studentObj = new customer();
        $student = $studentObj->find($request->id);
        $student->fill($request->all())->save();
        return redirect()->back()->with('success', 'Customer updated successfully');
//        return view('customer_home')->with('success', 'Customer updated successfully');

    }

    public function add_product(Request $request)
    {
        $product = new product();
        $product_name = $request->productname;
        $product_price = $request->productprice;
        $product_quantity = $request->productquantity;

        $product->name = $product_name;
        $product->price = $product_price;
        $product->quantity = $product_quantity;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('public/image'), $filename);
            $product['image'] = $filename;
        }
        $product->save();
        return redirect()->back()->with('success', 'Product Added successfully');
    }

    public function view_byproduct(Request $request)
    {
        $data = [];
        $customer = new CustomerProduct();
        if ($request->customerid) {
            $customer = $customer->where('customer_id', 'LIKE', "%{$request->customerid}%");
        }
        $customers = $customer->with('product')->get();
        $data['customer_product'] = $customers;
        return view('customer_product', $data);

    }

    public function add_to_cart(Request $request)
    {
        $customer_product = new CustomerProduct();
        $customerid = $request->customerid;
        $productid = $request->productid;

        $found = CustomerProduct::where('customer_id', $customerid)->where('product_id', $productid)->count();
        if($found==0)
        {
            $customer_product->customer_id = $customerid;
            $customer_product->product_id = $productid;
            $customer_product->save();
            return redirect()->back()->with('success', 'Add to cart Successfully');
        }
else
{
    return redirect()->back()->with('fail', 'product Already added');
}
    }

    public function view_addtocart_product($id)
    {
        $customer_product = CustomerProduct::with('product')->where('customer_id', $id)->get();

        return response()->json([
            'status' => 200,
            'customerproduct' => $customer_product
        ]);
    }

    public function view_product_list(Request $request)
    {

        $data = [];
        $product = new product();
        if ($request->name) {
            $product = $product->where('name', 'LIKE', "%{$request->name}%");
        }
        if ($request->price) {
            $product = $product->where('price', 'LIKE', "%{$request->price}%");
        }
        if ($request->quantity) {
            $product = $product->where('quantity', 'LIKE', "%{$request->quantity}%");
        }

        $products = $product->get();
        $data['products'] = $products;
        return view('productlist', $data);

    }

    public function delete_product($id)
    {

        product::find($id)->delete();
        return redirect('productlist')->with('success', 'Product Delete Successfully');
    }


    public function update_product(Request $request)
    {

        $productObj = new product();
        $product = $productObj->find($request->id);
        $product->fill($request->all())->save();

        return redirect()->back()->with('success', 'product updated successfully');
    }

    public function edit_product($id)
    {
        $data = product::where('id', '=', $id)->first();

        return response()->json([
            'status' => 200,
            'product' => $data
        ]);
    }

    public function add_image()
    {
        return view('add_image');
    }

    public function storeImage(Request $request)
    {
        $data = new image();
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/image'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
//        return redirect()->route('images.view');
        return view('add_image');
    }

    public function sidebar()
    {
        return view('sidebar');
    }

    public function View_Add_to_cart_product($customerid)
    {

        $data=[];
        $customer_product = CustomerProduct::with('product')->where('customer_id', $customerid)->get();
        $data['products'] = $customer_product;
//        return $customer_product;
        return view('add_to_cart_product', $data);
    }

    public function delete_cart_product(Request $request)
    {
        $customerid=$request->get('customerid');
        $productid=$request->get('productid');

        CustomerProduct::where('customer_id',$customerid)->where('product_id',$productid)->delete();
//        return redirect('add_to_cart_product')->with('success', 'Product Delete Successfully');


    }
}
