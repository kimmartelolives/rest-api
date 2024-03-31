<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\V1\SkillCollection;
use App\Http\Resources\V1\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){

        // return response()->json("Skill Index");
        // return SkillResource::collection(Skill::all());
        // return SkillResource::collection(Skill::paginate(1));

        // php artisan make:resource V1/SkillCollection
        // return new SkillCollection(Skill::paginate(1));
        return new SkillCollection(Skill::all());
    }

    public function show(Skill $skill){

        // php artisan make:resource V1/SkillResource
        return new SkillResource($skill);

    }

    //php artisan make:request StoreSkillRequest
    public function store(StoreSkillRequest $request){

        Skill::create($request->validated());
        return response()->json("Skill Created");

    }

    public function update(StoreSkillRequest $request,  Skill $skill){

        $skill->update($request->validated());
        return response()->json("Skill Updated");
    }

    public function destroy(Skill $skill){

        $skill->delete();
        return response()->json("Skill Deleted");
    }
}
