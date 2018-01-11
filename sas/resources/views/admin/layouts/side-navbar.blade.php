<!-- sidebar menu -->



<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
 
 
  <!-- Customer --> 
<div class="menu_section">
  <br>  
    <h3>Menu Sidebar</h3>
    <ul class="nav side-menu">

          <?php

            function show_menu($parent=0){
             
              $menu = \App\Menu::where('id_menuinduk',$parent)->get();
              $parent = \App\Menu::where('id_menu',$parent)->first();
              ?>

                <li class="treeview">
                  <a href="{{url($parent->link_menu)}}">
                    <i class="{{$parent->icon_menu}}"></i>
                    {{$parent->judul_menu}}</a>
                </li>

          <?php } ?>


          <?php

              $id_role = session('role_id');
              $querymenu= 'SELECT * FROM tb_menulist INNER JOIN tb_menu ON tb_menulist.id_menu=tb_menu.id_menu WHERE role_id = ?';

              $menu_0 = DB::SELECT($querymenu,array($id_role));

              foreach ($menu_0 as $key) {
                show_menu($key->id_menu);
              }

          ?>



       </ul>
  </div>







</div>
<!-- /sidebar menu -->

<br />
      


    
    <!-- /menu footer buttons -->
  </div>
</div>