<!-- Пагинация на главной странице -->
<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="<?php
    $url = $_SERVER['REQUEST_URI'];
    if(isset($_GET['subject'], $_GET['level'], $_GET['difficulty'])){
        if($page_num <= 1){ echo '#'; }else{echo "?subject=".$_GET['subject']."&level=".$_GET['level']."&difficulty=".$_GET['difficulty']."&page_num=".($page_num - 1)."";}
    }elseif(isset($_GET['subject'], $_GET['level'])){
        if($page_num <= 1){ echo '#'; }else{echo "?subject=".$_GET['subject']."&level=".$_GET['level']."&page_num=".($page_num - 1)."";}
    }elseif(isset($_GET['subject'], $_GET['difficulty'])){
        if($page_num <= 1){ echo '#'; }else{echo "?subject=".$_GET['subject']."&difficulty=".$_GET['difficulty']."&page_num=".($page_num - 1)."";}
    }elseif(isset($_GET['level'], $_GET['difficulty'])){
        if($page_num <= 1){ echo '#'; }else{echo "?level=".$_GET['level']."&difficulty=".$_GET['difficulty']."&page_num=".($page_num - 1)."";}
    }elseif (isset($_GET['subject'])){
            if($page_num <= 1){ echo '#'; }else{echo "?subject=".$_GET['subject']."&page_num=".($page_num - 1)."";}
        }elseif(isset($_GET['level'])){
                if($page_num <= 1){ echo '#'; }else{echo "?level=".$_GET['level']."&page_num=".($page_num - 1)."";}
            }elseif(isset($_GET['difficulty'])){
                if($page_num <= 1){ echo '#'; }else{echo "?difficulty=".$_GET['difficulty']."&page_num=".($page_num - 1)."";}
            }else{ if($page_num <= 1){ echo '#'; }else{echo "?page_num=".($page_num - 1);} } ?>">Предыдущая</a></li>
    <li class="page-item"><a class="page-link" href="<?php
    $url = $_SERVER['REQUEST_URI'];
   if(isset($_GET['subject'], $_GET['level'], $_GET['difficulty'])){
    if($page_num <= 1){ echo '#'; }else{echo "?subject=".$_GET['subject']."&level=".$_GET['level']."&difficulty=".$_GET['difficulty']."&page_num=1";}
}elseif(isset($_GET['subject'], $_GET['level'])){
    if($page_num <= 1){ echo '#'; }else{echo "?subject=".$_GET['subject']."&level=".$_GET['level']."&page_num=1";}
}elseif(isset($_GET['subject'], $_GET['difficulty'])){
    if($page_num <= 1){ echo '#'; }else{echo "?subject=".$_GET['subject']."&difficulty=".$_GET['difficulty']."&page_num=1";}
}elseif(isset($_GET['level'], $_GET['difficulty'])){
    if($page_num <= 1){ echo '#'; }else{echo "?level=".$_GET['level']."&difficulty=".$_GET['difficulty']."&page_num=1";}
}elseif (isset($_GET['subject'])){
        if($page_num <= 1){ echo '#'; }else{echo "?subject=".$_GET['subject']."&page_num=1";}
    }elseif(isset($_GET['level'])){
            if($page_num <= 1){ echo '#'; }else{echo "?level=".$_GET['level']."&page_num=1";}
        }elseif(isset($_GET['difficulty'])){
            if($page_num <= 1){ echo '#'; }else{echo "?difficulty=".$_GET['difficulty']."&page_num=1";}
        }else{ if($page_num <= 1){ echo '#'; }else{echo "?page_num=1";} } ?>">1</a></li>
    <li class="page-item"><a class="page-link" href="<?php 
    $url = $_SERVER['REQUEST_URI'];
   if(isset($_GET['subject'], $_GET['level'], $_GET['difficulty'])){
    if($page_num >= $total_pages){ echo '#'; }else{echo "?subject=".$_GET['subject']."&level=".$_GET['level']."&difficulty=".$_GET['difficulty']."&page_num=".($page_num + 1)."";}
}elseif(isset($_GET['subject'], $_GET['level'])){
    if($page_num >= $total_pages){ echo '#'; }else{echo "?subject=".$_GET['subject']."&level=".$_GET['level']."&page_num=".($page_num + 1)."";}
}elseif(isset($_GET['subject'], $_GET['difficulty'])){
    if($page_num >= $total_pages){ echo '#'; }else{echo "?subject=".$_GET['subject']."&difficulty=".$_GET['difficulty']."&page_num=".($page_num + 1)."";}
}elseif(isset($_GET['level'], $_GET['difficulty'])){
    if($page_num >= $total_pages){ echo '#'; }else{echo "?level=".$_GET['level']."&difficulty=".$_GET['difficulty']."&page_num=".($page_num + 1)."";}
}elseif (isset($_GET['subject'])){
        if($page_num >= $total_pages){ echo '#'; }else{echo "?subject=".$_GET['subject']."&page_num=".($page_num + 1)."";}
    }elseif(isset($_GET['level'])){
            if($page_num >= $total_pages){ echo '#'; }else{echo "?level=".$_GET['level']."&page_num=".($page_num + 1)."";}
        }elseif(isset($_GET['difficulty'])){
            if($page_num >= $total_pages){ echo '#'; }else{echo "$url?difficulty=".$_GET['difficulty']."&page_num=".($page_num + 1)."";}
        }else{ if($page_num >= $total_pages){ echo '#'; }else{echo "?page_num=".($page_num + 1);} } ?>">Следующая</a></li>
  </ul>
</nav>