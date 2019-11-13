<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaksi;
use App\DetailTransaksi;
use Auth;
use App\Item;
use App\Cart;
use Mail;
use Arr;
use Chat;
class TransaksiController extends Controller
{
    public function beliItem(Request $request){
        if($request->get('submit') == "beli"){
            $arr = Arr::except($request->all(),['_token','submit']);
            $arr = Arr::add($arr,'id_user',Auth::user()->id_user);
            $arr = Arr::add($arr,'total_bayar',(Item::find($request->get('id_item')))->harga_item);
            $data = Transaksi::create(Arr::add($arr,'status_transaksi','chat1'));
            if($data){
                $participants = [Auth::user()->id_user, (Item::where('id_item',$request->get('id_item'))->with('ruser')->first())->id_user];
                $conversation = Chat::createConversation($participants)->makePrivate();
                $dat = ['title' => (Item::find($request->get('id_item')))->nama_item,'id_item'=>$request->get('id_item')];
                $conversation->update(['data' => $dat]);
                sendNotifTo(
                (Item::where('id_item',$request->get('id_item'))->with('ruser')->first())->ruser->id_user,"Pesanan <b>".(Item::where('id_item',$request->get('id_item'))->first())->nama_item." </b> baru","cart",url('seller/orders/'.$data->id_transaksi));
                $dataa = DetailTransaksi::create(array(
                    'id_transaksi' => $data->id_transaksi,
                    'id_item' => $request->get('id_item'),
                    'jumlah' => $request->get('jumlah'),
                    'harga_awal' => (Item::find($request->get('id_item')))->harga_item,
                    'withdrawal' => floor((Item::find($request->get('id_item')))->harga_item * config("config.withdraw_value")/100),
                    'conversation_id' => $conversation->id
                ));
                return redirect('i')->with('success','Transaksi sedang diproses!');
            }
            else{
                return redirect('i')->with('error','Server error. Coba lagi nanti!');
            }
        }
        else{
            app('App\Http\Controllers\TransaksiController')->addCart($request,$request->get('id_item'));
            return back()->with('success','Item sudah ditambahkan ke keranjang');
        }
    }
    public function detailTrans($id){
    	return view('seller/transaction/detail')->with('data',Transaksi::where('id_transaksi',$id)->with('ruser')->with('rdettrans')->first());
    }
    public function processOrder(Request $request,$id){
    	$data = Transaksi::find($id);
    	$data->status_transaksi = "selesai";
    	if($data->save()){
    		return redirect('seller/orders')->with('success',"Transaksi Telah Selesai Diproses");
    	}
    	else{
    		return back()->with('error','Terjadi kesalahan pada server');
    	}
    }
    public function orderHistory(){
    	return view('seller/transaction/history');
    }
    public function statusBuyer(){
        return view('buyer/transaction/index');
    }
    public function detTrans(Request $request,$id){
        return view('buyer/transaction/detail')->with('data',Transaksi::where('id_transaksi',$id)->withTrashed()->first());
    }
    public function deleteTrans(Request $request,$id){
        $data = Transaksi::find($id);
        $data->status_transaksi = "batal";
        if($data->delete()){
            return redirect('i')->with('success','Transaksi sudah dibatalkan');
        }
        else{
            return back()->with('error','Terjadi error di server');
        }
    }
    public function confirmPage(){
        return view('general/confirm')->with('data',Cart::where('id_user',Auth::user()->id_user)->with('ritem')->get());
    }
    public function addCart(Request $request,$id){
        if(Cart::where('id_item',$id)->where('id_user',Auth::user()->id_user)->first()){
            return back()->with('warning','Item sudah ada di keranjang');
        }
        else{
            $data = array(
                "id_item" => $id,
                "id_user" => Auth::user()->id_user,
                "jumlah" => ($request->has('jumlah'))?$request->get('jumlah'):1
            );
            $data = Cart::create($data);
            if($data){
                return back()->with('success','Item sudah ditambahkan ke keranjang');
            }
            else{
                return back()->with('error','Item gagal ditambahkan ke keranjang');
            }
        }
    }
    public function deleteCart(Request $request,$id){
        if(Cart::where('id_item',$id)->where('id_user',Auth::user()->id_user)->delete()){
            return back()->with('success','Item sudah dihapus dari keranjang');
        }
        else{
            return back()->with('error','Item gagal ditambahkan ke keranjang');
        }
    }
    public function checkoutCart(Request $request){
        $data = Transaksi::create(array("id_user" => Auth::user()->id_user,"status_transaksi" => "chat1"));
        $tbayar = 0;
        if($data){
            foreach(array_except($request->all(),['_token','submit']) as $key => $v){
                $participants = [Auth::user()->id_user, (Item::where('id_item',$key)->with('ruser')->first())->id_user];
                $conversation = Chat::createConversation($participants)->makePrivate();
                $dat = ['title' => (Item::find($key))->nama_item,'id_item'=>$key];
                $conversation->update(['data' => $dat]);
                sendNotifTo(
                (Item::where('id_item',$key)->with('ruser')->first())->ruser->id_user,"Pesanan <b>".(Item::where('id_item',$key)->first())->nama_item." </b> baru","cart",url('seller/orders/'.$data->id_transaksi));
                $dataa = DetailTransaksi::create(array(
                    'id_transaksi' => $data->id_transaksi,
                    'id_item' => $key,
                    'jumlah' => $v,
                    'harga_awal' => (Item::find($key))->harga_item,
                    "withdrawal" => floor((Item::find($key))->harga_item * config("config.withdraw_value")/100)
                ));
                $tbayar  = $tbayar + ($v * (Item::find($key))->harga_item);
                Cart::where('id_user',Auth::user()->id_user)->where('id_item',$key)->delete();
            }
            $data->total_bayar = $tbayar;
            $data->save();
            return redirect('i')->with('success','Transaksi sedang diproses!');
        }
        else{
            return redirect('i')->with('error','Server error. Coba lagi nanti!');
        }
    }
    public function withDrawalPage(Request $request){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://mutasibank.co.id/api/v1/statements/508",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => false,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => array('date_from' => Auth::user()->created_at->toDateString(),'date_to' => Carbon::now()->toDateString()),
          CURLOPT_HTTPHEADER => array(
            "Authorization: aWhESzkyNlp0UGpPUktpWmF5d3hHRHFyZHlWWllRbHNURzZwYUVERndTRTFDeHI3YlkycjNDNjJDMUJs5dafe5db491df"
          ),
        ));

        $response = json_decode(curl_exec($curl));
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            return view('seller/withdrawal/index')->with('data',$response->data);
        }
    }
    public function requestWithdrawal(Request $request){
        $kd_withdraw = null;
        $data = array(
                "nama" => Auth::user()->nama,
                "jumlah" => $request->get('amount'),
                "system_date" => $request->get('system_date')
        );
        Mail::send('seller.withdrawal.email_withdraw', ["data" => $data], function ($m) use ($request) {
            $m->from('no-reply@adestore.net', 'Ade Store Bot');
            $m->to(config("config.owner_email"), "config.owner_name")->subject('Permintaan Tarik Tunai');
        });
        if(Mail::failures()){
            return redirect('seller/withdrawal')->with('error',"Terjadi kesalahan pada server");
        }
        else{
            $det = DetailTransaksi::where('id_item',$request->get('id_item'))->where('id_transaksi',$request->get('id_trans'))->where('withdrawal',$request->get('amount'))->first();
            $det->status_withdraw = "proses";
            $det->kd_withdraw = $kd_withdraw;
            $det->update();
            return redirect('seller/withdrawal')->with('success',"Permintaan sudah dikirim!. Silahkan tunggu sampai pemberitahuan selanjutnya");
        }
    }
    public function deleteAllCart(Request $request){
        if(Cart::where('id_user',Auth::user()->id_user)->delete()){
            return back()->with('success','Keranjang sudah dikosongkan');
        }
        else{
            return back()->with('error','Keranjang gagal dikosongkan');
        }
    }
}
