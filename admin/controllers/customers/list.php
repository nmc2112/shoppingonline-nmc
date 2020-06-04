<?php
    $xtp = new XTemplate('views/customers/list.html');  
    
    $xtp->parse('LIST');
    $acontent = $xtp->text('LIST');
