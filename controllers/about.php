<?php
    $xtp = new XTemplate('views/about.html');

    $xtp->parse('ABOUT');
    $acontent = $xtp->text('ABOUT');