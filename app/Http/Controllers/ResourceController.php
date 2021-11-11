<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = [];
        
        // $request->session()->flush();
        
        if($request->session()->exists('resources')){
            $resources = $request->session()->get('resources');
        }
        
        $data = [];
        $data['resources'] = $resources;
        
        if($request->session()->exists('message')){
            $data['message'] = $request->session()->get('message');
            $type= 'success';
            if($request->session()->exists('type')){
                $type = $request->session()->get('type');
            }
            $data['type'] =$type;
        }
        
        return view('resource.index', $data);
    }

    public function create(Request $request)
    {
        $resources = [];
        $id =0;
        if($request->session()->exists('resources')){
            $resources = $request->session()->get('resources');
        }
        foreach ($resources as $resource){
            if ($resource['id']>$id){
                $id = $resource['id'];
            }
        }
        $id++;
        $data=[];
        $data['id'] = $id;
        // return $id;
        return view('resource.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        
        if($request->session()->exists('resources')){
            $resources = $request->session()->get('resources');
        } else{
            $resources = [];
        }
        
        $resource = ['id' => $id, 'name' => $name, 'price' => $price];
        if(isset($resources[$id])){
            // $request->session()->flush();
             return back()->withInput(); // No deberia tener dos returns en un método
        }
        else{
            $resources[$id] = $resource;
        }
        
        $request->session()->put('resources', $resources);
    
        return redirect('resource')->with('message', 'Se ha insertado el elemento correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        
        if($request->session()->exists('resources') && isset($request->session()->get('resources')[$id])){
            $resource = $request->session()->get('resources')[$id];
            
            $data = [];
            $data['resource']= $resource;
            return view('resource.show', $data);
        }
        return redirect('resource');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->session()->exists('resources')){
            $resources = $request->session()->get('resources');
            if(isset($resources[$id])){
                $resource = $request->session()->get('resources')[$id];
                $data = [];
                $data['resource'] = $resource;
                return view('resource.edit', $data);
            }else{
                // return redirect('404');
                return abort(404);
            }
        } else{
            return abort(404);
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
        if($request->session()->exists('resources')){
            $resources = $request->session()->get('resources');
            $idInput = $request->input('id');
            $nameInput = $request->input('name');
            $priceInput = $request->input('price');
            
            if(isset($resources[$id]) && (isset($resources[$idInput])==false || $idInput==$id)){
                // $resource = $resources[$id];
                $resource = ['id' => $idInput, 'name' => $nameInput, 'price' => $priceInput];
                unset($resources[$id]);
                $resources[$idInput]=$resource;
                $request->session()->put('resources', $resources);
                
                return redirect('resource')->with('message', 'Se editado el elemento correctamente');
            }
            
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->session()->exists('resources')){
            $resources = $request->session()->get('resources');
            if(isset($resources[$id])){
                unset($resources[$id]);
                $request->session()->put('resources', $resources);
                $message = 'Se ha eliminado el elemento correctamente';
                $type = 'success';
            }
        }
        $data = [];
        $data['message'] = $message;
        $data['type'] = $type;
        
        return redirect('resource')->with($data);
    }
    
    
    public function flush(Request $request){
        $request->session()->flush();
        return redirect('resource')->with('message', 'Se eliminado la sesion correctamente.');
    }
}
