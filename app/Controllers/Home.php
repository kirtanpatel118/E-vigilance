<?php

namespace App\Controllers;

use App\Models\Dmodel;
use App\Models\Cmodel;
use App\Models\Omodel;

class Home extends BaseController
{
    public function index()
    {
        return view('sign-in');
    }

    public function signadmin()
    {
        return view('signadmin');
    }

    public function signup()
    {
        return view('sign-up');
    }

    public function checkuser()
    {

        $inputs = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!$inputs) {
                
                $response = ['success'=> false, 'msg'=>'Enter email and password'];
                return $this->response->setJSON($response);
        }
            
        $username = $this->request->getPost('username');
        $pwd =md5($this->request->getPost('password'));

        $modeldata = new Dmodel();
        
        $data = $modeldata->where('email',$username)->first();

        $session = session();

        if($data == NULL){
            $response = ['success'=> false, 'msg'=>'No data found'];
            return $this->response->setJSON($response);
        }

        $uid = $data['uid'];

        if($data['pwd'] != $pwd){
            $response = ['success'=> false, 'msg'=>'Something went wrong email or password.'];
            return $this->response->setJSON($response);
        }

        $role = $data['user_level'];

        if($role == 0){
            // Admin: no status check needed
            $session->set('uid', $uid);
            $response = ['success'=> true, 'msg'=>'You have successfully logged in to system', 'role'=> $role];
            return $this->response->setJSON($response);
        } else {
            // Employee: check active status
            if($data['status'] == 0){
                $session->set('uid', $uid);
                $response = ['success'=> true, 'msg'=>'You have successfully logged in to system', 'role'=> $role];
                return $this->response->setJSON($response);
            } else {
                $response = ['success'=> false, 'msg'=>'Your account status is inactive'];
                return $this->response->setJSON($response);
            }
        }

        
    }
    
    public function viewdashboard()
    {

            $data['title']="Dashboard";
            $data['main_content']="viewdashboard";
            $session = session();
            $uid = $session->get('uid');
            $userdata = new Dmodel();
    
            $data['userdata'] = $userdata->where('uid',$uid)->first();
            
            return view('common/template',$data);


    }

    public function view_admin_profile()
    {
        $session = session();
        $uid = $session->get('uid');
        $userdata = new Dmodel();

        $data['userdata'] = $userdata->where('uid',$uid)->first();
        $data['title']="My Profile";
        $data['main_content']="view_admin_profile";
        return view('common/template',$data);
        
    }
    
    public function addofficer()
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata = new Omodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $data['title']="Add Officer";
        $data['main_content']='addofficer';
        return view('common/template',$data);
    }
    
    public function store_officer()
    {
        $session = session();
        $uid = $session->get('uid');
        $userdata = new Omodel();

        $data['userdata'] = $userdata->where('uid',$uid)->first();

        $inputs = $this->validate([
            'fullname'=> 'required',
            'email'=> 'required',        
            'joiningdate'=> 'required',
            'branch'=> 'required',
            'position'=> 'required',

        ]);
        if (!$inputs) 
        {
                
                $response = ['success'=> false, 'msg'=>'Fill details properly'];
                return $this->response->setJSON($response);
        }

        $data = [
            
            'fullname'=>  $this->request->getPost('fullname'),
            'email'=> $this->request->getPost('email'),
            'branch'=> $this->request->getPost('branch'),
            'position'=> $this->request->getPost('position'),
            'joining_date'=> $this->request->getPost('joiningdate'),

        ];

        $udata = new Omodel();

        $obj = $udata->insert($data);

        if($obj != false)
        {
            $response = ['success'=> true, 'msg'=>'Employee Added Successfully'];
            return $this->response->setJSON($response);
        }
        else{
            $response = ['success'=> false, 'msg'=>'Something went wrong.'];
            return $this->response->setJSON($response);
        }


    }

    public function store_employee()
    {
        $inputs = $this->validate([
            'fullname'=> 'required',
            'email'=> 'required',
            'password'=> 'required',          
            'joiningdate'=> 'required',
            'branch'=> 'required',
            'position'=> 'required',

        ]);
        if (!$inputs) 
        {
                
                $response = ['success'=> false, 'msg'=>'Fill details properly'];
                return $this->response->setJSON($response);
        }

        $data = [
            
            'fullname'=>  $this->request->getPost('fullname'),
            'email'=> $this->request->getPost('email'),
            'pwd'=> md5($this->request->getPost('password')),
            'user_level'=> 1,
            'branch'=> $this->request->getPost('branch'),
            'position'=> $this->request->getPost('position'),
            'photo'=> "150-26.jpg",
            'joining_date'=> $this->request->getPost('joiningdate'),

        ];

        $udata = new Dmodel();

        $obj = $udata->insert($data);

        if($obj != false)
        {
            $response = ['success'=> true, 'msg'=>'User Added Successfully'];
            return $this->response->setJSON($response);
        }
        else{
            $response = ['success'=> false, 'msg'=>'Something went wrong.'];
            return $this->response->setJSON($response);
        }


    }

    public function viewofficer()
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata = new Omodel();

        $data['userdata']=$userdata->where('uid',$uid)->first();
        $data['title']="View Officer";
        $data['main_content']="viewofficer";
        $userdata=new Omodel();
        $data['user']=$userdata->findAll();
        return view('common/template',$data);
    }
     
    public function getemp()
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata = new Omodel();

        $data['userdata']=$userdata->where('uid',$uid)->first();
        $data['title']="Get Employee";
        $data['main_content']="getemp";
        $userdata=new Omodel();
        $data['user']=$userdata->findAll();
        return view('common/template',$data);
    }

    public function getallapi()
    {
       $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL            => "http://localhost/Project/chs/public/getallempdata",
            CURLOPT_POST           => false,
            CURLOPT_RETURNTRANSFER => true,
         );
        curl_setopt_array($ch, $curlConfig);
        $result = curl_exec($ch);
        curl_close($ch);

        $session=session();
        $uid=$session->get('uid');
        $userdata = new Omodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $data['title']="Get Employee";
        $data['main_content']="getemp";
        $userdata=new Omodel();
        $data['user']=$userdata->findAll();
        return view('common/template',$data);
    }

    public function getallempdata()
    {
        $model=new Omodel();
        $data['userdata']=$model->orderBy('uid','DESC')->findAll();
        //print_r($data);
        return $this->response->setJSON($data);
    }

    public function view_profile()
    {
        $session = session();
        $uid = $session->get('uid');
        $userdata = new Dmodel();

        $data['userdata'] = $userdata->where('uid',$uid)->first();
        $data['title']="My Profile";
        $data['main_content']="view_profile";
        return view('Employee/Emptemplate',$data);
        
    }

    public function updateProfile()
    {
        $session = session();
        $uid = $session->get('uid');
        $userdata = new Dmodel();

        $udata= $userdata->where('uid',$uid)->first();
        $data['userdata']=$udata;
        $data['title']="Update Admin Profile";
        $data['main_content']="update_profile";
        if($udata['user_level']==0)
        {
            return view('common/template',$data);
        }
        else
        {
            $data['title']="Update User Profile";
            return view('Employee/Emptemplate',$data);
        }
    }

    public function update_profile_store()
    {
        $inputs = $this->validate([
            'fullname'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'joiningdate'=> 'required',
            'branch'=> 'required',
            'position'=> 'required',

        ]);
        if (!$inputs) 
        {
                
                $response = ['success'=> false, 'msg'=>'Fill details properly'];
                return $this->response->setJSON($response);
        }
        
        $uid = $this->request->getPost('uid');
        $userdatanew=new Dmodel();
        $userd=$userdatanew->where('uid',$uid)->first();
        if(empty($_FILES['emppic']['name'][0]))
        {
            $pic=$userd['photo'];
        }
        else
        {
            $file=$this->request->getFile('emppic');
            $profile_image=$file->getName();
            $temp=explode(".",$profile_image);
            $newfilename=round(microtime(true)) . '.' . end($temp);
            $file->move("uploads/",$newfilename);
            $pic=$newfilename;
        }
        
        $data = [
            'fullname'=>  $this->request->getPost('fullname'),
            'email'=> $this->request->getPost('email'),            
            'pwd'=> md5($this->request->getPost('password')),
            'joining_date'=> $this->request->getPost('joiningdate'),
            'branch'=> $this->request->getPost('branch'),
            'position'=> $this->request->getPost('position'),
            'photo'=> $pic,
        ];

        $udata = new Dmodel();

        $obj = $udata->set($data)->where('uid',$uid)->update();

        if($obj != false)
        {
            $obj=$udata->where('uid',$uid)->first();
            $ulevel=$obj['user_level'];
            $response = ['success'=> true, 'msg'=>'Profile Update Successfully','ulevel'=>$ulevel];
            return $this->response->setJSON($response);
        }
        else{
            $response = ['success'=> false, 'msg'=>'Something went wrong.'];
            return $this->response->setJSON($response);
        }

    }

    public function viewofficerdashboard()
    {
        $data['title']="Dashboard";
        $data['main_content']="empdash";
        $session = session();

        $uid = $session->get('uid');

        $userdata = new Dmodel();

        $data['userdata'] = $userdata->where('uid',$uid)->first();
        
        $hardwaredata = new Cmodel();
        $data['hwddata']=$hardwaredata->findAll();

        $data['empdata']=$userdata->findAll();

        $assdata = new Omodel();
        $data['assdata'] = $assdata->findAll();

        $data['sql'] = [];
        
        return view('Employee/Emptemplate',$data);

    }

    public function viewempdashboard()
    {
        $data['title']="Dashboard";
        $data['main_content']="empdash";
        $session = session();
        return view('Employee/Emptemplate',$data);

    }

    public function update_emp($id)
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata=new Dmodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $uid=$id;
        $userdata = new Dmodel();
        $data['empdata']=$userdata->where('uid',$uid)->first();
        $data['title']="Update Employee";
        $data['main_content']="update_employee";
        return view('common/template',$data);
    }

    public function update_employee()
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata=new Dmodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $inputs=$this->validate([
            'fullname'=>'required',
            'email'=>'required',           
            'branch'=>'required',
            'position'=>'required',
        ]);
        if(!$inputs)
        {
            $response=['success'=>false,'msg'=>'Please Fill all the details properly.'];
            return $this->response->setJSON($response);
        }

        $uid=$this->request->getPost('uid');

        $data=[
            'fullname'=>$this->request->getPost('fullname'),
            'email'=>$this->request->getPost('email'),           
            'branch'=>$this->request->getPost('branch'),
            'position'=>$this->request->getPost('position'),
        ];
        $udata=new Dmodel();
        $obj=$udata->set($data)->where('uid',$uid)->update();
        if($obj != false)
        {
            $response=['success'=> true,'msg'=>'Employee Updated Successfully'];
            return $this->response->setJSON($response);
        }
        else
        {
            $response=['success'=> false,'msg'=>'Something went to wrong'];
            return $this->response->setJSON($response);
        }
    }
   
    public function complaint()
    {
        $session = session();
        $uid = $session->get('uid');
        $userdata = new Dmodel();

        $data['userdata'] = $userdata->where('uid',$uid)->first();
        $data['title']="Create complaint";
        $data['main_content']="complaint";
        return view('Employee/Emptemplate',$data);
        
    }
    
    public function stspdate()
    {
        $session = session();
        $adminUid = $session->get('uid');
        $targetUid = $this->request->getPost('bid');

        if(empty($targetUid)){
            $response = ['status'=> "Invalid request.", 'success'=>false];
            return $this->response->setJSON($response);
        }

        $userdata = new Dmodel();
        $sta=$userdata->where('uid',$targetUid)->first();
        if(empty($sta)){
            $response = ['status'=> "Employee not found.", 'success'=>false];
            return $this->response->setJSON($response);
        }

        if($sta['status']== 0)
        {
            $data = [
                'status' => 1
            ];
        }
        else
        {
            $data = [
                'status' => 0
            ];
        }
        $uid = $targetUid;
        $que = $userdata->set($data)->where('uid',$uid)->update();

        if($que==false)
        {
            $response = ['status'=> "Status Not changed .", 'success'=>false,'status_text'=>'status not.','status_icon'=>'success'];
            return $this->response->setJSON($response);
        }
        else
        {   
            $response = ['status'=> "Status change successfully.",'success'=>true ,'status_text'=>'status change successfully.','status_icon'=>'success'];
            return $this->response->setJSON($response);
        }

    }

    public function delete_employee()
    {
        $targetUid = $this->request->getPost('bid');
        if(empty($targetUid)){
            $response=['status'=>"Invalid request.",'status_text'=>'Error','status_icon'=>'error','success'=>false];
            return $this->response->setJSON($response);
        }
        $userdata=new Dmodel();
        $userdata->where('uid',$targetUid)->delete();
        $response=['status'=>"Employee Deleted",'status_text'=>'Deleted','status_icon'=>'success','success'=>true];
        return $this->response->setJSON($response);
    }

    public function store_complaint()
    {
        $inputs=$this->validate([
            'fullname'=>'required',
            'branch'=>'required',
            'complaint'=>'required',
        ]);
        if(!$inputs)
        {
            $response=['success'=>false, 'msg'=>'Fill all details properly'];
            return $this->response->setJSON($response);
        }
        $pic = 'default.jpg';
        if(!empty($_FILES['emppic']['name'][0]))
        {
            $file=$this->request->getFile('emppic');
            $profile_image=$file->getName();
            $temp=explode(".",$profile_image);
            $newfilename=round(microtime(true)) . '.' . end($temp);
            $file->move("uploads/",$newfilename);
            $pic=$newfilename;
        }
        $data=[
            'complaint'=>$this->request->getPost('complaint'),
            'username'=>$this->request->getPost('fullname'),
            'city'=>$this->request->getPost('branch'),
            'photo'=> $pic,
        ];

        $hwddata=new Cmodel();
        $indata =$hwddata->insert($data);
        if($indata==true)
        {
            $response=['success'=>true, 'msg'=>'Complaint Added Successfully.'];
            return $this->response->setJSON($response);
        }
        else
        {
            $response=['success'=>false, 'msg'=>'Something went wrong.'];
            return $this->response->setJSON($response);
        }
    }

    public function viewcomplaint()
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata=new Dmodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $data['title']='View Complaint';
        $data['main_content']='viewcomplaint';
        $hardwaredata=new Cmodel();
        $data['hwddata']=$hardwaredata->findAll();
        return view('common/template',$data);

    }

   
    public function Feedback()
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata=new Dmodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $data['title']="View Feedback";
        $data["main_content"]="Feedback";
        $hardwaredata=new Cmodel();
        $data['hwddata']=$hardwaredata->findAll();
        $data['empdata']=$userdata->findAll();
        $assdata=new Omodel();
        $data['assdata']=$assdata->findAll();
        $data['sql'] = [];
        return view('common/template',$data);

    }

    public function complaint_report()
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata=new Dmodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $data['title']="Generate Report";
        $data['main_content']="complaint_report";
        $hardwaredata=new Cmodel();
        $data['hwddata']=$hardwaredata->findAll();
        return view('common/template',$data);
    }

    public function officer_report()
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata=new Omodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $data['title']="Generate Report";
        $data['main_content']="officer_report";
        $hardwaredata=new Omodel();
        $data['sql']=$hardwaredata->findAll();
        return view('common/template',$data);
    }

    public function Employees_report()
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata=new Dmodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $data['title']="Employee Report";
        $data['main_content']="Employees_report";
        $data['empdata']=$userdata->where('user_level',1)->findAll();
        return view('common/template',$data);
    }

    public function frtpwd()
    {
        return view('forgot_pwd');
    }

    public function forgot_pwd()
    {
        $session=session();
        $uid=$session->get('uid');
        $userdata=new Dmodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $inputs=$this->validate([
            'username'=>'required',
            'npassword'=>'required',
            'cpassword'=>'required',
        ]);
        if(!$inputs)
        {
            $response=['success'=>false, 'msg'=>'Fill all details properly'];
            return $this->response->setJSON($response);
        }
        $npassword = $this->request->getPost('npassword');
        $cpassword = $this->request->getPost('cpassword');
        if($npassword !== $cpassword){
            $response=['success'=> false,'msg'=>'Passwords do not match'];
            return $this->response->setJSON($response);
        }
        $email = $this->request->getPost('username');
        $udata=new Dmodel();
        $existing = $udata->where('email',$email)->first();
        if(empty($existing)){
            $response=['success'=> false,'msg'=>'Email not found'];
            return $this->response->setJSON($response);
        }
        $data=[
            'pwd'=> md5($npassword),
        ];
        $obj=$udata->set($data)->where('email',$email)->update();
        if($obj != false)
        {
            $response=['success'=> true,'msg'=>'Password Changed Successfully'];
            return $this->response->setJSON($response);
        }
        else
        {
            $response=['success'=> false,'msg'=>'Something went wrong'];
            return $this->response->setJSON($response);
        }
    }

    public function signOut()
    {
        $session = session();
        $session->destroy();
        return view('sign-in');

    }
    public function AdminsignOut()
    {
        $session = session();
        $session->destroy();
        return view('signadmin');

    }
}
?>