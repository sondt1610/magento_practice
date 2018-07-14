<?php
namespace Part5\AttributePractice\Setup;

use Magento\Customer\Model\Customer;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    private $eavSetupFactory;

    private $eavConfig;

    private $attributeResource;

    public function __construct(
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Customer\Model\ResourceModel\Attribute $attributeResource
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->attributeResource = $attributeResource;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(Customer::ENTITY, 'my_attribute', [
            "type"     => "varchar",
            "backend"  => "",
            "label"    => "My Attribute",
            "input"    => "text",
            "source"   => "",
            "visible"  => true,
            "required" => true,
            "default" => "",
            "frontend" => "",
            "unique"     => false,
            "note"       => ""
        ]);

        $attribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'my_attribute');
        $attribute->setData('used_in_forms', ['adminhtml_customer']);
        $this->attributeResource->save($attribute);
    }
}