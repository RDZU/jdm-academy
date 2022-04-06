<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBooksRequest;
use App\Http\Requests\Admin\UpdateBooksRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class BooksController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Book.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('book_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('book_delete')) {
                return abort(401);
            }
            $books = Book::onlyTrashed()->get();
        } else {
            $books = Book::all();
        }

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating new Book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('book_create')) {
            return abort(401);
        }
        return view('admin.books.create');
    }

    /**
     * Store a newly created Book in storage.
     *
     * @param  \App\Http\Requests\StoreBooksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBooksRequest $request)
    {
        if (! Gate::allows('book_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $book = Book::create($request->all());



        return redirect()->route('admin.books.index');
    }


    /**
     * Show the form for editing Book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('book_edit')) {
            return abort(401);
        }
        $book = Book::findOrFail($id);

        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update Book in storage.
     *
     * @param  \App\Http\Requests\UpdateBooksRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBooksRequest $request, $id)
    {
        if (! Gate::allows('book_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $book = Book::findOrFail($id);
        $book->update($request->all());



        return redirect()->route('admin.books.index');
    }


    /**
     * Display Book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('book_view')) {
            return abort(401);
        }
        $book = Book::findOrFail($id);

        return view('admin.books.show', compact('book'));
    }


    /**
     * Remove Book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('book_delete')) {
            return abort(401);
        }
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index');
    }

    /**
     * Delete all selected Book at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('book_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Book::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('book_delete')) {
            return abort(401);
        }
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->restore();

        return redirect()->route('admin.books.index');
    }

    /**
     * Permanently delete Book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('book_delete')) {
            return abort(401);
        }
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->forceDelete();

        return redirect()->route('admin.books.index');
    }
}
