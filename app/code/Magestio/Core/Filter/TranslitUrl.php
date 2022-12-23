<?php

declare(strict_types=1);

namespace Magestio\Core\Filter;

class TranslitUrl extends \Magento\Framework\Filter\TranslitUrl
{
    /**
     *
     *
     * @return array
     */
    protected function getConvertTable()
    {
        $convertTable = $this->convertTable;

        $convertTable['ñ'] = "n";
        $convertTable['Ñ'] = "N";
        $convertTable["ç"] = "c";
        $convertTable["Ç"] = "C";
        $convertTable["~"] = "";

        return $convertTable;
    }
}