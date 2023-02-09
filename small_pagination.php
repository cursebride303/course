<!-- Пагинация -->
<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="<?php if($page_num <= 1){ echo '#'; }else{echo "?page_num=".($page_num - 1);} ?>">Предыдущая</a></li>
    <li class="page-item"><a class="page-link" href="<?php
        if($page_num <= 1){ echo '#'; }else{ echo "?page_num=1";}
    ?>">1</a></li>
    <li class="page-item"><a class="page-link" href="<?php if($page_num >= $total_pages){ echo '#'; }else{echo "?page_num=".($page_num + 1);} ?>">Следующая</a></li>
  </ul>
</nav>