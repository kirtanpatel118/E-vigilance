<?php 
      $session = session();
      $uid = $session->get('uid');

      if($uid==null)
      {
              echo view('sign-up');

      }
      else
      {
        echo view('common/header');
        echo view($main_content);
        echo view('common/footer');

      }


?>