<?php

$config = array(
                 'process/login' => array(
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'trim|required'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'trim|required'
                                         )
                                    ),

                 'process/registration' => array(
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'trim|required|valid_email'
                                         ),
                                    array(
                                            'field' => 'first_name',
                                            'label' => 'First Name',
                                            'rules' => 'trim|required|xss_clean'
                                         ),
                                    array(
                                            'field' => 'last_name',
                                            'label' => 'Last Name',
                                            'rules' => 'trim|required|xss_clean'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'trim|required|min_length[8]|matches[passconf]|md5'
                                         ),
                                    array(
                                            'field' => 'passconf',
                                            'label' => 'Password Confirmation',
                                            'rules' => 'trim|required|md5'
                                         )
                                    ),
                 'edit_information' => array(
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'trim|required|valid_email'
                                         ),
                                    array(
                                            'field' => 'first_name',
                                            'label' => 'First Name',
                                            'rules' => 'trim|required|xss_clean'
                                         ),
                                    array(
                                            'field' => 'last_name',
                                            'label' => 'Last Name',
                                            'rules' => 'trim|required|xss_clean'
                                         )
                                    ),
                 'process/change_password' => array(
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'trim|required|min_length[8]|matches[passconf]|md5'
                                         ),
                                    array(
                                            'field' => 'passconf',
                                            'label' => 'Password Confirmation',
                                            'rules' => 'trim|required|md5'
                                         )
                                    )
               );
?>