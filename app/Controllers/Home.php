<?php

namespace App\Controllers;

use App\Models\Dmodel;
use App\Models\Cmodel;
use App\Models\Omodel;

class Home extends BaseController
{
    public function index()
    {
        $user = new Dmodel();
        return view('sign-in');
    }

    public function signadmin()
    {
        $user = new Dmodel();
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

        $uid = $data['uid'];

        if($data == NULL){
            
            $response = ['success'=> false, 'msg'=>'No data found'];
                return $this->response->setJSON($response);
        }
                
        $rol = 0;
        if(!empty($data)){
            
            if($data['email'] == $username && $data['pwd'] == $pwd){
                    $role = $data['user_level'];
                    if ($role== $rol) {
        
                        $session->set('uid',$uid);

                        $response = ['success'=> true, 'msg'=>'You have successfully logged in to system','role'=>$role ];
                        return $this->response->setJSON($response);

                    }
                    else{
                            $status = $data['status'];
                            if($status == 0) 
                            {
                                $session->set('uid',$uid);
                                $response = ['success'=> true, 'msg'=>'You have successfully logged in to system','role'=>$role];
                                return $this->response->setJSON($response);

                            }
                            else{
                                $response = ['success'=> false, 'msg'=>'Your account status is inactive'];
                                return $this->response->setJSON($response);
                            }
                        }
            }
            else{
                $response = ['success'=> false, 'msg'=>'Something went wrong email or password.'];
                                return $this->response->setJSON($response);
            }
        }
        else{
                $response = ['success'=> false, 'msg'=>'No data found'];
                                return $this->response->setJSON($response);
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

        $data['sql'] = $assdata->select('*')
                        ->join('user_master', 'user_master.uid = officer_detail','inner')
                        ->join('complaint_detail', 'complaint_detail.complaint_id = officer_detail.uid','inner')
                        ->where('officer_detail',$uid)
                        ->findAll();
        
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
        $uid = $session->get('uid');
        $userdata = new Dmodel();
        $data['userdata'] = $userdata->where('uid',$uid)->first();

        $userdata = new Dmodel();
        $sta=$userdata->where('uid',$uid)->first();
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
        $session=session();
        $uid=$session->get('uid');
        $userdata=new Dmodel();
        $data['userdata']=$userdata->where('uid',$uid)->first();
        $userdata=new Dmodel();
        $data=$userdata->where('uid',$uid)->delete($uid);
        $response=['status'=>"Employee Deleted",'status_text'=>'Deleted','status_icon'=>'success'];
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
        $complaint_id = $this->request->getPost('complaint_id');
        $userdatanew=new Cmodel();
        $userd=$userdatanew->where('complaint_id',$complaint_id)->first();
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
        $data['sql'] = $assdata->select('*')
                        ->join('user_master','user_master.uid = officer_detail','inner')
                        ->join('complaint_detail','complaint_detail.complaint_id = officer_detail.complaint_id','inner')
                        ->findAll();
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
        $uid=$this->request->getPost('uid');
        $data=[
            'email'=>$this->request->getPost('username'),
            'pwd'=>$this->request->getPost('npassword'),
            'pwd'=>$this->request->getPost('cpassword'),
        ];
        $udata=new Dmodel();
        $obj=$udata->set($data)->where('uid',$uid)->update();
        if($obj != false)
        {
            $response=['success'=> true,'msg'=>'Password Changed Successfully'];
            return $this->response->setJSON($response);
        }
        else
        {
            $response=['success'=> false,'msg'=>'Something went to wrong'];
            return $this->response->setJSON($response);
        }
        return view('sign-in');
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