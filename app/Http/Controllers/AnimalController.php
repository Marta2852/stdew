<?php
namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $coopAnimals = Animal::where('type','coop')->where('user_id', auth()->id())->get();
        $barnAnimals = Animal::where('type','barn')->where('user_id', auth()->id())->get();

        return view('animals.index', compact('coopAnimals','barnAnimals'));
    }

    public function create()
    {
        return view('animals.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type'=>'required|in:coop,barn',
            'species'=>'required|string|max:255',
            'name'=>'required|string|max:255',
        ]);

        $data['user_id'] = auth()->id();

        $species = strtolower($data['species']); 
        $defaultImages = [
            'white chicken' => 'White_Chicken.png',
            'brown chicken' => 'Brown_Chicken.png',
            'blue chicken' => 'Blue_Chicken.png',
            'void chicken' => 'Void_Chicken.png',
            'duck' => 'Duck.png',
            'rabbit' => 'Rabbit.png',
            'dinosaur' => 'Dinosaur.png',
            'white cow' => 'White_Cow.png',
            'brown cow' => 'Brown_Cow.png',
            'goat' => 'Goat.png',
            'sheep' => 'Sheep.png',
            'pig' => 'Pig.png',
            'ostrich' => 'Ostrich.png',
        ];

        $data['image_path'] = $defaultImages[$species] ?? 'default.png';

        Animal::create($data);

        return redirect()->route('animals.index');
    }
}