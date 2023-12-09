<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CountryCity extends Component
{
  public $selectedCountry= null;
  public $selectedCity= null;
  public $cities = null;
  public $counter=0 ;
  public function increase(){
    $this->counter++;
  }
  public function decrease(){
    $this->counter-- ;
  }
  public function render()
    {
        return view('livewire.country-city',[
          'countries'=>DB::table('location')->get(),
        ]);
    }

  public function updatedSelectedCountry($country_id){
    $this->cities=DB::table('city')->where('country','=',$country_id)->get();

  }



}
