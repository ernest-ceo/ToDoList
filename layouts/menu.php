<?php
            foreach ($menu as $href => $name)
            {
                ?>
                <li  class="active"><a href="<?=$href?>"><?=$name?></a></li>
                <?php
            }
            ?>