<?php

namespace App\Controllers;

class Home extends BaseController
{
    
    public function index()
    {
        return view('pages/index');
    }
    public function register()
    {
        $db = db_connect();
        $name=$this->request->getpost('name');
       $email=$this->request->getpost('email');
       $phone=$this->request->getpost('phone');
       $pwd=$this->request->getpost('password');
      //// $enpass=$this->db->encrypt_password($pwd);
       $dat=array(
           'email'=>$email,
           'pwd'=>$pwd,
           'active'=>1,
           'role'=>1
        );
        //$pQuery = $db->prepare(static function ($db){
            //$ins= $db->table('login')->insert($dat);
            //$id = $db->insertID;
            //create session
            //last id of the user
            //$id=$db->table('login')->max('id');
            //insert_id
            if ($db->table('login')->insert($dat)) {
                $id= $db->insertID();
            } else {
                $id=FALSE;
            }
            //var_dump($id);die();
        //});
        //$ins=$this->db->insert('login',$data);
        if($id!=false){
            $data1=array(
                'name'=>$name,
                'phone'=>$phone,
                "id"=>$id
                //'login_id'=>$this->db->insert_id()
            );
            $ins1= $db->table('reg')->insert($data1);
            return redirect()->to(base_url('/'));
           
        }


    }
    public function login()
    {
        $db = db_connect();
        $session = session();
        $email=$this->request->getpost('email');
        $pwd=$this->request->getpost('password');
        $data=array(
            'email'=>$email,
            'pwd'=>$pwd
        );
        $query=$db->table('login')->join('reg', 'login.id = reg.id')->where($data)->get()->getResult();
        //page refresh chey
        //var_dump($query);die();
        if(count($query)>0)
        {
            if ($query[0]-> role == 0) {
                $data = array(
                    'email' => $query[0]-> email,
                    'pwd' => $query[0]-> pwd,
                    'name' => $query[0]-> name,
                    'role' => $query[0]-> role
                );
               $session->set($data);
               //var_dump($data);
               //echo base_url('/admin');die();
                //return redirect()->to(base_url('Home/'));
                return redirect()->to(base_url('Admin'));
                //return view('admin/index');
            } else if ($query[0]-> role == 1) 
             {
                $data = array(
                    'email' => $query[0]-> email,
                    'pwd' => $query[0]-> pwd,
                    'name' => $query[0]-> name,
                    'role' => $query[0]-> role
                );
                $session->set($data);
                //var_dump($session->email);die();
                return redirect()->to(base_url('/'));
            
            }

        }
        // if(count($query)>0){
        //     $this->session->set('user',$query[0]);
        //     return redirect()->to(base_url('/'));
        // }
        // else{
        //     return redirect()->to(base_url('/'));
        // }
        // var_dump($query[0]->email);
        // die();
        /*if($query){
            return redirect()->to(base_url('/'));
        }*/

        //query to print last 2 higest id in login table
        // $query=$db->query("SELECT * FROM login ORDER BY id DESC LIMIT 2");
        

    }
    public function signout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
    
               
    
    
}
