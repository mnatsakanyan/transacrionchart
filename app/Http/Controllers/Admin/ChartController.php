<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use View;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'charts'=>Chart::paginate(15)
        ];
        return view("admin.charts.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("admin.charts.create");
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
            'title'=>'required|min:5|max:255|unique:charts'
        ]);
        $chart = new Chart();
        $chart->title = $request->title;
        $chart->save();
        return redirect("admin/charts")->with("success","Created");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("admin.charts.edit");
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
            $data = [
                'entity'=>Chart::findOrFail($id)
            ];
            return view("admin.charts.edit",$data);
        }catch (\Exception $e){
            return redirect("admin/charts")->with("error","Not Found");
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

        try{
            $chart = Chart::findOrFail($id);
            $chart->title = $request->title;
            $chart->update();
            return redirect()->back()->with("success","Updated");
        }catch (\Exception $e){
            return redirect()->back()->with("error","Not Found");
        }
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
            $chart = Chart::findOrFail($id);
           $chart->destroy($id);
            return response()->json(['status'=>"ok","message"=>"Deleted"],200);
        }catch (\Exception $e){

        }
    }


    public function data(Datatables $datatables){
        $charts = Chart::query();

        return $datatables->eloquent($charts)
            ->addColumn('actions', function (Chart $chart) {
                $data = [
                    'edit'   => 'charts.edit',
                    'delete' => 'charts.destroy',
                    'entity' => $chart
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
