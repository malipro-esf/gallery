<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Repositories\SettingsRepositoryInterface;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    private $repository;

    public function __construct(SettingsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = $this->repository->getAll();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_persian' => 'required|unique:settings',
            'title_english' => 'required|unique:settings',
            'text_persian' => 'required',
            'text_english' => 'required',
        ]);

        $this->repository->store($request->all());

        return redirect()->route('settings.index')->with('success-message','create_successful');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $setting)
    {
        $request->validate([
            'title_persian' => 'required|unique:settings,title_persian,'.$setting->id.'',
            'title_english' => 'required|unique:settings,title_english,'.$setting->id.'',
            'text_persian' => 'required',
            'text_english' => 'required',
        ]);

        $this->repository->update($setting, $request->all());

        return redirect()->route('settings.index')->with('success-message','update_successful');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $setting)
    {
        $this->repository->delete($setting);

        return redirect()->back()->with('success-message','delete_successful');


    }
}
