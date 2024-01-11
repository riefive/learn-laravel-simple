<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() 
    {
        $books = Books::all();
        return response()->json($books);
    }

    public function create(Request $request)
    {
        $books = new Books();
        $books->name = $request->name;
        $books->author = $request->author;
        $books->publish_date = $request->publish_date;
        $books->save();
        return response()->json([
            'message' => 'Book Added.'
        ], 201);
    }

    public function read($id)
    {
        $books = Books::find($id);
        if (empty($books))
        {
            return response()->json([
                'message' => 'Book Not Found.'
            ], 404);
        }
        return response()->json($books);
    }

    public function update(Request $request, $id)
    {
        $booksCheck = Books::where('id', $id);
        if (!$booksCheck->exists())
        {
            return response()->json([
                'message' => 'Book Not Found.'
            ], 404);
        }
        $books = Books::find($id);
        $books->name = is_null($request->name) ? $books->name : $request->name;
        $books->author = is_null($request->author) ? $books->author : $request->author;
        $books->publish_date = is_null($request->publish_date) ? $books->publish_date : $request->publish_date;
        $books->save();
        return response()->json([
            'message' => 'Book Updated.'
        ], 200);
    }

    public function delete($id)
    {
        $booksCheck = Books::where('id', $id);
        if (!$booksCheck->exists())
        {
            return response()->json([
                'message' => 'Book Not Found.'
            ], 404);
        }
        $books = Books::find($id);
        $books->delete();
        return response()->json([
            'message' => 'Book Deleted.'
        ], 200);
    }
}
