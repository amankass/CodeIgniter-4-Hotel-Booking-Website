<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\LikeModel;
use App\Models\CommentModel;

class BlogController extends BaseController
{
        protected $blogModel;
        protected $likeModel;
        protected $commentModel;

        public function __construct()
    {
        $this->blogModel = new BlogModel();
        $this->likeModel = new LikeModel();
        $this->commentModel = new CommentModel();
        $this->blogModel = new BlogModel();
        helper(['url', 'form']);
    }

        public function index()
    {
        $data['blogs'] = $this->blogModel->findAll();
        return view('blog/index', $data);
    }
        public function create()
    {
        if (!session()->get('logged_in')) {
        return redirect()->to('/auth')->with('fail', 'You must log in first.'); }
        return view('blog/create'); 
    }

        public function store()
    {
            $validated = $this->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'max_size[image,18432]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/gif,image/webp]', ]);
            if (!$validated) {
                return view('blog/create', ['validation' => $this->validator]); }
            $image = $this->request->getFile('image');
            $imageName = $image->getRandomName();
            $image->move('uploads', $imageName);
            $content = htmlspecialchars($this->request->getPost('content'), ENT_QUOTES, 'UTF-8');
            $this->blogModel->save([
            'user_id' => session()->get('user_id'),
            'title' => $this->request->getPost('title'),
            'content' => $content,
            'image' => $imageName,
            'created_at' => date('Y-m-d H:i:s'), ]);
            return redirect()->to('/blog')->with('success', 'Blog post created successfully.');
    }

        public function edit($id)
    {
        $data['blog'] = $this->blogModel->find($id);
        return view('blog/edit', $data); 
    }

        public function update($id)
    {
        $validated = $this->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'max_size[image,18432]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/gif,image/webp]', ]);
        if (!$validated) {
            return view('blog/edit', ['validation' => $this->validator, 
            'blog' => $this->blogModel->find($id)]);
        }
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move('uploads', $imageName);
        } else {
            $imageName = 
            $this->request->getPost('current_image'); }
            $this->blogModel->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'image' => $imageName,
            'updated_at' => date('Y-m-d H:i:s'), ]);
            return redirect()->to('/blog')->with('success', 
            'Blog post updated successfully.');
    }

        public function view($id)
    {
        $blog = $this->blogModel->find($id);
        if (!$blog) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Blog post not found'); }
        $likes = $this->likeModel->where('blog_id', $id)->findAll(); 
        $comments = $this->commentModel->where('blog_id', $id)->findAll(); 
        $relatedBlogs = $this->blogModel->where('id !=', $id)->findAll(3);
        return view('blog/view', [
            'blog' => $blog,
            'relatedBlogs' => $relatedBlogs,
            'likes' => $likes,
            'comments' => $comments,
        ]);
    }

        public function delete($id)
    {
        $blog = $this->blogModel->find($id);
        if (!$blog) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Blog post not found'); }
        if ($blog['user_id'] != session()->get('user_id')) {
            return redirect()->to('/blog')->with('error', 
            'You are not authorized to delete this blog post.'); }
            $this->blogModel->delete($id);
            if (!empty($blog['image'])) {
            unlink('uploads/' . $blog['image']); }
            return redirect()->to('/blog')->with('success', 
            'Blog post deleted successfully.');
    }

        public function likePost($id)
    {
        $userId = session()->get('user_id');
        $existingLike = $this->likeModel->where(['user_id' => $userId, 'blog_id' => $id])->first();
        if ($existingLike) {
            $this->likeModel->delete($existingLike['id']);
            } else {
            $this->likeModel->save(['user_id' => $userId, 'blog_id' => $id, 'created_at' => date('Y-m-d H:i:s')]); }
            return redirect()->to('/blog/view/' . $id);
    }

        public function commentPost($id){
        $userId = session()->get('user_id'); 
        $comment = $this->request->getPost('comment'); 
        $this->commentModel->save([
            'user_id' => $userId,
            'blog_id' => $id,
            'content' => $comment,
            'created_at' => date('Y-m-d H:i:s')
        ]); return redirect()->to('/blog/view/' . $id); 
    }
}