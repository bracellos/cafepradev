<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticlesResource;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArticlesController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Articles"},
     *   path="/articles",
     *   summary="list all articles",
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found"),
     * )
     */
    public function index()
    {
        return ArticlesResource::collection(Articles::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Articles;
        $article->title = $request->title;
        $article->preview = $request->preview;
        $article->author = $request->author;
        $article->text = $request->text;
        $article->from_categories = $request->from_categories;
        $article->date = $request->date;

        try {
            $article->save();

        } catch (ValidationException $e) {
            $e->withMessages([
                "status" => "error",
                "message" => "Data is not insert"
            ]);
        }

        return response()->json([
            "status" => "success",
            "message" => "Data insert success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Articles::find($id);
        if(empty($article)){
            return response()->json([
                "status" => "error",
                "message" => "data with id {$id} don't exists"
            ]);
        }
        return new ArticlesResource($article);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Articles::find($id);
        if(empty($article)){
            return response()->json([
                "status" => "error",
                "message" => "data with id {$id} don't exists"
            ]);
        }
        $article->title = $request->title;
        $article->preview = $request->preview;
        $article->author = $request->author;
        $article->text = $request->text;
        $article->from_categories = $request->from_categories;
        $article->date = $request->date;

        try {
            $article->update();

        } catch (ValidationException $e) {
            $e->withMessages([
                "status" => "error",
                "message" => "Data is not update"
            ]);
        }

        return response()->json([
            "status" => "success",
            "message" => "Data update success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $article = Articles::find($id);
            if(empty($article)){
                return response()->json([
                    "status" => "error",
                    "message" => "data with id {$id} don't exists"
                ]);
            }
            $article->delete();
            
            return response()->json([
                "status" => "success",
                "message" => "Data is deleted"
            ]);
        } catch (ValidationException $e) {
            $e->withMessages([
                "status" => "error",
                "message" => "No data delete"
            ]);
        }
    }
}
