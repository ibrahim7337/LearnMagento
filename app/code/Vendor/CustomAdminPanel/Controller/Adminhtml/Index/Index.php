<?php

declare(strict_types=1);

namespace Vendor\CustomAdminPanel\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    private const ADMIN_RESOURCE = 'Vendor_CustomAdminPanel::main_menu';

    private const PAGE_TITLE = 'Custom Admin Panel Page';

    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return Page
     */
    public function execute(): Page
    {
        /** @var Page $resultPage */
        $resultPage = $this->_pageFactory->create();
        $resultPage->setActiveMenu(static::ADMIN_RESOURCE);
        $resultPage->addBreadcrumb(__(static::PAGE_TITLE), __(static::PAGE_TITLE));
        $resultPage->getConfig()->getTitle()->prepend(__(static::PAGE_TITLE));

        return $resultPage;
    }

    /**
     * Is the user allowed to view the page.
     *
     * @return bool
     */
    protected function _isAllowed(): bool
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
