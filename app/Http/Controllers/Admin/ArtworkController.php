<?php

namespace App\Http\Controllers\Admin;

use App\ArtworkEmail\NewArtworkEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtworkStoreRequest;
use App\Http\Requests\ArtworkUpdateRequest;
use App\Models\Artwork;
use App\Repositories\ArtworkRepositoryInterface;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    private $repository;

    public function __construct(ArtworkRepositoryInterface $repository)
    {
        $this->repository = $repository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $artworks =  $this->repository->getAll($request);

        return view('admin.artwork.index', compact('artworks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items =  $this->repository->create();

        $categories = $items['categories'];
        $tags = $items['tags'];
        $attributes = $items['attributes'];

        return view('admin.artwork.create', compact('categories', 'tags', 'attributes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtworkStoreRequest $request)
    {
        $this->repository->store($request);

        NewArtworkEmail::sendEmail();

//        return redirect()->route('send.new.art.email');

        return redirect()->route('artwork.index')->with('success-message','create_successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artwork $artwork)
    {
        return $this->repository->show($artwork);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Artwork $artwork)
    {
        return $this->repository->edit($artwork);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtworkUpdateRequest $request, Artwork $artwork)
    {
        $this->repository->update($artwork, $request);

        return redirect()->route('artwork.index')->with('success-message','update_successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artwork $artwork)
    {
        $this->repository->delete($artwork);

        return back()->with('success-message','delete_successful');

    }
}
