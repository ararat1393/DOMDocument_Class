    /**
     * Will use DOMDocument to load html content
     * Will use DomXPath to find the div element with class name
     * @param $text
     * @param $className
     * @return bool
     */
    public function removeDivByClassName(&$html , $className )
    {
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

        $xpath = new \DomXPath($dom);
        $xpathResults = $xpath->query("//div[contains(@class, '$className')]");

        if($el = $xpathResults->item(0)){
            $el->parentNode->removeChild($el);
            $html =  $dom->saveHTML();
        }
        return true;
    }
