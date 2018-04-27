<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Hero;
use App\Model\HeroSuperpower;
use App\Model\Image;
use App\Model\Superpower;
class HeroRecordController extends Controller
{
    public function listHeroes(){
        return Hero::with(['images','superpowers'=>function($query){
            $query->join('superpower','hero_superpower.superpower_id','superpower.id')
                    ->select('hero_superpower.id','hero_superpower.hero_id','superpower.description','hero_superpower.superpower_id')
                    ->get();
        }])->paginate(5);
    }

    public function submitImage(Request $request){
        $filename = $request->file('image')->getFilename().$_FILES['image']['name'];
        $request->file('image')->storeAs('/public/superheroes/'.$request->hero, $filename);
        Image::create(['path'=>'/storage/superheroes/'.$request->hero.'/'.$filename,'hero_id'=>$request->hero]);
        return Image::where('hero_id',$request->hero)->get();
    }

    public function deleteImage(Request $request){
        $image = $request->input();
        Image::where('id',$image['id'])->delete();
        unlink(public_path($image['path']));
        return Image::where('hero_id',$image['hero_id'])->get();
    }

    public function deleteHeroSuperpower(Request $request){
        $power = $request->input();
        HeroSuperpower::where('id',$power['id'])->delete();
        return HeroSuperpower::where('hero_id',$power['hero_id'])
                ->join('superpower','hero_superpower.superpower_id','superpower.id')
                ->get(['hero_superpower.id','hero_superpower.hero_id','superpower.description','hero_superpower.superpower_id']);
    }

    public function listSuperpowers(Request $request){
        $argument = $request->input('superpowerArgument');
        return Superpower::where('description','like','%'.$argument.'%')->get();
    }

    public function createSuperpower(Request $request){
        $superpower = $request->input('superpower');
        $argument = $request->input('superpowerArgument');
        if(!Superpower::where('description',$superpower['description'])->first()){
            Superpower::create($superpower);
        }
        return Superpower::where('description','like','%'.$argument.'%')->get();
    }

    public function addHeroSuperpower(Request $request){
        $superpowerId = $request->input('superpowerId');
        $heroId = $request->input('heroId');
        if(!HeroSuperpower::where([['hero_id',$heroId],['superpower_id',$superpowerId]])->first()){
            HeroSuperpower::create(['hero_id'=>$heroId,'superpower_id'=>$superpowerId]);
        }
        return HeroSuperpower::where('hero_id',$heroId)
                                ->join('superpower','hero_superpower.superpower_id','superpower.id')
                                ->get(['hero_superpower.id','hero_superpower.hero_id','superpower.description','hero_superpower.superpower_id']);
    }

    public function saveHero(Request $request){
        $hero = $request->input('hero');
        Hero::where('id',$hero['id'])->update([
                                        'nickname'=>$hero['nickname'],
                                        'real_name'=>$hero['real_name'],
                                        'origin_description'=>$hero['origin_description'],
                                        'catch_phrase'=>$hero['catch_phrase']
                                    ]);
    }

    public function createHero(Request $request){
        $hero = $request->input('hero');
        unset($hero['images']);
        unset($hero['superpowers']);
        $hero['created_at'] = date('Y-m-d H:i:s');
        $hero['updated_at'] = date('Y-m-d H:i:s');
        $heroId = Hero::insertGetId($hero);
        return Hero::where('id',$heroId)->with(['images','superpowers'])->first();
    }

    public function deleteHero(Request $request){
        $heroId = $request->input('heroId');
        HeroSuperpower::where('hero_id',$heroId)->delete();
        $images = Image::where('hero_id',$heroId)->get();
        foreach ($images as $key => $value) {
            try {
                unlink(public_path($value['path']));
            } catch (\Exception $e) {

            }
            rmdir(public_path('/storage/superheroes/'.$heroId));
        }
        Image::where('hero_id',$heroId)->delete();
        Hero::where('id',$heroId)->delete();        
    }
}
