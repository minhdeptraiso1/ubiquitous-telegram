<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserAdminController extends Controller
{
    private $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }
   public function index(){
    $users = User::latest("id")->paginate(8);
    return view("admin.user.index", compact("users"));
   }
   public function delete($id){
    try {
        $this->users->find($id)->delete();
        return response()->json([
            'code' =>200,
            'message'=>'success'
        ], status: 200);

    } catch (\Exception $exception) {
        Log::error('Message' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        return response()->json([
            'code' =>500,
            'message'=>'fall'
        ], status: 500);

    }
}

    
}