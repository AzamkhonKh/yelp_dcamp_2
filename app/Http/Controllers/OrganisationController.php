<?php

namespace App\Http\Controllers;

use App\Http\Requests\organisation\StoreCommentRequest;
use App\Http\Requests\organisation\StoreOrganisationRequest;
use App\Http\Requests\organisation\UpdateRequest;
use App\Models\Comments;
use App\Models\Organisation;
use App\Models\Tag;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    public function index()
    {
        $organisations = Organisation::with('tags')->get();
        
        return $organisations;
    }

    public function comments($id)
    {
        $organisation = Organisation::with('comments')
            ->findOrFail($id);
        return $organisation->comments;
    }

    public function store(StoreOrganisationRequest $request)
    {
        $data = $request->validated();
        $data['source'] .= '_api'; 
        $organisation = Organisation::add($data);
        return $organisation;
    }

    public function update(UpdateRequest $request, $id)
    {
        Organisation::findOrFail($id)
            ->update($request->validated());

        return Organisation::where('id', '=', $id)->first();
    }

    public function destroy($id)
    {
        if(Organisation::where('id', '=', $id)->delete())
        {
            $message = 'Organisation deleted succesfully !';
        } else {
            $message = 'Organisation did not deleted !';
        }
        return [
            'message' => $message
        ];
    }
    
    public function store_comment(StoreCommentRequest $request, $id)
    {

        $comment = Organisation::findOrFail($id)
            ->comments()
            ->create($request->validated());

        return $comment;
    }

    public function edit_comment(StoreCommentRequest $request, $id, $comment_id)
    {
        Comments::findOrFail($comment_id)
            ->update($request->validated());

        return Comments::findOrFail($comment_id);
    }

    public function destroy_comment($comment_id)
    {
        $deleted = Comments::findOrFail($comment_id)->delete();
        if($deleted){
            return [
                'message' => 'deleted!'
            ];
        }

        return [
            'message' => 'not deleted!'
        ];
    }
}
