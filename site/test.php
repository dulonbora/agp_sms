{
                
               if($row['SUBMENU']==0  && $row['IS_PAGE']==1){
                <li class=''><a href='page.php?i=".$row['ID']."' class='dropdown-toggle'>".$row['NAME']."</a></li>    
                }
                else if($row['SUBMENU']==1 && $row['IS_PAGE']==0){
                echo "<li class='dropdown'><a class='dropdown-toggle' href='#'>
							".$row['NAME']."
							<i class='fa fa-caret-down'></i>
						</a>
                <ul class='dropdown-menu' style=''>";
                //echo $this->AdminParentLoadInNavBarIndex($row['ID']);
                echo "</ul> </li>";}
                
                else if($row['SUBMENU']==1 && $row['IS_PAGE']==0){
                echo "<li class='dropdown'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>".$row['NAME']."
        <span class='caret'></span></a>
        <ul class='dropdown-menu'>
        ";
                echo $this->AdminParentLoadInNavBarIndex($row['ID']);
                echo "</ul>
      </li>   </ul>
        </li>";}
                
                else {
                echo "<li class=''><a class='dropdown-toggle' href='post.php?i=".$row['ID']."'>".$row['NAME']."</a></li>";                
                }
            }