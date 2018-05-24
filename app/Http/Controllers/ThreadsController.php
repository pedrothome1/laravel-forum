<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Category;
use App\Filters\ThreadFilters;

class ThreadsController extends Controller
{
    /**
     * Display a listing of the threads.
     *
     * @param  ThreadFilters  $filters
     * @param  Category|null  $category
     * @return \Illuminate\Http\Response
     */
    public function index(ThreadFilters $filters, Category $category = null)
    {
        $threads = $this->getThreads($filters, $category);

        return view('threads.index', compact('threads'));
    }

    /**
     * Fetch the threads from the database.
     *
     * @param  ThreadFilters  $filters
     * @param  Category|null  $category
     * @return mixed
     */
    protected function getThreads(ThreadFilters $filters, Category $category = null)
    {
        $threads = Thread::filter($filters);

        if (! is_null($category)) {
            $threads->where('category_id', $category->id);
        }

        return $threads->paginate(10);
    }

    /**
     * Show the form for creating a new thread.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created thread in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|numeric|min:1|exists:categories,id'
        ]);

        $thread = auth()->user()->publish(
            new Thread(request(['category_id', 'title', 'body']))
        );

        $this->flash('Tópico criado com sucesso.');

        return redirect($thread->path());
    }

    /**
     * Display the specified thread.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified thread.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified thread in storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Thread $thread)
    {
        //
    }

    /**
     * Remove the specified thread from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
