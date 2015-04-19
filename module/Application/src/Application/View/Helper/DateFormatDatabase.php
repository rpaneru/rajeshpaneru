<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
class DateFormatDatabase extends AbstractHelper
{
    public function __invoke($date)
    {
        $date = substr($date, 0, 10);
        
        return date('Y-m-d',strtotime($date));
    }
}