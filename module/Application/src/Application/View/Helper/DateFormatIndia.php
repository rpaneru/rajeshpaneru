<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
class DateFormatIndia extends AbstractHelper
{
    public function __invoke($date)
    {
        $date = substr($date, 0, 10);
        
        return date('d-M-Y',strtotime($date));
    }
}