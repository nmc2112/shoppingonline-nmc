<?php
    $xtp = new XTemplate('views/contact.html');

    $xtp->parse('CONTACT');
    $acontent = $xtp->text('CONTACT');