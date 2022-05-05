<?php

namespace App\Http\Livewire\Admin\Products;

use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\Request;

class Create extends Component
{
	protected $pageInfo = [
		'title' => 'تعریف محصول جدید',
	];
	
	public $discountUnixStartedAt;
	public $discountUnixEndedAt;
	
	public $productAttributeInputs = [];
	public $productAttributeCounter = 1;
	
	
	public $productFaqInputs = [];
	public $productFaqCounter = 1;
	
	public function appendProductAttribute($productAttributeCounter)
	{
		$productAttributeCounter = $productAttributeCounter + 1;
		$this->productAttributeCounter = $productAttributeCounter;
		array_push($this->productAttributeInputs ,$productAttributeCounter);
	}
	public function removeProductAttribute($productAttributeCounter)
	{
		unset($this->productAttributeInputs[$productAttributeCounter]);
	}

	public function appendProductFaq($productFaqCounter)
	{
		$productFaqCounter = $productFaqCounter + 1;
		$this->productFaqCounter = $productFaqCounter;
		array_push($this->productFaqInputs ,$productFaqCounter);
	}
	public function removeProductFaq($productFaqCounter)
	{
		unset($this->productFaqInputs[$productFaqCounter]);
	}
	
	
	public function render()
    {
        return view('livewire.admin.products.create')->with('pageInfo', $this->pageInfo);
    }
    
    public function store()
	{
		$this->validate([
			'discountUnixStartedAt' => 'nullable',
		]);
		//dd($this->discountUnixStartedAt);
		
		dd(date("Y-m-d\TH:i:s\Z",$this->discountUnixStartedAt/1000)
		);
	}
}
