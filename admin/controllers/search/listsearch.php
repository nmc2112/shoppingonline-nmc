<?php
    $xtp = new XTemplate("views/search/listsearch.html");
   
    $xtp->parse('LISTSEARCH');
    $acontent = $xtp->text('LISTSEARCH');
