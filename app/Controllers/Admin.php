<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        //return view('admin/head');
        return view('admin/index');
        
    }
    public function signout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
    public function view_category()
    {
        $db = db_connect();
        $query['cat']=$db->table('category')->get()->getResult();
        return view('admin/add_cat',$query);
    }
    public function category_insert()
    {
        $db = db_connect();
        $category_name=$this->request->getpost('category_name');
        $data=array(
            'cat_name'=>$category_name
        );
        $ins=$db->table('category')->insert($data);
        return redirect()->to(base_url('Admin/view_category'));
        
        
    }
    public function view_subcategory()
    {
        $db = db_connect();
        $query['cat']=$db->table('category')->get()->getResult();
        $query['subcat']=$db->table('subcat')->join('category', 'category.cat_id = subcat.cat_id')->get()->getResult();
        return view('admin/add_subcat',$query);
    }
    
    public function subcat_insert()
    {
        $db = db_connect();
        $subcat_name=$this->request->getpost('subcat');
        $cat_id=$this->request->getpost('cat');
        $data=array(
            'sub_name'=>$subcat_name,
            'cat_id'=>$cat_id
            			

        );
        $ins=$db->table('subcat')->insert($data);
        return redirect()->to(base_url('Admin/view_subcategory'));
    }
    public function view_product()
    {
        $db = db_connect();
        $query['cat']=$db->table('category')->get()->getResult();
        $query['subcat']=$db->table('subcat')->join('category', 'category.cat_id = subcat.cat_id')->get()->getResult();
        $query['product']=$db->table('product')->join('subcat', 'subcat.sub_id = product.p_subid')
        ->join('category', 'category.cat_id = subcat.cat_id')->get()->getResult();
        
        return view('admin/add_product',$query);
    }
    public function subt_ajax()
    {
        $db = db_connect();
        $cat_id=$this->request->getpost('cat_id');
        $subcat=$db->table('subcat')->where('cat_id',$cat_id)->get()->getResult();
         
        echo ' <div class="mb-3">
        <label for="pwd" class="form-label">Sub Category type:</label>
        <select name="subcat" id="subcat" required class="form-control" >
        <option value="">-SELECT-</option>';
        foreach($subcat as $sub)
        {
            echo '<option value="'.$sub->sub_id.'">'.$sub->sub_name.'</option>';
        }
        echo '</select>';
        echo '</div>';
        
    }
}


?>