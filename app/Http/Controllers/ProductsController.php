<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    //restringe paginas si el usuario no esta logeado.
    public function __construct()
    {
    	//todas las paginas de este controlador estas restringidas
       // $this->middleware('auth');
        
        //solo la pagina que esta entre comilas esta restringida.
        //$this->middleware('auth')->only('index');
        
        //todas las paginas excepto la que estan entre commillas  esta restringida.
        //$this->middleware('auth')->except(['index','create']);

    }


    public function index(){
    	//obtenemos todos los datos de la tabla producto
    	//$products = DB::table('products')->get();
    	$product = Product::all();
    	

    	return view('products.index')->with([
    		'items' => $product,
    	]);
    }
    public function create(){
    	return view('products.create');
    	
    }
	public function store(){
		/*$product =  Product::create([
			'title' => request()->title,
			'description' => request()->description,
			'pricee' =>request()->price,
			'stock' =>request()->stock,
			'status' =>request()->status,

		]); */
		 $reglas =[
		 	'title' => ['required','max:255'],
		 	'description' => ['required','max:1000'],
		 	'pricee' => ['required','min:1'],
		 	'stock' => ['required','min:0'],
		 	'status' => ['required','in:disponible,nodisponible'],

		 ];
		 request()->validate($reglas);


		//si el estado es disponible y el stock es igual a 0
		if(request()->status == 'disponible' && request()->stock == 0){
			return redirect()
					->back()
					->withInput(request()->all())
					->withErrors('el estado no puede estar disponible si el stock es 0');
		}
		//creando el producto con todas los valores por request
		$product = Product::create(request()->all());
		//si el producto se crea, entonces se enviara un mensaje de exito.
		//session()->flash('exito', "el producto con id {$product->id} se guardo weta");

		//return redirect()->back();
		//return redirect()->action('');
		return redirect()
				->route('products.index')
				->with(['exito' => "el producto con id {$product->id} se guardo weta"]);
	}



	public function show($product){
		//muetra el id que ponemos en url '$product'
		// opcion 1   $product = DB::table('products')->where('id', $product)->first();
		// opcion 2   $product = DB::table('products')->find($product);
		$product = Product::findOrFail($product);

		// le estamos pasando todos los valores en la variable "items"
		return view('products.show')->with([
			'items'=> $product,
		]);
	}

	public function edit($product){
		$product = Product::findOrFail($product);
		return view('products.edit')->with([
			'items'=> $product,
		]);
	}

	public function update($product){

		$reglas =[
		 	'title' => ['required','max:255'],
		 	'description' => ['required','max:1000'],
		 	'pricee' => ['required','min:1'],
		 	'stock' => ['required','min:0'],
		 	'status' => ['required','in:disponible,nodisponible'],

		 ];
		 request()->validate($reglas);


		$product = Product::findOrFail($product);
		$product->update(request()->all());
		//return redirect()->back();
		//return redirect()->action('');
		return redirect()
				->route('products.index')
				->with(['exito' => "el producto con id {$product->id} se ha actualizado weta"]);


	}

	public function delete($product){
		$product = Product::findOrFail($product);
		$product->delete();
		//return redirect()->back();
		//return redirect()->action('');
		return redirect()
				->route('products.index')
				->with(['exito' => "el producto con id {$product->id} se elimino weta"]);
	}
	
}
