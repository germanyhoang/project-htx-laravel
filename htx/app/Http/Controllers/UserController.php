<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Origin;
use App\Models\News;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Delivery;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //trang chu
    public function getIndex(Request $request)
    {
        //hiển thi banner
        $banners = Banner::where('status', 1)->get();
        //hien thi sanpham trang header
        // $categories = Category::all();
        // $origins = Origin::all();
        $latest_product=Product::where('status', 1)->orderBy('created_at', 'desc')->take(4)->get();
        // hien thi tin tuc moi nhat ra trang chu
        $latest_news = News::where('status', 1)->orderBy('created_at', 'desc')->take(4)->get();
        return view('frontend.index', compact('banners','latest_product','latest_news'));
    }

    //loai san pham & chi tiet san pham & tim kiem & tat ca san pham
    public function getProduct(Request $request)
    {

        $products = Product::where('status', 1)->get();
        $categories = Category::all();
        $origins = Origin::all();
        // Tạo một mảng chứa các sản phẩm theo từng danh mục
        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category->name] = Product::where('category_id', $category->id)->where('status', 1)
                ->latest()->limit(4)
                ->get();
        }
        return view('frontend.product', compact('products', 'categories', 'origins', 'productsByCategory'));
    }
    public function getDetailProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // Lấy danh mục của sản phẩm đang xem
        $category = $product->category;
        // Lấy ra các sản phẩm cùng danh mục (trừ sản phẩm đang xem)
        $relatedProducts = Product::where('category_id', $category->id)
            ->where('id', '!=', $product->id) // Loại bỏ sản phẩm đang xem
            ->limit(4) // Giới hạn số lượng sản phẩm liên quan
            ->get();
        return view('frontend.detailProduct', compact('product', 'category', 'relatedProducts'));
    }
    // gioi thieu, tin tuc, lien he  //
    public  function getIntro(Request $request)
    {
        return view('frontend.intro');
    }
    // tin tuc va chi tiet tin tuc
    public function getNews(Request $request)
    {
        //hien thi tin tuc
        $news = News::where('status', 1)->get();
        // Lấy 4 tin tức mới nhất với trường status là 1, sắp xếp theo thời gian tạo giảm dần
        $latest_news = News::where('status', 1)->orderBy('created_at', 'desc')->take(4)->get();

        $latest_titles = News::where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.news', compact('news', 'latest_news', 'latest_titles'));
    }
    public function getDetailNews(Request $request, $id)
    {
        $news = News::findOrFail($id);

        return view('frontend.newDetail', compact('news'));
    }

    // cam nang du lich
    public function getTipTravel(Request $request)
    {
        return view('frontend.tipTravel');
    }
    //gio hang
    public function getCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        return view('frontend.cartDetail', compact('cart'));
    }
    // them gio hang
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $quantity = $request->input('quantity', 1);

        // Kiểm tra xem giỏ hàng đã tồn tại chưa
        if (!$request->session()->has('cart')) {
            $request->session()->put('cart', []);
        }

        $cart = $request->session()->get('cart');

        // Thêm sản phẩm vào giỏ hàng
        $cart[$productId] = [
            'product' => $product,
            'quantity' => $quantity,
            'total_price' => $product->price * $quantity
        ];

        $request->session()->put('cart', $cart);

        return redirect()->route('getCart');
    }
    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart(Request $request, $productId)
    {
        // Kiểm tra xem giỏ hàng có tồn tại không
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');

            // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
            if (isset($cart[$productId])) {
                // Xóa sản phẩm khỏi giỏ hàng
                unset($cart[$productId]);
                $request->session()->put('cart', $cart);
            }
        }

        return redirect()->route('getCart');
    }
    public function updateCart(Request $request, $productId)
    {
        $quantity = $request->input('quantity');

        // Kiểm tra xem giỏ hàng đã tồn tại chưa
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');

            // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
            if (isset($cart[$productId])) {
                // Cập nhật số lượng sản phẩm trong giỏ hàng
                $cart[$productId]['quantity'] = $quantity;
                // Tính lại thành tiền dựa trên số lượng mới và giá của sản phẩm
                $cart[$productId]['total_price'] = $cart[$productId]['product']->price * $quantity;
                $request->session()->put('cart', $cart);
            }
        }

        return redirect()->route('getCart');
    }

    // checkout
    public function getCheckout(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $delivery = Delivery::all();
        $payment = Payment::all();
        return view('frontend.checkout', compact('cart', 'delivery', 'payment'));
    }
    private function calculateTotalPrice($cart)
{
    $totalPrice = 0;
    foreach ($cart as $productId => $item) {
        $totalPrice += $item['total_price'];
    }
    return $totalPrice;
}
    public function postCheckout(Request $request)
    {
    if (Auth::check()) {
        $cart = $request->session()->get('cart', []);

        // Tạo mới đơn hàng
        $order = new Order();
        $order->name = Auth::user()->name;
        $order->email = Auth::user()->email;
        $order->phone = Auth::user()->phone;
        $order->address = Auth::user()->address;
        $order->note = $request->note;
        // Gọi hàm tính tổng tiền
        $totalPrice = $this->calculateTotalPrice($cart);
        $order->total = $totalPrice;
        $order->delivery_id = $request->delivery_id;
        $order->payment_id = $request->delivery_id;
        $order->status = '1'; // Trạng thái mặc định khi đặt hàng
        $order->save();

        // Thêm chi tiết đơn hàng
        foreach ($cart as $productId => $item) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $productId;
            $orderDetail->quality = $item['quantity'];
            $orderDetail->price = $item['product']->price;
            $orderDetail->save();
        }

        // Xóa giỏ hàng sau khi đặt hàng thành công
        $request->session()->forget('cart');

        // Chuyển hướng đến trang thanh toán thành công
        return redirect()->route('getSuccess');
    } else {
        // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thực hiện đặt hàng.');
    }

    }

    // thanh toan thanh cong or failed
    public function getSuccess(Request $request)
    {
        return view('frontend.order');
    }
    public function getSuccessVnpay()
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://localhost/thanh-toan";
        $vnp_TmnCode = "RBCWFS6";//Mã website tại VNPAY
        $vnp_HashSecret = "AIOUVZZBXUYOWWFXJDQRBGYGOAAWSHVV"; //Chuỗi bí mật

        $vnp_TxnRef = '1256'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toan don hang test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 20000 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
        // $vnp_Bill_City=$_POST['txt_bill_city'];
        // $vnp_Bill_Country=$_POST['txt_bill_country'];
        // $vnp_Bill_State=$_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
        // $vnp_Inv_Email=$_POST['txt_inv_email'];
        // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
        // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
        // $vnp_Inv_Company=$_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type=$_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
            // "vnp_ExpireDate"=>$vnp_ExpireDate
            // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            // "vnp_Bill_Email"=>$vnp_Bill_Email,
            // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            // "vnp_Bill_Address"=>$vnp_Bill_Address,
            // "vnp_Bill_City"=>$vnp_Bill_City,
            // "vnp_Bill_Country"=>$vnp_Bill_Country,
            // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            // "vnp_Inv_Email"=>$vnp_Inv_Email,
            // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            // "vnp_Inv_Address"=>$vnp_Inv_Address,
            // "vnp_Inv_Company"=>$vnp_Inv_Company,
            // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            // "vnp_Inv_Type"=>$vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
    }
    // dich vu
    public function getService(Request $request){
        return view('frontend.service');
    }
    // chi tiet phong

    public function getDetailRoom(Request $request){
        return view('frontend.serviceRoom');
    }
    //dat tour
    public function getTour(Request $request){
        return view('frontend.serviceTour');
    }
    // lien he
    public function getContact(Request $request){
        return view('frontend.contact');
    }

    public function postContact(Request $request){

        //validate request
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|numeric|min:8|max:10',
            'content'=>'required',
        ]);
        //create new contact
         $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->content = $request->content;
        //save

        $contact->save();

    }

}
