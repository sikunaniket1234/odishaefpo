<?php
                  ///////////////////////////////////////////////////////////
                  $err = $this->session->flashdata('error');
                  if(!empty($err))
                  {
                      echo '<div class="alert alert-danger fade in">
                              <button class="close" data-dismiss="alert">
                                  ×
                              </button>
                              <i class="fa-fw fa fa-times"></i>
                              '.$err.'
                          </div>';
                   }
                  $scs = $this->session->flashdata('success');
                  if(!empty($scs))
                  {
                     echo '<div class="alert alert-success fade in">
                              <button class="close" data-dismiss="alert">
                                  ×
                              </button>
                              <i class="fa-fw fa fa-check"></i>
                               '.$scs.'
                          </div>'; 
                 
                  }
                  ////////////////////////////////////////////////////////
                  ?>