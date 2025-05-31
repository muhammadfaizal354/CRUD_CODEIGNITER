<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $productModel = $this->productModel;

        if ($keyword) {
            $productModel = $productModel->like('name', $keyword);
        }

        $data = [
            'products' => $productModel->paginate(5),
            'pager'    => $productModel->pager,
            'keyword'  => $keyword
        ];

        return view('products/index', $data);
    }



    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
    $validation = \Config\Services::validation();

    $rules = [
        'name'  => 'required|min_length[3]',
        'price' => 'required|numeric'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()
                         ->withInput()
                         ->with('errors', $validation->getErrors());
    }

    $this->productModel->insert([
        'name'  => $this->request->getPost('name'),
        'price' => $this->request->getPost('price'),
    ]);

    return redirect()->to('/products')->with('success', 'Produk berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $data['product'] = $this->productModel->find($id);
        return view('products/edit', $data);
    }

    public function update($id)
    {
        $this->productModel->update($id, [
            'name'  => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
        ]);
        return redirect()->to('/products');
    }

    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/products');
    }
}
