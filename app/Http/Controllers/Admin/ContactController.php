<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $repository;

    public function __construct(ContactRepositoryInterface $repository)
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
        $contacts = $this->repository->getAll();

        return view('admin.contact.index',compact('contacts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request)
    {
        $request->validate([
            'contact_id' => 'required',
            'replied_message' => 'required',
        ]);

        $this->repository->reply($request);

        return redirect()->back()->with('success-message','create_successful');
    }


}
