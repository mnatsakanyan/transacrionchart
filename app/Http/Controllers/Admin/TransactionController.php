<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use View;
use Auth;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'transactions'=>Transaction::where("user_id",Auth::id())->get(),

        ];

        return view("admin.transactions.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'charts'=>Chart::where("user_id",Auth::id())->get()
        ];
        return view("admin.transactions.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'description'=>"required|max:255",
            'price'=>"required|numeric",
            'type'=>"required|in:0,1",
            'date'=>"required|date",
            'chart_id'=>"required|numeric|min:1",
        ]);
        $transaction = new Transaction();
        $transaction->fill($request->all());
        $transaction->user_id = Auth::id();
        $transaction->save();
        return redirect("admin/transactions/".$transaction->id."/edit")->with("success","Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        try{
            $transaction = Transaction::findOrFail($id);
            if($transaction->user_id != Auth::id()){
                return redirect()->back();
            }
            $data = [
                'entity'=>$transaction,
                'charts'=>Chart::where("user_id",Auth::id())->get()
            ];
            return view("admin.transactions.edit",$data);
        }catch (\Exception $e){
            print_r($e->getMessage());die;
            return redirect("admin/transactions")->with("error","Not Found");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'description'=>"required|max:255",
            'price'=>"required|numeric",
            'type'=>"required|in:0,1",
            'date'=>"required|date",
            'chart_id'=>"required|numeric|min:1",
        ]);

        $transaction = Transaction::findOrFail($id);
        if($transaction->user_id != Auth::id()){
            return redirect()->back();
        }
        $transaction->fill($request->all());
        $transaction->update();
        return redirect()->back()->with("success","Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            
            $transaction = Transaction::findOrFail($id);
            if($transaction->user_id != Auth::id()){
                return redirect()->back();
            }
            $transaction->destroy($id);
            return response()->json(['status'=>"ok","message"=>"Deleted"],200);
        }catch (\Exception $e){

        }
    }

    public function data(Datatables $datatables){
        $transactions = Transaction::query();
        $transactions = $transactions->where("user_id",Auth::id());
        return $datatables->eloquent($transactions)
            ->addColumn('actions', function (Transaction $transaction) {
                $data = [
                    'edit'   => 'transactions.edit',
                    'delete' => 'transactions.destroy',
                    'entity' => $transaction
                ];
                $view = View::make('partials.actions', $data);

                return $view->render();
            })
            //->addColumn('actions', 'partials.actions')
            ->rawColumns(['actions'])
            ->blacklist(['actions'])
            ->make(true);
    }

}
