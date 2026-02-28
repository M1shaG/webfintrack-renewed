<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finances;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class IndexController extends Controller
{
    function showIndex() {
        if(Auth::check()) {
            return redirect()->route('show.profile');
        }
        return view('index');
    }

    function showProfile() {
        $user = Auth::user();
        $totalFinances = $user->finances()->sum('finance');
        $userBalance = Auth::user()->balance;
        
        $userBalance = $userBalance + $totalFinances;

        $history = $user->finances->map(function($item) {
            return [
                'id' => $item->id,
                'finance' => $item->finance,
                'description' => $item->description,
                'date' => $item->created_at
            ];
        });

    
        return view('user.profile')->with([
            'history' => $history,
            'userBalance' => $userBalance,
        ]);
    }

    function add(Request $request) {
        $valid_data = $request->validate([
            'money' => 'required|numeric|min:-21474836|max:21474836',
            'description' => 'nullable|string|max:1000',
            'choice' => 'required|in:+,-' 
        ]);

        $valid_data['money'] *= 100;
        if($valid_data['choice'] == "-") {
            $valid_data['money'] *= -1;
        }

        Finances::create(['user_id' => Auth::user()->id, 'finance' => $valid_data['money'], 'description' => $valid_data['description']]);
        return redirect()->route('show.profile');
    }

    function delete(string $id) {
        $user = Auth::user();
        $finance = $user->finances()->findOrFail($id);
        Finances::destroy($id); 
        return redirect()->route('show.profile');
    }
}
