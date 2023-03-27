<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;

class AnnouncementController extends ApiController
{
    //Add Announcement
    public function addAnnouncement(Request $request){
        $user = auth()->user();
        if($user->tokenCan('Employee') ){
            try {
            $user = User::where('users.id','=',$request->user()->id)
            ->join('employees','users.user_id','employees.id')->select('employees.id')->get('employees.id');
            $userId =$user[0]['id'];
            $add_announcement = Announcement::create([
                'employee_id' => $userId,
                'head' => $request->head,
                'body' => $request->body,
            ]);
            $message = 'Announcement added successfully.';
            return $this->sendResponse(new AnnouncementResource($add_announcement), $message);
        } catch (\Exception $e) {
            $message = 'An error occurred during the add process.';
            return $this->sendError($e->getMessage());
        }
        }
        return response()->json(['success'=>false]);
    }
    //Update Announcement
    public function updateAnnouncement(Request $request ,$id){
        $user = auth()->user();
        if($user->tokenCan('Employee') ){
            try {
            $user = User::where('users.id','=',$request->user()->id)
            ->join('employees','users.user_id','employees.id')->select('employees.id')->get('employees.id');
            $userId =$user[0]['id'];
            $update_announcement = Announcement::where('id', $id)->update([
                'employee_id' => $userId,
                'head' => $request->head,
                'body' => $request->body,
            ]);
            $message = 'Announcement updated successfully.';
            return $this->sendResponse($update_announcement, $message);
        } catch (\Exception $e) {
            $message = 'Announcement could not be updated.';
            return $this->sendError($e->getMessage());
        }
        }
        return response()->json(['success'=>false]);
    }
    //Delete Announcement
    public function deleteAnnouncement(Request $request,$id){
        $user = auth()->user();
        if($user->tokenCan('Employee') ){
            try {
            $announcement_find = Announcement::find($id);
            $delete_announcement = $announcement_find->delete();
            $message = "Announcement Deleted.";
            return $this->sendResponse($delete_announcement, $message);
        } catch (\Exception $e) {
            $message = "Something went wrong.";
            return $this->sendError($message);
        }
        }
        return response()->json(['success'=>false]);
    }
}
