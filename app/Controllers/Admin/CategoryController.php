<?php

namespace App\Controllers\Admin;

use App\Models\Admin\CategoryModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class CategoryController extends Controller
{
    public function index()
    {
//		$data['csrf_token'] = csrf_hash();
		return view('admin/categories/categories');
    }

    public function fetch()
	{
		$categories = model('App\Models\Admin\CategoryModel')->findAll();
		return $this->response->setJSON(['categories'=>$categories]);
	}

    public function create()
    {
        $category = model('App\Models\Admin\CategoryModel');
		$name = $this->request->getPost('name');
		if($category->where('name', $name)->first()){
			return $this->response->setJSON([
				'title' => 'Thất Bại',
				'fail' => 'Danh Mục Đã Tồn Tại!'
			]);
		}
		$data = [
			'name' => $name,
			'slug' => url_title($name,'-',true)
		];
		$category->insert($data);
		return $this->response->setJSON([
			'title'=>'Thành Công',
			'success'=>'Đã Thêm Danh Mục!'
		]);
    }

    public function update()
    {
		$category = model('App\Models\Admin\CategoryModel');
		$id = $this->request->getPost('id');
		$name = $this->request->getPost('name');
		$existingCategory = $category->where('id !=', $id)->where('name', $name)->first();
		if($existingCategory){
			return $this->response->setJSON([
				'title' => 'Thất Bại',
				'fail' => 'Trùng Tên Danh Mục Đã Tồn Tại!'
			]);
		}
		$data = [
			'name' => $name,
			'slug' => url_title($name, '-', true),
		];
		$category->update($id, $data);
		return $this->response->setJSON([
			'title'=>'Thành Công',
			'success'=>'Sửa Tên Danh Mục Thành Công!'
		]);
    }

    public function delete()
    {
		$category = model('App\Models\Admin\CategoryModel');
		if($category->delete($this->request->getPost('id'))){
			return $this->response->setJSON([
				'title' => 'Thành Công',
				'success' => 'Đã Xoá Danh Mục!'
			]);
		}
		return $this->response->setJSON([
			'title' => 'Thất Bại',
			'fail' => 'Không Thể Xoá Danh Mục!'
		]);
    }
}
