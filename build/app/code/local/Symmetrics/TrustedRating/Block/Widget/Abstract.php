<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category  Symmetrics
 * @package   Symmetrics_TrustedRating
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Siegfried Schmitz <ss@symmetrics.de>
 * @copyright 2009 Symmetrics Gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
 
 /**
  * Symmetrics_TrustedRating_Block_Widget_Abstract
  *
  * @category  Symmetrics
  * @package   Symmetrics_TrustedRating
  * @author    symmetrics gmbh <info@symmetrics.de>
  * @author    Siegfried Schmitz <ss@symmetrics.de>
  * @copyright 2009 Symmetrics Gmbh
  * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
  * @link      http://www.symmetrics.de/
  */
class Symmetrics_TrustedRating_Block_Widget_Abstract extends Mage_Core_Block_Template
{
    /**
     * Returns the widget link data if trusted rating status is active and data are present for the current language
     * 
     * @param boolean $type mixed
     *
     * @return array
     */
    public function getDataForWidget($type) 
    {
        $model = Mage::getModel('trustedrating/trustedrating');
        
        if (!$model->getIsActive() || !$model->checkLocaleData()) {
            return null;
        }

        switch ($type) {
            case 'RATING':
                return $model->getRatingWidgetData();   
                break;
            case 'EMAIL':
                return $model->getEmailWidgetData();
                break;
            default:
                return null;
                break;
        }
    }
    
    /**
     * Returns the data for the registration link
     * 
     * @return array
     */
    public function getRegistrationLink()
    {
        $registrationLink = array ('target' => Mage::getBaseUrl() . 'admin/registration',
                                   'text' => $this->__('Link to the registration on Trusted Shops Rating')
        );
        
        return $registrationLink;
    }
    
    /**
     * gets the translated label for shop language tab
     *
     * @return string
     */
    public function getLanguageLabel()
    {
        return $this->__('Shop Language'). '<font color="red">*</font>';
    }
}