<?php

/**
 * Обрезает слова в html коде
 * @param string $text сам текст
 * @param int $limitWord количество разрешенных слов
 * @return string обрезанный html code
 */
function truncateText(string $text, int $limitWord) : string
{
    //вспомогательная функция
    function getArrayWithLimitWord(array|null $array, int $limitWord, int &$countWordResult):array
    {
        $newArray = [];
        $countWordResult = 0;

        foreach ($array as $element)
        {
            if ($countWordResult == $limitWord)
                break;

            if (!preg_match('/^\s*$/',$element))
            {
                $countWordResult++;
            }
            $newArray[] = $element;
        }
        return $newArray;
    }
    function dfsDomDocument(DOMNode $startNode, int $limitWord, int &$countWord, bool &$isWasTruncate, array &$void_elements)
    {
        if ($startNode->nodeType == XML_TEXT_NODE) 
        {
            //если уже количество слов превыщает лимит.
            if ($countWord >= $limitWord) 
            {
                $startNode->parentNode->removeChild($startNode);
                $isWasTruncate = true;
                return;
            }
    
            $countAvailableWords = $limitWord - $countWord;
            
            //временный массив
            $nodeWords = explode(' ', $startNode->nodeValue);
    
            $countWordForCurrentNode = 0;
    
            $arrayWithLimit = getArrayWithLimitWord($nodeWords, $countAvailableWords, $countWordForCurrentNode);
    
            $countWord += $countWordForCurrentNode;

            $startNode->nodeValue = implode(' ', $arrayWithLimit);

            if ($countWord == $limitWord)
            {
                $spanElement = $startNode->ownerDocument->createElement("span");
                $spanElement->appendChild($startNode->ownerDocument->createTextNode('...'));
                $startNode->parentNode->insertBefore($spanElement, $startNode->nextSibling);
            }
        }
    
        // Создаем временный массив для хранения дочерних узлов
        $childNodes = [];
        
        foreach ($startNode->childNodes as $child) 
        {
            $childNodes[] = $child;
        }
    
        foreach ($childNodes as $child) 
        {
            dfsDomDocument($child, $limitWord, $countWord, $isWasTruncate, $void_elements);
        }
        
        if (isEmptyNode($startNode, $void_elements) && $startNode->nodeName != 'xml')
        {
            $startNode->parentNode->removeChild($startNode);
        }
    }
    function isEmptyNode(DOMNode $startNode, array& $void_elements)
    {
        $isEmptyNode = true;

        if ($startNode->nodeType == XML_TEXT_NODE)
        {
            return empty($startNode->nodeValue);
        }
        else if (in_array($startNode->nodeName,$void_elements))
        {
            return false;
        }
        
        foreach ($startNode->childNodes as $child)
        {
            if (!empty($child->nodeValue) || in_array($child->nodeType, $void_elements))
                $isEmptyNode = false;

            if ($isEmptyNode == false)
                break;

            $isEmptyNode = isEmptyNode($child, $void_elements) && $isEmptyNode;
        }
        return $isEmptyNode;
    }

    $dom = new DOMDocument;

    //добавляем первый тег чтобы dom дерево правильно парсило дерево
    $dom->loadHTML( '<html><meta content="text/html; charset=utf-8" http-equiv="Content-Type">' . $text . "</html>", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    
    $countWord = 0;
    $isWasTruncate = false;


    $void_elements =
    [
    'area',
    'base',
    'br',
    'col',
    'embed',
    'hr',
    'input',
    'link',
    'meta',
    'param',
    'source',
    'track',
    'wbr',
    "img"
    ];

    dfsDomDocument($dom, $limitWord, $countWord, $isWasTruncate, $void_elements);


    $resultHtml = $dom->saveHTML();

    //удаляем первый тег
    $resultHtml = preg_replace('/<html>/', '', $resultHtml,1);

    //удаляем последний тег
    $resultHtml = strrev(preg_replace('/>lmth\/</', "", strrev($resultHtml), 1));

    //удаляем кодировку
    $resultHtml = preg_replace('/<meta content="text\/html; charset=utf-8" http-equiv="Content-Type">/',"", $resultHtml, 1);

    return $resultHtml;
}


