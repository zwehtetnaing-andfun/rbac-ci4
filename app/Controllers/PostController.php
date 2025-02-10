<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\HTTP\ResponseInterface;

class PostController extends BaseController
{
    
    public function index()
    {
        $posts = (new PostModel())->findAll();
        return view('posts/index',[
            "posts" => $posts
        ]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        helper(['form','url']);

        $rules = [
            'title'    => 'required',
            'content' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/posts/create')->withInput();
        }

        $post = new PostModel();
        $post->save([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content')
        ]);

        return redirect()->to('/posts');
    }

    public function edit($id)
    {
        $post = (new PostModel())->find($id);
        return view('posts/edit',[
            "post" => $post
        ]);
    }

    public function update($id)
    {
        helper(['form','url']);

        $rules = [
            'title'    => 'required',
            'content' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/posts/create')->withInput();
        }

        $post = new PostModel();
        $post->update($id,[
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content')
        ]);

        return redirect()->to('/posts');
    }

    public function delete($id)
    {
        $post = (new PostModel());
        $post->delete($id);
        return redirect()->to('/posts');
    }

    
}
