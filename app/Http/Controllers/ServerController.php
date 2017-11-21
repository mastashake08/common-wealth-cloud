<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Forge\ApiProvider;
use Laravel\Forge\Forge;
class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $forge = new Forge(new ApiProvider('api-token'));
        $credential = $forge->credentialFor('ocean2');

        // This will create new droplet on DigitalOcean with 1GB memory,
        // PHP 7.1 and MariaDb at Frankfurt region.
        $server = $forge->create()
            ->droplet()
            ->usingCredential($credential)
            ->withMemoryOf($request->ram)
            ->at('sfo1')
            ->runningPhp('7.1')
            //->withMariaDb()
            ->save();
            return response()->json($server);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
