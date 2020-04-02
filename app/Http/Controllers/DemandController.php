<?php

namespace App\Http\Controllers;

use App\Category;
use App\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cat=(isset($_GET['cat']))?$_GET['cat']:'0';
        $coun=(isset($_GET['coun']))?$_GET['coun']:'0';
        if($cat!='0'){
            $demands=Demand::where('category_id',$cat)->latest()->paginate(25);
        }elseif($coun!='0'){
            $demands=Demand::where('category_id','!=',0)->where('country',$coun)->latest()->paginate(25);

        }else{
            $demands=Demand::where('category_id','!=',0)->latest()->paginate(25);
        }
        $newdemands=Demand::where('category_id',0)->latest()->get();
        $lang = session('lang');
        $categories=Category::where('lang', $lang)->get();


        $cities=DB::table('demands')
            ->select('country', DB::raw('count(*) as total'))
            ->groupBy('country')
            ->get();
        return view('front.demand',compact(['lang','cities','demands','categories','newdemands']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:190',
            'desc' => 'required',
            'country' => 'required',
            'name' => 'required|max:190',
            'email' => 'required|email',
            'phone' => 'required|min:6|max:15',
        ]);
        if(isset($request->eid)){
            $demand=Demand::find($request->eid);
            $demand->title=$request->title;
            $demand->desc=$request->desc;
            $demand->country=$request->country;
            $demand->name=$request->name;
            $demand->email=$request->email;
            $demand->phone=$request->phone;
            $demand->port=$request->port;
            $demand->category_id=$request->ecategory;
            $demand->save();
            $msg= __('alert.success_demand_published');

        }else{
            $demand=new Demand;
            $demand->title=$request->title;
            $demand->desc=$request->desc;
            $demand->country=$request->country;
            $demand->name=$request->name;
            $demand->email=$request->email;
            $demand->phone=$request->phone;
            $demand->port=$request->port;
            $demand->showPhone=(isset($request->showphone)?0:1);
            $demand->save();
            $msg= __('alert.success_demand_added');

        }



        return redirect(route('requests.index'))->with([
            'alert' => $msg
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function show(Demand $demand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function edit(Demand $demand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demand $demand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demand $demand)
    {
        //
    }
}
