<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //Request es para poder obtener los datos que vienen en la peticion
use App\Models\Book; //Book es el modelo que representa a la tabla books de la base de datos (ver app/Models/Book.php)

class ApiController extends Controller
{
    public function index() { //index es el metodo que se ejecuta cuando se llama a la ruta /api/books (ver routes/api.php) 
        $libros = Book::with('author')->get(); //with('author') es para que en la respuesta aparezca el autor del libro (ver app/Models/Book.php) 
        return response()->json($libros); //response()->json es para que la respuesta sea en formato json 
    }
    public function store (Request $request) { //store es el metodo que se ejecuta cuando se llama a la ruta /api/books (ver routes/api.php) 

        try{
            $request->validate([ //validate es para validar los datos que se reciben en la peticion 
                'title'=>'required|string', //required es para que el campo sea obligatorio y string es para que el campo sea de tipo string 
                'author_id' => 'required|integer', //integer es para que el campo sea de tipo integer
                'published_year' => 'required|integer']); //integer es para que el campo sea de tipo integer

            $book = new Book(); //creamos un nuevo libro 
            $book->title = $request->input('title'); //input('title') es para obtener el valor del campo title que viene en la peticion
            $book->author_id = $request->input('author_id'); //input('author_id') es para obtener el valor del campo author_id que viene en la peticion
            $book->published_year = $request->input('published_year'); //input('published_year') es para obtener el valor del campo published_year que viene en la peticion
            $book->save(); //save es para guardar el libro en la base de datos

            return response()->json($book,201); //response()->json es para que la respuesta sea en formato json y 201 es el codigo de respuesta http que indica que se ha creado el recurso

        } catch (\Exception $e){ //si hay algun error en el try se ejecuta el catch
            return response()->json(['error' => 'Error'], 500); //500 es el codigo de respuesta http que indica que ha habido un error en el servidor 
        }
    }

    public function destroy ($id) { //destroy es el metodo que se ejecuta cuando se llama a la ruta /api/books/{id} (ver routes/api.php)
        $book = Book::find($id); //find($id) es para buscar el libro con el id que viene en la peticion 

        if(!$book){ //si no se encuentra el libro con el id que viene en la peticion 
            return response()->json(['message' => 'El libro no está'], 404); //404 es el codigo de respuesta http que indica que no se ha encontrado el recurso
        }
    }
}

