<?php

namespace App\View\Components\Product;

use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public $id, $product_name, $product_code, $selling_price, $cost_price, $quantity, $is_active, $category_id, $category;
    public function __construct($id=null)

    {
        $this->category = Category::all();
        if($id){
            $product = Product::find($id);
            $this->id = $product->id;
            $this->product_name = $product->product_name;
            $this->product_code = $product->product_code;
            $this->selling_price = $product->selling_price;
            $this->cost_price = $product->cost_price;
            $this->quantity = $product->quantity;
            $this->is_active = $product->is_active;
            $this->category_id = $product->category_id;
        }

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.form-product');
    }
}
