<?php 
      $session = session();
      $uid = $session->get('uid');

      if($uid==null){
              echo view('sign-in');

      }else{
        echo view('Employee/Empheader');
        echo view($main_content);
        echo view('Employee/Empfooter');

      }


?>