<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $teams = Teams::all();

        return view('admin.pages.player.index', compact('teams'));
    }

    public function viewTeamPlayer($slug)
    {
        $team = Teams::where('slug', $slug)->first();
        $teamPlayers = $team->players;

        session(['teams' => $team]);
        
        return view('admin.pages.player.viewTeamPlayer', compact('team', 'teamPlayers'));
    }

    public function playerStat()
    {
        $player = Player::all();

        
        return view('admin.pages.player.playerStat', compact('player'));
    }

    public function viewAllPlayer()
    {
        $player = Player::all();
        
        return view('admin.pages.player.viewAllPlayer', compact('player'));
    }

    public function add()
    {
        $teams = session('teams');
        $team = Teams::all();
        return view('admin.pages.player.create', compact('team', 'teams'));
    }

    public function store(Request $request)
    {
        $teams = session('teams');
        $teamId = $request->input('team_id');
        $clubNumber = $request->input('club_number');

        $existingPlayer = Player::where('team_id', $teamId)->where('club_number', $clubNumber)->first();

        if ($existingPlayer) {
            $teams = session('teams');
            return view('admin.pages.player.create', compact('teams'))->with('error', 'trung so ao');
        }else{
            
            $teams = session('teams');
            $players = $request->all();
            $players['team_id'] = $request->input('team_id');
            $players['slug'] = \Str::slug($request->title);
            $teamSlug = $teams->slug;

            if($request->hasFile('player_photo'))
            {
                $file = $request -> file('player_photo');
                $ext = $file->getClientOriginalExtension();
                if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
                {
                    $teams = Teams::all();
                    return view('admin.pages.player.create')
                        ->with('error', 'only jpg, png or jpeg');
                }
                $photoName = $file->getClientOriginalName();
                $file->move('css/ui/images', $photoName);
            }else
            {
                $photoName = null;
            }

            if($request->hasFile('nationality'))
            {
                $file = $request -> file('nationality');
                $ext = $file->getClientOriginalExtension();
                if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
                {
                    $teams = Teams::all();
                    return view('admin.pages.player.create')
                        ->with('error', 'only jpg, png or jpeg');
                }
                $natName = $file->getClientOriginalName();
                $file->move('css/ui/images', $natName);
            }else
            {
                $natName = null;
            }

            $players['player_photo'] = $photoName;
            $players['nationality'] = $natName;

            Player::create($players);
            return redirect()->route('admin.player.viewTeamPlayer', ['slug' => $teamSlug]);
        }
    }

    public function edit(Product $product)
    {
        $cates = Category::all();
        return view('admin.product.edit', compact('cates', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $books = $request->all();
        $books['slug'] = \Str::slug($request->title);

        if($request->hasFile('photo'))
        {
            $file = $request -> file('photo');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move('images', $imgName);
        }else
        {
            $imgName = $product->image;
        }

        if($request->hasFile('photo1'))
        {
            $file = $request -> file('photo1');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName1 = $file->getClientOriginalName();
            $file->move('images', $imgName1);
        }else
        {
            $imgName1 = $product->image1;
        }

        if($request->hasFile('photo2'))
        {
            $file = $request -> file('photo2');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName2 = $file->getClientOriginalName();
            $file->move('images', $imgName2);
        }else
        {
            $imgName2 = $product->image2;
        }

        $books['image'] = $imgName;
        $books['image1'] = $imgName1;
        $books['image2'] = $imgName2;

        $request->validate([
            'title' => 'required|between: 3, 60',
            'price' => 'required|integer|digits_between: 3, 10|between: 5000, 1000000',
            'description' => 'required|between: 50, 1000',
            'category_id' =>'required'        
        ], 
        [
            'title.required' => 'Title is required.',
            'title.between' => 'Title must be between 3 and 60 characters.',
            'price.required' => 'Price is required.',
            'price.integer' => 'Price must be a number.',
            'price.digits_between' => 'Price must be betwwen 3 and 10 digits.',
            'price.between' => 'Price must be between 5.000 vnđ and 1.000.000 vnđ.',
            'description.required' => 'Description is required.',
            'description.between' => 'Description must be between 50 and 100 characters.',
            'category_id.required' => 'Category is required.',
        ]);
        $product->update($books);
        return redirect()->route('product.index');
    }
}
