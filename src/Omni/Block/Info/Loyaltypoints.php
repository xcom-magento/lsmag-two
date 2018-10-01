<?php
/**
 * Created by PhpStorm.
 * User: Zeeshan Khuwaja
 * Date: 6/25/2018
 * Time: 4:37 PM
 */

namespace Ls\Omni\Block\Info;


class Loyaltypoints extends \Magento\Payment\Block\Info
{

    /**
     * @var string
     */
    protected $_payableTo;

    /**
     * @var string
     */
    protected $_mailingAddress;

    /**
     * @var string
     */
    protected $_template = 'Ls_Omni::info/loyaltypoints.phtml';


    /**
     * @return string
     */
    public function toPdf()
    {
        $this->setTemplate('Ls_Omni::info/pdf/loyaltypoints.phtml');
        return $this->toHtml();
    }
}
