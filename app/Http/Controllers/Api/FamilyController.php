<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FamilyResource;
use App\Models\Family;

class FamilyController extends Controller
{
     /**
     * @OA\Get(
     *      path="/api/family",
     *      tags={"Family"},
     *      summary="Get All Family Member",
     *      description="Get all family member",
     *      @OA\Response(
     *          response="200",
     *          description="success"
     *      )
     * )
     */
    public function index()
    {
        return response()->json(FamilyResource::collection(Family::all()));
    }

    /**
     * @OA\Get(
     *      path="/api/family/{id}",
     *      tags={"Family"},
     *      summary="Show Family Member Detail",
     *      description="Get family Member detail",
     *      @OA\Parameter(
     *          name="id",
     *          description="Family Member ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="success"
     *      )
     * )
     */
    public function show($id)
    {
        return response()->json(new FamilyResource(Family::find($id)));
    }

    public function edit($id)
    {

    }

     /**
     * @OA\Post(
     *      path="/api/family",
     *      tags={"Family"},
     *      summary="Create New Family Member",
     *      description="Store family member data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="nama",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="jenis_kelamin",
     *                      type="integer",
     *                      enum={"1", "2"}
     *                  ),
     *                  @OA\Property(
     *                      property="parent_id",
     *                      type="integer"
     *                  ),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="success"
     *      )
     * )
     */
    public function store(Request $request)
    {
        return response()->json(new FamilyResource(Family::create(request()->all())));
    }

     /**
     * @OA\Put(
     *      path="/api/family/{id}",
     *      tags={"Family"},
     *      summary="Update Family Member",
     *      description="Update family member data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Family Member ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="nama",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="jenis_kelamin",
     *                      type="integer",
     *                      enum={"1", "2"}
     *                  ),
     *                  @OA\Property(
     *                      property="parent_id",
     *                      type="integer"
     *                  ),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="success"
     *      )
     * )
     */
    public function update($id, Request $request)
    {
        $data = Family::find($id);
        $data->update(request()->all());
        return response()->json(new FamilyResource($data));
    }

    /**
     * @OA\Delete(
     *      path="/api/family/{id}",
     *      tags={"Family"},
     *      summary="Delete Family Member",
     *      description="Delete family member",
     *      @OA\Parameter(
     *          name="id",
     *          description="Transaction ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="success"
     *      )
     * )
     */
    public function destroy($id)
    {
        return response()->json(Family::destroy($id));
    }
}
