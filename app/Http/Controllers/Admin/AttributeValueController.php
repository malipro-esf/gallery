<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Repositories\AttributeValueRepositoryInterface;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    private $repository;

    public function __construct(AttributeValueRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $data = $this->repository->getAll($request);

        $attributes = $data['attributes'];
        $attributeValues = $data['values'];

        return view('admin.attribute-value.index',compact('attributeValues','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->store($request);

        return back()->with('success-message','create_successful');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeValue $attributeValue)
    {
        $this->repository->update($attributeValue, $request);

        return back()->with('success-message','update_successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeValue $attributeValue)
    {
        if($this->repository->delete($attributeValue))
            return back()->with('success-message','delete_successful');

        return back()->with('error-message','can not delete because of related records');
    }
}
